<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\School;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SchoolVerificationController extends Controller
{
    public function index(): View
    {
        $page = 1;
        return view('auth.register-school', compact('page'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'alamat_sekolah' => ['required', 'string', 'max:255'],
            'no_telepon_sekolah' => ['required', 'string', 'max:15', 'min:11', 'unique:schools'],
            'email_sekolah' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:schools'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'logo_sekolah' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'nama_pendaftar' => ['required', 'string', 'max:255'],
            'no_hp_pendaftar' => ['required', 'string', 'max:15', 'min:11', 'unique:schools'],
            'email_pendaftar' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:schools'],
            'identitas_pendaftar' => ['required', 'string', 'max:255'],
            'bukti_id_pendaftar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Jika validasi berhasil, simpan data sekolah ke dalam database
        $schoolVerification = school::create([
            'nama_sekolah' => $validatedData['nama_sekolah'],
            'alamat_sekolah' => $validatedData['alamat_sekolah'],
            'no_telepon_sekolah' => $validatedData['no_telepon_sekolah'],
            'email_sekolah' => $validatedData['email_sekolah'],
            'nama_pendaftar' => $validatedData['nama_pendaftar'],
            'no_hp_pendaftar' => $validatedData['no_hp_pendaftar'],
            'email_pendaftar' => $validatedData['email_pendaftar'],
            'identitas_pendaftar' => $validatedData['identitas_pendaftar'],
            'bukti_id_pendaftar' => $validatedData['bukti_id_pendaftar'],
            'status' => 'perlu diverifikasi',
        ]);

        $user = User::create([
            'nama' => $validatedData['nama_sekolah'],
            'email' => $validatedData['email_sekolah'],
            'password' => Hash::make($validatedData['password']), // Menggunakan Hash untuk menyimpan password terenkripsi
            'phone' => $validatedData['no_telepon_sekolah'],
            'tipe_user' => 'sekolah', // atau tipe user lain yang sesuai
            'id_sekolah' => $schoolVerification->id,
        ]);

        // Ambil gambar dari form request
        if ($request->hasFile('logo_sekolah')) {
            $image = $request->file('logo_sekolah');
            dd($request);

            // Baca isi gambar dan konversi ke base64
            $imageData = file_get_contents($image->path());
            $base64Image = base64_encode($imageData);

            // Buat permintaan ke Imgur API
            $response = Http::withHeaders([
                'Authorization' => 'Client-ID c2fe122c365bf4a',

            ])
                ->timeout(32400)
                ->post('https://api.imgur.com/3/image', [
                    'image' => $base64Image,
                ]);

            // Ambil respons JSON
            $responseData = $response->json();

            // Ambil URL gambar yang diunggah
            $imageUrl = $responseData['data']['link'];

            // Lakukan sesuatu dengan URL gambar, misalnya, simpan ke database atau tampilkan
            // Misalnya, Anda dapat menyimpan URL gambar ke dalam kolom 'logo_sekolah' pada data sekolah
            $schoolVerification->update(['logo_sekolah' => $imageUrl]);
        }

        if ($request->hasFile('bukti_id_pendaftar')) {
            $file = $request->file('bukti_id_pendaftar');

            // Baca isi file dan konversi ke base64
            $fileData = file_get_contents($file->path());
            $base64File = base64_encode($fileData);

            // Buat permintaan ke Imgur API
            $response = Http::withHeaders([
                'Authorization' => 'Client-ID c2fe122c365bf4a',
            ])
                ->timeout(32400)
                ->post('https://api.imgur.com/3/image', [
                    'image' => $base64File,
                ]);

            // Ambil respons JSON
            $responseData = $response->json();

            // Ambil URL file yang diunggah
            $fileUrl = $responseData['data']['link'];

            // Lakukan sesuatu dengan URL file, misalnya, simpan ke database atau tampilkan
            // Misalnya, Anda dapat menyimpan URL file ke dalam kolom 'bukti_id_pendaftar' pada data sekolah
            $schoolVerification->update(['bukti_id_pendaftar' => $fileUrl]);
        }

        return redirect('/')->with('success', 'Registrasi sekolah berhasil. Silahkan tunggu verifikasi dari admin :)');
    }

    public function showVerificationPage()
    {
        $schools = school::where('status', 'perlu diverifikasi')->get();
        return view('verifikasi-sekolah', compact('schools'));
    }

    public function respondVerification(Request $request, $id)
    {
        $schoolVerification = school::findOrFail($id);

        if ($request->input('response') == 'confirm') {
            $schoolVerification->update(['status' => 'valid']);
        } elseif ($request->input('response') == 'decline') {
            // Ambil nomor pendaftar dari request
            $nomorPendaftar = $schoolVerification->no_hp_pendaftar;

            // Ambil pesan catatan dari request
            $pesan = $request->input('catatan');

            // Buat link WhatsApp dengan nomor penerima dan pesan
            $url = "https://wa.me/$nomorPendaftar?text=" . urlencode("Maaf, pendaftaran Anda ditolak karena: $pesan");
            $schoolVerification->update(['status' => 'ditolak']);
            return redirect()->away($url);
        }

        return redirect()->back()->with('success', 'Respon berhasil disimpan');
    }
}

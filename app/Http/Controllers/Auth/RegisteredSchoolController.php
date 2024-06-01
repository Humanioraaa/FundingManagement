<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SchoolVerification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredSchoolController extends Controller
{
    public function index(): View
    {
        return view('auth.register-school');
    }

    /**
     * Menangani permintaan registrasi yang masuk.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'nama_sekolah' => ['required', 'string', 'max:255'],
        //     'alamat_sekolah' => ['required', 'string', 'max:255'],
        //     'no_hp_sekolah' => ['required', 'string', 'max:15', 'min:11', 'unique:school_verifications'],
        //     'email_sekolah' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:school_verifications'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $schoolVerification = SchoolVerification::create([
        //     'nama_sekolah' => $request->nama_sekolah,
        //     'alamat_sekolah' => $request->alamat_sekolah,
        //     'no_hp_sekolah' => $request->no_hp_sekolah,
        //     'email_sekolah' => $request->email_sekolah,
        //     'password' => Hash::make($request->password),
        // ]);

        // // Redirect atau tindakan lain setelah data berhasil disimpan
        // return redirect(route('index'))->with('success', 'Registrasi sekolah berhasil. Silahkan tunggu verifikasi dari admin :)');
    }

    public function showVerificationPage()
    {
        // $schools = SchoolVerification::all();
        // return view('verifikasi-sekolah', compact('schools'));
    }
}
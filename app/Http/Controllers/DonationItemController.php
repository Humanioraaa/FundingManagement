<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\ItemDonation;
use Illuminate\Http\Request;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DonationItemController extends Controller
{
    public function showFormItem($id)
    {
        // Mengambil data campaign berdasarkan ID yang dipilih
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $targetDonasi = Target::where('id_campaign', $id)->where('nama_barang', '!=', 'Uang')->get();

        return view('donation.donasibarang', compact('selectedCampaign','targetDonasi','id'));
    }

    public function postFormItem(Request $request, $id){
        // Validasi input form
        $request->validate([
            'nama_barang' => 'required|array',
            'jumlah_barang' => 'required|array',
            'jasa_kirim' => 'nullable|string',
            'nomor_resi' => 'nullable|string',
            'pesan' => 'nullable|string',
            'syarat_dan_ketentuan' => 'required|accepted',
        ]);

        $waktu_donasi = now(); // Tanggal dan waktu donasi saat ini

        // Ambil data campaign yang dipilih
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;

        // Simpan data donasi ke session
        $request->session()->put('item.nama_barang', $request->nama_barang);
        $request->session()->put('item.jumlah_barang', $request->jumlah_barang);
        $request->session()->put('item.jasa_kirim', $request->jasa_kirim);
        $request->session()->put('item.nomor_resi', $request->nomor_resi);
        $request->session()->put('item.pesan', $request->pesan);
        $request->session()->put('item.waktu_donasi', $waktu_donasi);
        $request->session()->put('item.id_campaign', $id);


        // Menampilkan view dengan data campaign yang dipilih
        return view('donation.summaryItems', compact('selectedCampaign', 'namaSekolah', 'waktu_donasi'));
    }


    public function storeItems(Request $request)
    {
        
        $donationData = $request->session()->get('item');

        // Simpan data donasi ke tabel Donasi
        $donation = Donation::create([
            'id_user' => auth()->id(),
            'id_campaign' => $donationData['id_campaign'],
            'pesan' => $donationData['pesan'],
            'syarat_ketentuan' => $request->has('syarat_ketentuan') ? true : false,
            'status' => 'Proses Pengiriman',
            'jasa_kirim' => $donationData['jasa_kirim'],
            'nomor_resi' => $donationData['nomor_resi'],
        ]);

        // Simpan data barang donasi ke tabel ItemDonasi
        foreach ($donationData['nama_barang'] as $index => $namaBarang) {
            ItemDonation::create([
                'id_donasi' => $donation->id,
                'nama_barang' => $namaBarang,
                'jumlah_barang' => $donationData['jumlah_barang'][$index],
            ]);
        }

        // Hapus data donasi dari session
        $request->session()->forget('donation');

        // Redirect atau kirim response sesuai kebutuhan
        return redirect('/donation')->with('success', 'Terimakasih Donasinya Orang Baik');
    }

}

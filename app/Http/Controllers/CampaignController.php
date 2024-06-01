<?php
// app/Http/Controllers/CampaignController.php

// app/Http/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function store(Request $request)
    {

        try {
            $request->validate([
                // 'id_sekolah' => 'required|exists:schools,id', belum ada input untuk ini
                'nama_campaign' => 'required|string',
                'deskripsi_campaign' => 'required|string',
                // 'status' => 'required|string', // di hapus aja karena dibawah ada code static value
                'catatan_campaign' => 'nullable|string',
                'tanggal_dibuat' => 'required|date',
                'tanggal_selesai' => 'required|date'
            ]);
            $campaign = new Campaign();
            $campaign->id_sekolah = auth()->id(); //sebelumnya ini menggunakan pake math random, tidak dianjurkan karena punya relasi dengan table schools
            $campaign->nama_campaign = $request->nama_campaign;
            $campaign->deskripsi_campaign = $request->deskripsi_campaign;
            $campaign->status = 'Menunggu Verifikasi';
            $campaign->jenis_donasi = $request->jenis_donasi; //sebelumnya belum ada field jenis_donasi padahal mandatory
            $campaign->catatan_campaign = $request->catatan_campaign;
            $campaign->tanggal_dibuat = $request->tanggal_dibuat;
            $campaign->tanggal_selesai = $request->tanggal_selesai;
            if ($request->hasFile('foto_campaign')) {
                $campaign->foto_campaign = $request->file('foto_campaign')->store('public/campaign_photos');
            }
            $campaign->save();

            dd("berhasil save");
            // return redirect()->route('campaigns.index')->with('success', 'Kampanye berhasil ditambahkan!'); ini route belum ada
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

    }

    public function index()
    {
        $campaigns = Campaign::all();
        return view('riwayatcampaign', compact('campaigns'));
    }
    //untuk menampilkan riwayat

    public function create()
    {
        $campaigns = Campaign::all();
        return view('create', compact('campaigns'));
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'target_donation' => 'nullable|numeric',
    //         'donation_type' => 'required|string',
    //         // Tambahkan validasi lain sesuai kebutuhan
    //     ]);

    //     // Handle File Upload
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('campaign_images', 'public');
    //     }

    //     $campaign = new Campaign();
    //     $campaign->name = $request->name;
    //     $campaign->description = $request->description;
    //     $campaign->image = $imagePath ?? null; // Save the path of the image
    //     $campaign->target_donation = $request->target_donation;
    //     $campaign->donation_type = $request->donation_type;
    //     $campaign->save();

    //     return redirect()->route('daftar')->with('success', 'Campaign berhasil ditambahkan!');
    // }

}

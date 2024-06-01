<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\ItemDonation;
use Illuminate\Http\Request;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\RequestPencairan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class DonationController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 'berlangsung')->get();
        return view('donation.index', compact('campaigns'));
    }


    public function showForm($id)
    {
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $metodePembayaran = MethodPayment::all();

        return view('donation.donasiuang', compact('selectedCampaign', 'metodePembayaran'));
    }


    public function showSummary(Request $request)
    {

        $request->validate([
            'nominal' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'nama_pemilik' => 'required',
            'nomor_rekening' => 'required',
            'pesan' => 'nullable',
            'syarat_dan_ketentuan' => 'accepted',
        ]);

        $request->session()->put('donation', $request->all());

        $id_bank = $request->metode_pembayaran;
        $bank = MethodPayment::findOrFail($id_bank);
        $nama_pemilik = $bank->nama_pemilik;
        $tujuan_pembayaran = $bank->metode_pembayaran;
        $nomor_rekening = $bank->nomor_rekening;

        $nama_bank = $request->nama_bank;
        $nomor_rek = $request->nomor_rekening;
        $pentransfer = $request->nama_pemilik;
        $nominal = $request->nominal;
        $selectedCampaignId = $request->id_campaign;
        $metode_pembayaran = $request->metode_pembayaran;
        $waktu_donasi = now();


        $selectedCampaign = Campaign::findOrFail($selectedCampaignId);

        return view('donation.summary', compact('nama_bank','tujuan_pembayaran', 'nomor_rekening', 'nomor_rek', 'pentransfer', 'nominal', 'selectedCampaign', 'metode_pembayaran', 'nama_pemilik', 'waktu_donasi'));
    }



    public function store(Request $request)
    {
        $donationData = $request->session()->get('donation');

        $methodPayment = MethodPayment::findOrFail($donationData['metode_pembayaran']);
        $namaBank = $methodPayment->metode_pembayaran;


        $donation = Donation::create([
            'id_user' => auth()->id(),
            'id_campaign' => $donationData['id_campaign'],
            'pesan' => $donationData['pesan'],
            'syarat_ketentuan' => $request->has('syarat_ketentuan') ? true : false,
            'status' => 'Menunggu Verifikasi',
        ]);

        $moneyDonation = MoneyDonation::create([
            'id_donasi' => $donation->id,
            'id_bank' => $donationData['metode_pembayaran'],
            'nama_bank' => $namaBank,
            'nama_pemilik' => $donationData['nama_pemilik'],
            'nomor_rekening' => $donationData['nomor_rekening'],
            'nominal' => $donationData['nominal'],
        ]);

        $idCampaign = $moneyDonation->donation->id_campaign;

        $existingRequestPencairan = RequestPencairan::whereHas('moneyDonation.donation', function ($query) use ($idCampaign) {
            $query->where('id_campaign', $idCampaign);
        })->first();

        if ($existingRequestPencairan) {
            $existingRequestPencairan->nominal_terkumpul += $donationData['nominal'];
            $existingRequestPencairan->save();
        } else {
            RequestPencairan::create([
                'id_money_donation' => $moneyDonation->id,
                'nominal_terkumpul' => $donationData['nominal'],
                'nominal_sisa' => 0,
                'status' => 'Pending',
            ]);
        }


        $request->session()->forget('donation');


        return redirect('/donation')->with('success', 'Terimakasih Donasinya Orang Baik');
    }




}
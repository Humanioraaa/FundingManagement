<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Target;
use App\Models\Donation;
use App\Models\ItemDonation;
use App\Models\MoneyDonation;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Auth;

class RiwayatCampaignController extends Controller
{
        public function index(Request $request)
        {
        $user = Auth::user();
        $campaigns = Campaign::with('targets', 'donations', 'donations.donationItems', 'donations.donationMoney')
            ->where('id_sekolah', $user->id)
            ->get();

            $campaigns->each(function ($campaign) {
                $groupedDonationItems = $campaign->donations->flatMap(function ($donation) {
                    return $donation->donationItems;
                })->groupBy('nama_barang')->map(function ($items, $nama_barang) {
                    return [
                        'nama_barang' => $nama_barang,
                        'jumlah_barang' => $items->sum('jumlah_barang')
                    ];
                });

                $campaign->groupedDonationItems = $groupedDonationItems->isEmpty() ? collect() : $groupedDonationItems;

                $totalDonationMoney = $campaign->donations->flatMap(function ($donation) {
                    return $donation->donationMoney;
                })->sum('nominal');

                $campaign->totalDonationMoney = $totalDonationMoney;
            });

        return view('riwayatcampaign', compact('campaigns'));
        }


    public function donatur($campaignId)
{
    $campaign = Campaign::with('targets', 'donations', 'donations.donationItems', 'donations.donationMoney')
                ->findOrFail($campaignId);

    $groupedDonationItems = $campaign->donations->flatMap(function ($donation) {
        return $donation->donationItems;
    })->groupBy('nama_barang')->map(function ($items, $nama_barang) {
        return [
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $items->sum('jumlah_barang')
        ];
    });

    $campaign->groupedDonationItems = $groupedDonationItems->isEmpty() ? collect() : $groupedDonationItems;

    $totalDonationMoney = $campaign->donations->flatMap(function ($donation) {
        return $donation->donationMoney;
    })->sum('nominal');

    $campaign->totalDonationMoney = $totalDonationMoney;

    // Ambil semua donasi untuk kampanye ini
    $donations = Donation::where('id_campaign', $campaignId)->get();

    return view('lihatdonatur', compact('campaign', 'donations'));
}

}

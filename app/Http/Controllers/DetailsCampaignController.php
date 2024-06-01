<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsCampaignController extends Controller
{
    public function showDetails($id){
        $details = Campaign::with('school','targets')
                    ->where('status', 'Sedang Berjalan')
                    ->where('id', $id)
                    ->get();

        $details->each(function ($detail) {
            $groupedDonationItems = $detail->donations->flatMap(function ($donation) {
                return $donation->donationItems;
            })->groupBy('nama_barang')->map(function ($items, $nama_barang) {
                return [
                    'nama_barang' => $nama_barang,
                    'jumlah_barang' => $items->sum('jumlah_barang')
                ];
            });

            $detail->groupedDonationItems = $groupedDonationItems->isEmpty() ? collect() : $groupedDonationItems;

            $totalDonationMoney = $detail->donations->flatMap(function ($donation) {
                return $donation->donationMoney;
            })->sum('nominal');

            $detail->totalDonationMoney = $totalDonationMoney;
        });

        $otherDetails = Campaign::with('school')
                    ->where('status', 'Sedang Berjalan')
                    ->where('id', '!=', $id)
                    ->get();

        $donations = Donation::where('id_campaign', $id)->get();

        return view('donation-details', compact('details','otherDetails', 'donations'));
    }
}

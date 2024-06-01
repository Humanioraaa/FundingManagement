<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Models\Campaign;
use App\Models\ItemDonation;
use Illuminate\Http\Request;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\RequestPencairan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
       $donasi = MoneyDonation::all();
       $table = RequestPencairan::all();
       $item = ItemDonation::all();
       $metode = MethodPayment::all();
       $schoolCount = school::count();
       $totalnominal = MoneyDonation::sum('nominal');


    // Chart graph
       $campaign = Campaign::all();


        $campaignChartData =  [
            $campaign->where('status', 'berlangsung')->count(),
            $campaign->where('status', 'pending')->count(),
            $campaign->where('status', 'rejected')->count(),
        ];
        $campaignChartLabel =[
            'Berlangsung',
            'Menunggu Verifikasi',
            'Tertolak',
                    ];


        $MoneyChartData =  [
            $donasi->where('status', 'verified')->count(),
            $donasi->where('status', 'pending')->count(),
            $donasi->where('status', 'rejected')->count(),
        ];
        $MoneyChartLabel =[
            'Terverifikasi',
            'Menunggu Verifikasi',
            'Ditolak',
                    ];

         $ItemChartData =  [
            $item->where('status', 'dikirim')->count(),
            $item->where('status', 'diterima')->count(),
        ];
        $ItemChartLabel =[
            'Dikirim',
            'Diterima'
                    ];



        $UsersBarData = DB::table('users')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->get();

        $userChartLabels = $UsersBarData->pluck('month')->toArray();
        $userBarChart = $UsersBarData->pluck('total')->toArray();

        $donasiLineData = DB::table('money_donations')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(nominal) as total'))
            ->groupBy('month')
            ->get();

        $donasiChartLabels = $donasiLineData->pluck('month')->toArray();
        $donasiLineChart = $donasiLineData->pluck('total')->map(function($value) {
        return number_format($value, 2, ',', '.'); // Format ke mata uang
         })->toArray();


    return view('dashboard', compact('table','userChartLabels', 'userBarChart', 'donasiLineChart','donasiChartLabels', 'schoolCount','totalnominal', 'ItemChartLabel', 'ItemChartData','MoneyChartLabel' ,'MoneyChartData' ,'campaignChartLabel', 'campaignChartData', 'donasi', 'metode', 'campaign'));
    }
}

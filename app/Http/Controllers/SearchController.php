<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('keyword');

        // Lakukan pencarian kampanye berdasarkan nama atau deskripsi
        $campaigns = Campaign::where('nama_campaign', 'LIKE', "%$query%")
            ->orWhere('deskripsi_campaign', 'LIKE', "%$query%")
            ->orWhereHas('school', function ($schoolQuery) use ($query) {
                $schoolQuery->where('nama_sekolah', 'LIKE', "%$query%");
            })
            ->get();

        return view('search-result', compact('campaigns', 'query'));
    }
}

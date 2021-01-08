<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KasusUmum;

class StatController extends Controller
{
    public function index(){
        $sum = DB::table("kasus_umum")
	    ->select(DB::raw("SUM(positif) as pos"),DB::raw("SUM(sembuh) as sem"),DB::raw("SUM(meninggal) as men"))
        ->get();

        $kasus_recent = KasusUmum::orderBy('tanggal', 'desc')
                                    ->select('positif','meninggal','sembuh')
                                    ->first();
        
        $data = [
            'sumData' => $sum[0],
            'kasus' => $kasus_recent
        ];

        return view('grafstat.index')->with($data);
    }

    public function statistik(){
        $sum_st = DB::table("search_trend")
	    ->select(DB::raw("SUM(cold) as cold"),DB::raw("SUM(flu) as flu"),DB::raw("SUM(pneumonia) as pneum"),DB::raw("SUM(coronavirus) as covid"))
        ->get();

        $st_recent = search_trend::orderBy('cold', 'desc')
                                    ->select('cold','flu','pneumonia','coronavirus')
                                    ->first();
        
        $data_statistik = [
            'sumData_st' => $sum_st[0],
            'st' => $st_recent
        ];
        return view('grafstat.statistik')->with($data_statistik);
    }

    public function sebaranKasus(){
        return view('grafstat.sebaran');
    }
}

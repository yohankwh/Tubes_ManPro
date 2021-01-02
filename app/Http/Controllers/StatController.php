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
        return view('grafstat.statistik');
    }

    public function sebaranKasus(){
        return view('grafstat.sebaran');
    }
}

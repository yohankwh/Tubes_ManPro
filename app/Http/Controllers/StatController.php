<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KasusUmum;
use App\search_trend;
use App\Demografi;
use App\KasusDaerah;

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
        $sum_st = DB::table("search_trends")
	    ->select(DB::raw("SUM(cold) as cold"),DB::raw("SUM(flu) as flu"),DB::raw("SUM(pneumonia) as pneum"),DB::raw("SUM(coronavirus) as covid"))
        ->get();

        $st_recent = search_trend::orderBy('cold', 'desc')
                                    ->select('cold','flu','pneumonia','coronavirus')
                                    ->first();

        $cNullAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '')->count();
        $c0sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '0s')->count();
        $c10sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '10s')->count();
        $c20sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '20s')->count();
        $c30sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '30s')->count();
        $c40sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '40s')->count();
        $c50sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '50s')->count();
        $c60sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '60s')->count();
        $c70sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '70s')->count();
        $c80sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '80s')->count();
        $c90sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '90s')->count();
        $c100sAge = DB::table("kasus_per_bulan")
        ->where('age', '=', '100s')->count();

        $cJan = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '01')->count();
        $cFeb = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '02')->count();
        $cMar = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '03')->count();
        $cApr = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '04')->count();
        $cMay = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '05')->count();
        $cJun = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '06')->count();
        $cJul = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '07')->count();
        $cAug = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '08')->count();
        $cSep = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '09')->count();
        $cOct = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '10')->count();
        $cNov = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '11')->count();
        $cDec = DB::table("kasus_per_bulan")
        ->whereMonth('confirmed_date', '12')->count();

        $data_statistik = [
            'sumData_st' => $sum_st[0],
            'st' => $st_recent,

            'cAgeNull' => $cNullAge,
            'cAge0s' => $c0sAge,
            'cAge10s' => $c10sAge,
            'cAge20s' => $c20sAge,
            'cAge30s' => $c30sAge,
            'cAge40s' => $c40sAge,
            'cAge50s' => $c50sAge,
            'cAge60s' => $c60sAge,
            'cAge70s' => $c70sAge,
            'cAge80s' => $c80sAge,
            'cAge90s' => $c90sAge,
            'cAge100s' => $c100sAge,

            'cJan' => $cJan,
            'cFeb' => $cFeb,
            'cMar' => $cMar,
            'cApr' => $cApr,
            'cMay' => $cMay,
            'cJune' => $cJun,
            'cJuly' => $cJul,
            'cAug' => $cAug,
            'cSep' => $cSep,
            'cOct' => $cOct,
            'cNov' => $cNov,
            'cDec' => $cDec,
        ];
        return view('grafstat.statistik')->with($data_statistik);
    }

    public function sebaranKasus(){
        $sum_daerah = DB::table('kasus_daerah')
                        ->select('daerah',DB::raw("SUM(positif) as pos"))
                        ->groupBy('daerah')
                        ->get();

        $all_daerah = KasusDaerah::orderBy('tanggal', 'desc')
                                ->select('daerah','positif','meninggal','sembuh')
                                ->get();
        $data = [
          'sum_daerah'  => $sum_daerah,
          'all_data' => $all_daerah
        ];
        return view('grafstat.sebaran')->with($data);
    }
}

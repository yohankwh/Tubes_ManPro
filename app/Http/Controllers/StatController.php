<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KasusUmum;
use App\search_trend;
use App\Demografi;
use App\KasusDaerah;
use App\Berita;

class StatController extends Controller
{
    public function index(){
        $sum = DB::table("kasus_umum")
	    ->select(DB::raw("SUM(positif) as pos"),DB::raw("SUM(sembuh) as sem"),DB::raw("SUM(meninggal) as men"))
        ->get();
        
        $pos_data = KasusUmum::select("tanggal","positif")->get();

        $all_berita = Berita::orderBy('created_at','desc')->take(3)->get();

        $kasus_recent = KasusUmum::orderBy('tanggal', 'desc')
                                    ->select('tanggal','positif','meninggal','sembuh')
                                    ->first();
        
        $data = [
            'sumData' => $sum[0],
            'kasus' => $kasus_recent,
            'all_berita' => $all_berita,
            'pos_data' => $pos_data
        ];

        return view('grafstat.index')->with($data);
    }

    public function statistik(){
        $kasus_umum = KasusUmum::orderBy('tanggal','desc')->select("tanggal","positif","sembuh","meninggal")->get();

        $kasus_daerah = KasusDaerah::orderBy('tanggal','desc')->select("tanggal","daerah","positif","sembuh","meninggal")->get();
        $kasus_daerah_parsed = array();

        //column to array key
        foreach($kasus_daerah as $kasus){
            if(!isset($kasus_daerah_parsed["$kasus->daerah"])){
                $kasus_daerah_parsed["$kasus->daerah"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["tanggal"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["positif"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["sembuh"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["meninggal"] = array();
            }
            array_push($kasus_daerah_parsed["$kasus->daerah"]["tanggal"],$kasus->tanggal);
            array_push($kasus_daerah_parsed["$kasus->daerah"]["positif"],$kasus->positif);
            array_push($kasus_daerah_parsed["$kasus->daerah"]["sembuh"],$kasus->sembuh);
            array_push($kasus_daerah_parsed["$kasus->daerah"]["meninggal"],$kasus->meninggal);
        }

        $sum_umum = DB::table("kasus_umum")
	    ->select(DB::raw("SUM(positif) as pos"),DB::raw("SUM(sembuh) as sem"),DB::raw("SUM(meninggal) as men"))
        ->get()[0];

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
            
        ];
        // return view('grafstat.statistik')->with($data_statistik);

        $demo_data = DB::table('demografi')
                        ->select('kel_umur',DB::raw("SUM(positif) as pos"),DB::raw("SUM(meninggal) as men"))
                        ->groupBy('kel_umur')
                        ->get();
                        
        $sum_demo = DB::table('demografi')
                        ->select(DB::raw("SUM(positif) as pos"))
                        ->get();

        $latest_date = Demografi::max('tanggal');
        $latest_demo = Demografi::where('tanggal',$latest_date)->select('kel_umur','positif','meninggal')->get();
        $data = [
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
            'demo_data' => $demo_data,
            'latest_demo' => $latest_demo,
            'demo_sum_pos' => json_decode($sum_demo)[0]->pos,
            'sum_umum' => $sum_umum,
            'kasus_umum' => $kasus_umum,
            'kasus_daerah' => $kasus_daerah_parsed
        ];

        return view('grafstat.statistik')->with($data);
    }

    public function sebaranKasus(){
        $sum_daerah = DB::table('kasus_daerah')
                        ->select('daerah',DB::raw("SUM(positif) as pos"),DB::raw("SUM(sembuh) as sem"),DB::raw("SUM(meninggal) as men"))
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

    public function viewBerita($id){
        $news = Berita::where('id',$id)->first();
        if($news){
            $data = [
                'berita' => $news
            ];
            return view('grafstat.berita')->with($data);    
        }else{
            return redirect()->route(index);
        }
    }
}

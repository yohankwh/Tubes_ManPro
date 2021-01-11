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
    public function index()
    {
        $sum = DB::table("kasus_umum")
            ->select(DB::raw("SUM(positif) as pos"), DB::raw("SUM(sembuh) as sem"), DB::raw("SUM(meninggal) as men"))
            ->get();

        $pos_data = KasusUmum::select("tanggal", "positif")->get();

        $all_berita = Berita::orderBy('created_at', 'desc')->take(3)->get();

        $kasus_recent = KasusUmum::orderBy('tanggal', 'desc')
            ->select('tanggal', 'positif', 'meninggal', 'sembuh')
            ->first();

        $data = [
            'sumData' => $sum[0],
            'kasus' => $kasus_recent,
            'all_berita' => $all_berita,
            'pos_data' => $pos_data
        ];

        return view('grafstat.index')->with($data);
    }

    public function statistik()
    {
        $kasus_umum = KasusUmum::orderBy('tanggal', 'desc')->select("tanggal", "positif", "sembuh", "meninggal")->get();

        $kasus_daerah = KasusDaerah::orderBy('tanggal', 'desc')->select("tanggal", "daerah", "positif", "sembuh", "meninggal")->get();
        $kasus_daerah_parsed = array();

        //column to array key
        foreach ($kasus_daerah as $kasus) {
            if (!isset($kasus_daerah_parsed["$kasus->daerah"])) {
                $kasus_daerah_parsed["$kasus->daerah"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["tanggal"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["positif"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["sembuh"] = array();
                $kasus_daerah_parsed["$kasus->daerah"]["meninggal"] = array();
            }
            array_push($kasus_daerah_parsed["$kasus->daerah"]["tanggal"], $kasus->tanggal);
            array_push($kasus_daerah_parsed["$kasus->daerah"]["positif"], $kasus->positif);
            array_push($kasus_daerah_parsed["$kasus->daerah"]["sembuh"], $kasus->sembuh);
            array_push($kasus_daerah_parsed["$kasus->daerah"]["meninggal"], $kasus->meninggal);
        }

        $sum_umum = DB::table("kasus_umum")
            ->select(DB::raw("SUM(positif) as pos"), DB::raw("SUM(sembuh) as sem"), DB::raw("SUM(meninggal) as men"))
            ->get()[0];

        $demo_data = DB::table('demografi')
            ->select('kel_umur', DB::raw("SUM(positif) as pos"), DB::raw("SUM(meninggal) as men"))
            ->groupBy('kel_umur')
            ->get();

        $sum_demo = DB::table('demografi')
            ->select(DB::raw("SUM(positif) as pos"))
            ->get();

        $latest_date = Demografi::max('tanggal');
        $latest_demo = Demografi::where('tanggal', $latest_date)->select('kel_umur', 'positif', 'meninggal')->get();
        $data = [
            'demo_data' => $demo_data,
            'latest_demo' => $latest_demo,
            'demo_sum_pos' => json_decode($sum_demo)[0]->pos,
            'sum_umum' => $sum_umum,
            'kasus_umum' => $kasus_umum,
            'kasus_daerah' => $kasus_daerah_parsed
        ];

        return view('grafstat.statistik')->with($data);
    }

    public function sebaranKasus()
    {
        $sum_daerah = DB::table('kasus_daerah')
            ->select('daerah', DB::raw("SUM(positif) as pos"), DB::raw("SUM(sembuh) as sem"), DB::raw("SUM(meninggal) as men"))
            ->groupBy('daerah')
            ->get();

        $all_daerah = KasusDaerah::orderBy('tanggal', 'desc')
            ->select('daerah', 'positif', 'meninggal', 'sembuh')
            ->get();
        $data = [
            'sum_daerah'  => $sum_daerah,
            'all_data' => $all_daerah
        ];
        return view('grafstat.sebaran')->with($data);
    }

    public function viewBerita($id)
    {
        $news = Berita::where('id', $id)->first();
        if ($news) {
            $data = [
                'berita' => $news
            ];
            return view('grafstat.berita')->with($data);
        } else {
            return redirect()->route('index');
        }
    }
}

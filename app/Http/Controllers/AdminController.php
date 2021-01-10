<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Berita;
use App\KasusUmum;
use App\KasusDaerah;
use App\Demografi;
use Illuminate\Support\Facades\Response;
use League\Csv\Reader;
use App\User;
use File;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $all_berita = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $kasus_umum = KasusUmum::orderBy('tanggal', 'desc')->get();
        $demografi = Demografi::orderBy('tanggal', 'desc')->get();
        $list_daerah = KasusDaerah::orderBy('tanggal', 'desc')->get();

        $data = [
            'all_berita' => $all_berita,
            'kasusUmum' => $kasus_umum,
            'demografi' => $demografi,
            'listDaerah' => $list_daerah
        ];

        return view('admin.index')->with($data);
    }

    public function berita()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $all_berita = Berita::orderBy('created_at', 'desc')->get();

        $data = [
            'all_berita' => $all_berita
        ];

        return view('admin.berita.index')->with($data);
    }

    public function kasus()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $kasus_umum = KasusUmum::all();
        $demografi = Demografi::all();
        $list_daerah = KasusDaerah::all();

        foreach ($kasus_umum as $kasus) {
            $kasus->tglnum = strtotime($kasus->tanggal);
            $kasus->tanggal = date('Y-m-d', $kasus->tglnum);
        }

        foreach ($demografi as $demo) {
            $demo->tglnum = strtotime($demo->tanggal);
            $demo->tanggal = date('Y-m-d', $demo->tglnum);
        }

        foreach ($list_daerah as $daerah) {
            $daerah->tglnum = strtotime($daerah->tanggal);
            $daerah->tanggal = date('Y-m-d', $daerah->tglnum);
        }

        $data = [
            'kasusUmum' => $kasus_umum,
            'demografi' => $demografi,
            'listDaerah' => $list_daerah
        ];

        return view('admin.kasus.index')->with($data);
    }

    public function viewBerita($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $berita = Berita::where('id', $id)->first();

        if ($berita) {
            $data = [
                'berita' => $berita
            ];

            return view('admin.berita.view')->with($data);
        } else {
            return redirect()->route('admin.berita');
        }
    }

    public function createBerita()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('admin.berita.create');
    }

    public function postBerita(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $berita = new Berita();
        $berita->title = $request->input('title');
        $berita->content = $request->input('content');

        if($request->hasfile('header_photo')){
            $name=Auth::user()->id."_".time().rand(1,10).'.jpg';
            $file = $request->file('header_photo');
            $file->move(base_path('public/img/berita'), $name);
            
            $berita->header_image = $name;
        }
        $berita->save();

        return redirect()->route('admin.berita');
    }

    public function editBerita($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $berita = Berita::where('id', $id)->first();

        if ($berita) {
            $data = [
                'berita' => $berita
            ];

            return view('admin.berita.edit')->with($data);
        } else {
            return redirect()->route('admin.berita');
        }
    }

    public function updateBerita(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $berita = Berita::where('id', $id)->first();

        if ($berita) {
            $berita->title = $request->input('title');
            $berita->content = $request->input('content');

            if($request->hasfile('header_photo')){
                $name=Auth::user()->id."_".time().rand(1,10).'.jpg';
                $file = $request->file('header_photo');
                $file->move(base_path('public/img/berita'), $name);
                
                $berita->header_image = $name;
            }

            $berita->save();

            return redirect()->route('berita.view', $berita->id);
        } else {
            return redirect()->route('admin.berita');
        }
    }

    public function deleteBerita($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $berita = Berita::where('id', $id)->first();

        if ($berita) {
            $berita->delete();
        }
        return redirect(route('admin.berita'));
    }

    public function createKasus()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('admin.kasus.create');
    }

    public function inputKasusUmum(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $selectedDate = $request->input('tanggalVal');

        $type = "default";

        $kasus = KasusUmum::where('tanggal', $selectedDate)->first();

        if (!$kasus) { //if not a new kasus, it's an edit request.
            $kasus = new KasusUmum();
        } else {
            $type = "edit";
        }

        $kasus->tanggal = $request->input('tanggalVal');
        $kasus->positif = $request->input('positifVal');
        $kasus->sembuh = $request->input('sembuhVal');
        $kasus->meninggal = $request->input('meninggalVal');
        $kasus->save();

        $tag = $request->input('tag');

        $formattedDate = date('Y-m-d', strtotime($kasus->tanggal));

        return Response::json(array(
            'success' => true,
            'message' => 'success',
            'targetId' => $kasus->id,
            'type' => $type,
            'date' => $formattedDate
        ), 200);
    }
    public function inputKasusDaerah(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $selectedDate = $request->input('tanggalVal');
        $daerah = $request->input('daerahVal');

        $type = "default";

        $kasus = KasusDaerah::where('tanggal', $selectedDate)->where('daerah', $daerah)->first();

        if (!$kasus) { //if not a new kasus, it's an edit request.
            $kasus = new KasusDaerah();
        } else {
            $type = "edit";
        }

        $kasus->tanggal = $request->input('tanggalVal');
        $kasus->positif = $request->input('positifVal');
        $kasus->sembuh = $request->input('sembuhVal');
        $kasus->daerah = $daerah;
        $kasus->meninggal = $request->input('meninggalVal');
        $kasus->save();

        $tag = $request->input('tag');

        $formattedDate = date('Y-m-d', strtotime($kasus->tanggal));

        return Response::json(array(
            'success' => true,
            'message' => 'success',
            'targetId' => $kasus->id,
            'type' => $type,
            'date' => $formattedDate
        ), 200);
    }
    public function inputDemografi(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $selectedDate = $request->input('tanggalVal');
        $umur = $request->input('umurVal');

        $type = "default";

        $kasus = Demografi::where('tanggal', $selectedDate)->where('kel_umur', $umur)->first();

        if (!$kasus) { //if not a new kasus, it's an edit request.
            $kasus = new Demografi();
        } else {
            $type = "edit";
        }

        $kasus->tanggal = $request->input('tanggalVal');
        $kasus->positif = $request->input('positifVal');
        $kasus->kel_umur = $umur . "s";
        $kasus->meninggal = $request->input('meninggalVal');
        $kasus->save();

        $tag = $request->input('tag');

        $formattedDate = date('Y-m-d', strtotime($kasus->tanggal));

        return Response::json(array(
            'success' => true,
            'message' => 'success',
            'targetId' => $kasus->id,
            'type' => $type,
            'date' => $formattedDate
        ), 200);
    }

    public function bulkImportCSVKU()
    {
        $csv = Reader::createFromPath(storage_path('app/public/import/timeDiff.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            if ($row['confirmed'] != "") {
                $kasus = new KasusUmum();
                $kasus->tanggal = $row['date'];
                $kasus->positif = $row['confirmed'];
                $kasus->sembuh = $row['released'];
                $kasus->meninggal = $row['deceased'];
                $kasus->save();
            }
        }
        return redirect()->route('admin.kasus');
    }

    public function bulkImportCSVKD()
    {
        $csv = Reader::createFromPath(storage_path('app/public/import/timeProvinceDiff.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            if ($row['confirmed'] != "") {
                $kasus = new KasusDaerah();
                $kasus->tanggal = $row['date'];
                $kasus->daerah = $row['province'];
                $kasus->positif = $row['confirmed'];
                $kasus->sembuh = $row['released'];
                $kasus->meninggal = $row['deceased'];
                $kasus->save();
            }
        }
        return redirect()->route('admin.kasus');
    }

    public function bulkImportCSVDemo()
    {
        $csv = Reader::createFromPath(storage_path('app/public/import/timeAgeDiff.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            if ($row['confirmed'] != "") {
                $kasus = new Demografi();
                $kasus->tanggal = $row['date'];
                $kasus->kel_umur = $row['age'];
                $kasus->positif = $row['confirmed'];
                $kasus->meninggal = $row['deceased'];
                $kasus->save();
            }
        }
        return redirect()->route('admin.kasus');
    }
}

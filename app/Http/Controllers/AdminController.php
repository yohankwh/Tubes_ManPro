<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KasusUmum;
use App\KasusDaerah;
use App\Demografi;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function berita(){
        $all_berita = Berita::orderBy('created_at','desc')->get();
        
        $data = [
            'all_berita'=>$all_berita
        ];

        return view('admin.berita.index')->with($data);
    }

    public function kasus(){
        $kasus_umum = KasusUmum::all();
        $demografi = Demografi::all();
        $list_daerah = KasusDaerah::all();

        foreach($kasus_umum as $kasus){
            $kasus->tanggal = date('d/m/Y',strtotime($kasus->tanggal));
        }

        foreach($demografi as $demo){
            $demo->tanggal = date('d/m/Y',strtotime($demo->tanggal));
        }

        foreach($list_daerah as $daerah){
            $daerah->tanggal = date('d/m/Y',strtotime($daerah->tanggal));
        }

        $data = [
            'kasusUmum' => $kasus_umum,
            'demografi' => $demografi,
            'listDaerah' => $list_daerah
        ];

        return view('admin.kasus.index')->with($data);
    }

    public function viewBerita($id){
        $berita = Berita::where('id',$id)->first();

        if($berita){
            $data = [
                'berita' => $berita
            ];

            return view('admin.berita.view')->with($data);
        }else{
            return redirect()->route('admin.berita');
        }
    }

    public function createBerita(){
        return view('admin.berita.create');
    }

    public function postBerita(Request $request){
        $berita = new Berita();
        $berita->title = $request->input('title');
        $berita->content = $request->input('content');
        $berita->header_image = "test.jpg";
        $berita->save();

        return redirect()->route('admin.berita');
    }

    public function editBerita($id){
        $berita = Berita::where('id',$id)->first();

        if($berita){
            $data = [
                'berita' => $berita
            ];

            return view('admin.berita.edit')->with($data);
        }else{
            return redirect()->route('admin.berita');
        }
    }

    public function updateBerita(Request $request, $id){
        $berita = Berita::where('id',$id)->first();

        if($berita){
            $berita->title = $request->input('title');
            $berita->content = $request->input('content');
            $berita->header_image = "test.jpg";
            $berita->save();

            return redirect()->route('berita.view', $berita->id);
        }else{
            return redirect()->route('admin.berita');
        }
    }

    public function deleteBerita($id){
        $berita = Berita::where('id',$id)->first();

        if($berita){
            $berita->delete();
        }
        return redirect(route('admin.berita'));
    }

    public function createKasus(){
        return view('admin.kasus.create');
    }

    public function inputKasusUmum(Request $request){
        $selectedDate = $request->input('tanggalVal');

        $type = "default";

        $kasus = KasusUmum::where('tanggal',$selectedDate)->first();

        if(!$kasus){//if not a new kasus, it's an edit request.
            $kasus = new KasusUmum();
        }else{
            $type = "edit";
        }
        
        $kasus->tanggal = $request->input('tanggalVal');
        $kasus->positif = $request->input('positifVal');
        $kasus->sembuh = $request->input('sembuhVal');
        $kasus->meninggal = $request->input('meninggalVal');
        $kasus->save();

        $tag = $request->input('tag');

        $formattedDate = date('d/m/Y',strtotime($kasus->tanggal));

        return Response::json(array('success' => true, 
        'message' => 'success',
        'targetId' => $kasus->id,
        'type' => $type,
        'date' => $formattedDate), 200);
    }
    public function inputKasusDaerah(Request $request){
        $selectedDate = $request->input('tanggalVal');
        $daerah = $request->input('daerahVal');

        $type = "default";

        $kasus = KasusDaerah::where('tanggal',$selectedDate)->
                            where('daerah',$daerah)->
                            first();

        if(!$kasus){//if not a new kasus, it's an edit request.
            $kasus = new KasusDaerah();
        }else{
            $type = "edit";
        }
        
        $kasus->tanggal = $request->input('tanggalVal');
        $kasus->positif = $request->input('positifVal');
        $kasus->sembuh = $request->input('sembuhVal');
        $kasus->daerah = $daerah;
        $kasus->meninggal = $request->input('meninggalVal');
        $kasus->save();

        $tag = $request->input('tag');

        $formattedDate = date('d/m/Y',strtotime($kasus->tanggal));

        return Response::json(array('success' => true, 
        'message' => 'success',
        'targetId' => $kasus->id,
        'type' => $type,
        'date' => $formattedDate), 200);
    }
    public function inputDemografi(Request $request){
        $selectedDate = $request->input('tanggalVal');
        $umur = $request->input('umurVal');

        $type = "default";

        $kasus = Demografi::where('tanggal',$selectedDate)->
                            where('kel_umur',$umur)->
                            first();

        if(!$kasus){//if not a new kasus, it's an edit request.
            $kasus = new Demografi();
        }else{
            $type = "edit";
        }
        
        $kasus->tanggal = $request->input('tanggalVal');
        $kasus->positif = $request->input('positifVal');
        $kasus->kel_umur = $umur;
        $kasus->meninggal = $request->input('meninggalVal');
        $kasus->save();

        $tag = $request->input('tag');

        $formattedDate = date('d/m/Y',strtotime($kasus->tanggal));

        return Response::json(array('success' => true, 
        'message' => 'success',
        'targetId' => $kasus->id,
        'type' => $type,
        'date' => $formattedDate), 200);
    }
}

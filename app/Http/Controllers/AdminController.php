<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function berita(){
        $all_berita = Berita::orderBy('created_at','desc')->get();
        
        $data = [
            'all_berita'=>$all_berita
        ];

        return view('admin.berita')->with($data);
    }

    public function viewBerita($id){
        $berita = Berita::where('id',$id)->first();

        if($berita){
            $data = [
                'berita' => $berita
            ];

            return view('admin.viewberita')->with($data);
        }else{
            return redirect()->route('admin.berita');
        }
    }

    public function createBerita(){
        return view('admin.createberita');
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

            return view('admin.editberita')->with($data);
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

 
}

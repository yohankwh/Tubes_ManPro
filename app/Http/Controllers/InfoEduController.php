<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class InfoEduController extends Controller
{
    public function index()
    {
        $all_berita = Berita::orderBy('created_at','desc')->get();
        
        $data = [
            'all_berita'=>$all_berita
        ];
        return view('infoedu.index')->with($data);
    }
}

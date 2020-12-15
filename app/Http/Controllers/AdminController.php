<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function berita(){
        // return view('');
    }

    public function createBerita(){
        return view('admin.createberita');
    }

    public function editBerita(){
        return "edit berita";
    }

 
}

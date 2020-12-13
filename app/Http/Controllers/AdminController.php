<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function berita()
    {
        return view('admin.berita');
    }

    public function inputBerita()
    {
        return "input berita";
    }

    public function editBerita()
    {
        return "edit berita";
    }
}

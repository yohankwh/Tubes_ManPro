<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoEduController extends Controller
{
    public function index()
    {
        return view('infoedu.index');
    }
}

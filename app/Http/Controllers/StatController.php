<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index(){
        return view('grafstat.index');
    }

    public function statistik(){
        return view('grafstat.statistik');
    }

    public function sebaranKasus(){
        return view('grafstat.sebaran');
    }
}

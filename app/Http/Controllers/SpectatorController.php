<?php

namespace App\Http\Controllers;

use App\clash;
use Illuminate\Http\Request;

class SpectatorController extends Controller
{
    public function index()
    {
        return view('spectator.index',[
            'clashes' => clash::all()
        ]);
    }
}

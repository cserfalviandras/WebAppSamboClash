<?php

namespace App\Http\Controllers;

use App\clash;
use App\clash_competitors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function edit($clash_id)
    {
        return view('matches.edit',[
            'clash' => clash::where('id', $clash_id)->firstOrFail(),
            'clashCompetitors' => clash_competitors::where('clash_id', $clash_id)->first()
        ]);
    }
}

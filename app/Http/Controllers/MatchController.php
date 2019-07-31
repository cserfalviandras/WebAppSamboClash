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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        $clash_id = $request->input('clash_id');
        $competitor_id = $request->input('competitor_id');
        $point = $request->input('point');

        return response()->json([
            'clash_id' => "$clash_id",
            'competitor_id'=>"$competitor_id",
            'point' => "$point"
        ]);
    }
}

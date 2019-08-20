<?php

namespace App\Http\Controllers;

use App\clash;
use App\status;
use Illuminate\Http\Request;

class SpectatorController extends Controller
{
    public function index()
    {
        return view('spectator.index',[
            'clashes' => clash::all()->each(
                [
                    $this,
                    'getNamesForStatuses'
                ]
            )
        ]);
    }

    public function getNamesForStatuses(clash $clash)
    {
        $clash->clash_status_id = isset($clash->clash_status_id) ?  $clash->clash_status_id = status::where('id', $clash->clash_status_id)->first()->name : null;
    }
}

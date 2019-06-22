<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('competitions.index');
    }

    public function store(){
        $data = request()->validate([
            'inputClashName' => 'required',
            'inputClashStartDate' => 'required',
            'inputClashEndDate' => 'required',
        ]);

        //auth()->user()->posts()->create($data);
        //auth()->user()->competitions()->create($data);

        //create($data);

        dd(request()->all());
    }
}

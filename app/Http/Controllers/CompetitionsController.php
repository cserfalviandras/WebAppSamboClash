<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\competition;

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
            'inputCompetitionName' => 'required',
            'inputCompetitionStartDate' => 'required',
            'inputCompetitionEndDate' => 'required',
        ]);

        $competition = new competition();
        $competition->name = request('inputCompetitionName');
        $competition->start_date = request('inputCompetitionStartDate');
        $competition->end_date = request('inputCompetitionEndDate');
        $competition->save();

        return redirect('success');
    }
}

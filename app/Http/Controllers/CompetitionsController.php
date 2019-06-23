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
            'inputClashName' => 'required',
            'inputClashStartDate' => 'required',
            'inputClashEndDate' => 'required',
        ]);

        $competition = new competition();
        $competition->name = request('inputClashName');
        $competition->start_date = request('inputClashStartDate');
        $competition->end_date = request('inputClashEndDate');
        $competition->save();

        return redirect('success');
    }
}

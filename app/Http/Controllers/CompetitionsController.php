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

    public function edit($comp_id)
    {
        return view('competitions.edit',[
            'comp' => competition::where('comp_id', $comp_id)->firstOrFail(),
        ]);
    }

    public function update()
    {
        try {
            /*clash::where('clash_id', request('inputClashId'))->update([
                'age_group_id' => request('inputAgeGroup'),
                'weight_cat_id' => request('inputWeightCat'),
                'start_time' => request('inputStartTime'),
                'end_time' => request('inputEndTime'),
                'scoreboard_id' => 0,
                'winner_id' => 0,
                'clash_status_id' => request('inputStatus')
            ]);*/
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
        return redirect('success');
    }
}

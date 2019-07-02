<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clash;
use App\competitor;
use App\clash_competitors;

class ClashesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('clashes.index');
    }

    public function store()
    {
        $data = request()->validate([
            'inputAgeGroup' => 'required',
            'inputWeightCat' => 'required',
            'inputStartTime' => 'required',
        ]);

        $clash = new clash();
        $clash->age_group_id = request('inputAgeGroup');
        $clash->weight_cat_id = request('inputWeightCat');
        $clash->start_time = request('inputStartTime');
        $clash->end_time = request('inputEndTime');
        $clash->scoreboard_id = 0;
        $clash->winner_id = 0;   
        $clash->clash_status_id = 0;
        $clash->save();

        return redirect('success');
    }

    public function edit($clash_id)
    {
        return view('clashes.edit',[
            'clash' => clash::where('clash_id', $clash_id)->firstOrFail(),
            'competitors' => competitor::all()
        ]);
    }

    public function update()
    {
        try {
            clash::where('clash_id', request('inputClashId'))->update([
                'age_group_id' => request('inputAgeGroup'),
                'weight_cat_id' => request('inputWeightCat'),
                'start_time' => request('inputStartTime'),
                'end_time' => request('inputEndTime'),
                'scoreboard_id' => 0,
                'winner_id' => 0,
                'clash_status_id' => request('inputStatus')
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if(!empty(request('inputCompetitor_1_id'))){
            try {
                clash_competitors::where('clash_id', request('inputClashId'))->updateOrInsert(
                    ['comp_id_1' => 'inputCompetitor_1_id']
                );
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        if(!empty(request('inputCompetitor_2_id'))){
            try {
                clash_competitors::where('clash_id', request('inputClashId'))->updateOrInsert(
                    ['comp_id_2' => 'inputCompetitor_2_id']
                );
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        
    
        return redirect('success');
    }
}

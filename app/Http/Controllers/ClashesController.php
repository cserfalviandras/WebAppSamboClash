<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clash;
use App\status;
use App\competitor;
use App\clash_competitors;
use Illuminate\Database\Eloquent\Collection;

class ClashesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $clashes = clash::all()->each([$this, 'getNamesForStatuses']);
        $clashes = $clashes->sortBy('start_time');

        return view('clashes.index',[
            'clashes' => $clashes
        ]);
    }

    public function getNamesForStatuses(clash $clash)
    {
        $clash->clash_status_id = isset($clash->clash_status_id) ?  $clash->clash_status_id = status::where('id', $clash->clash_status_id)->first()->name : null;
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
        //$clash->end_time = request('inputEndTime');
        $clash->scoreboard_id = 0;
        $clash->winner_id = 0;   
        $clash->clash_status_id = 1;
        $clash->save();

        return redirect('success');
    }

    public function edit($clash_id)
    {
        $competitors = competitor::all();
        $competitors = $competitors->sortBy('name');

        return view('clashes.edit',[
            'clash' => clash::where('id', $clash_id)->firstOrFail(),
            'competitors' => $competitors,
            'clashCompetitors' => clash_competitors::where('clash_id', $clash_id)->first(),
            'clash_statuses' => status::all()
        ]);
    }

    public function update()
    {
        //dd(request()->all());
        try {
            clash::where('id', request('inputClashId'))->update([
                'age_group_id' => request('inputAgeGroup'),
                'weight_cat_id' => request('inputWeightCat'),
                'scoreboard_id' => 0,
                'winner_id' => 0,
                'clash_status_id' => (request('inputStatus') + 1)
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if(!is_null(request('inputCompetitor_1_id') && !is_null(request('inputCompetitor_2_id')))){
            try {
                $clash_current_competitors = clash_competitors::where('clash_id', request('inputClashId'))->first();

                if ($clash_current_competitors === null) {
                    $clash_competitors = new clash_competitors;

                    $clash_competitors->clash_id = request('inputClashId');
                    $clash_competitors->comp_id = request('inputCompetitor_1_id');
                    $clash_competitors->dress_id = 0;
                    $clash_competitors->comp_id_2 = request('inputCompetitor_2_id');
                    $clash_competitors->dress_id_2 = 1;

                    $clash_competitors->save();
                } else {
                    $clash_current_competitors->comp_id = request('inputCompetitor_1_id');
                    $clash_current_competitors->comp_id_2 = request('inputCompetitor_2_id');
                    
                    $clash_current_competitors->save();
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
        return redirect('success');
    }

    public function destroy()
    {
        try {
            $clash = clash::where('id', request('inputClashId'));
            $clash->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
        return redirect('success');
    }
}

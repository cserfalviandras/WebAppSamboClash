<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\competitor;

class CompetitorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $competitors = competitor::all();
        $competitors = $competitors->sortBy('name');

        return view('competitors.index', [
            'competitors' => $competitors
        ]);
    }

    public function store(){
        $data = request()->validate([
            'inputCompetitorName' => 'required',
            'inputBirthDate' => 'required',
            'inputBirthPlace' => 'required',
            'inputMothersMaidenName' => 'required',
            'inputWeightCategory' => 'required',
            'inputAgeGroup' => 'required',
            'inputOrganization' => 'required',
        ]);

        $competitor = new competitor();
        $competitor->age_group_id = request('inputAgeGroup');
        $competitor->weight_cat_id = request('inputWeightCategory');
        $competitor->organization_id = request('inputOrganization');
        $competitor->name = request('inputCompetitorName');
        $competitor->birth_date = request('inputBirthDate');
        $competitor->birth_place = request('inputBirthPlace');
        $competitor->mother_maiden_name = request('inputMothersMaidenName');
        $competitor->creator_id = auth()->user()->id;
        $competitor->save();

        return redirect('success');
    }

    public function edit($comp_id)
    {
        return view('competitors.edit',[
            'comp' => competitor::where('id', $comp_id)->firstOrFail(),
        ]);
    }

    public function update()
    {
        try {
            competitor::where('id', request('inputCompId'))->update([
                'age_group_id' => request('inputAgeGroup'),
                'weight_cat_id' => request('inputWeightCategory'),
                'organization_id' => request('inputOrganization'),
                'name' => request('inputCompetitorName'),
                'birth_date' => request('inputBirthDate'),
                'birth_place' => request('inputBirthPlace'),
                'mother_maiden_name' => request('inputMothersMaidenName'),
                'creator_id' => auth()->user()->id
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect('success');
    }

    public function destroy()
    {
        try {
            $competitor = competitor::where('id', request('inputCompId'));
            $competitor->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
        return redirect('success');
    }
}

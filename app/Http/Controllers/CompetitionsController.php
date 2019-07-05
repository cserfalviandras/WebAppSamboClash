<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\competition;
use App\clash;
use App\competition_clashes;

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
            'clashes' => clash::all(),
            'competitionClashes' => competition_clashes::where('comp_id', $comp_id)->first()
        ]);
    }

    public function update()
    {
        //dd(request()->all());
        try {
            competition::where('comp_id', request('inputCompId'))->update([
                'name' => request('inputCompetitionName'),
                'start_date' => request('inputCompetitionStartDate'),
                'end_date' => request('inputCompetitionEndDate')
            ]);

            foreach (request('addedClashes') as $addedClash) {
                competition_clashes::where('comp_id', request('inputCompId'))->updateOrInsert([
                    'comp_id' => request('inputCompId'),
                    'clash_id' => $addedClash,
                    'status_id' => 0
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
        return redirect('success');
    }
}

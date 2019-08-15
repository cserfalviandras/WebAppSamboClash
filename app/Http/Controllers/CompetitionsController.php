<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\competition;
use App\clash;
use App\competitor;
use App\competition_clashes;
use App\clash_competitors;
use DB;

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
            'comp' => competition::where('id', $comp_id)->firstOrFail(),
            'clashes' => clash::all(),
            'competitors' => competitor::select('id','name')->get(),
            'clashCompetitors' => clash_competitors::all(),
            'competitionClashes' => competition_clashes::where('comp_id', $comp_id)->get()
        ]);
    }

    public function update()
    {
        try {
            competition::where('id', request('inputCompId'))->update([
                'name' => request('inputCompetitionName'),
                'start_date' => request('inputCompetitionStartDate'),
                'end_date' => request('inputCompetitionEndDate')
            ]);

            if(null !== request('addedClashes')){
                foreach (request('addedClashes') as $addedClash) {
                    competition_clashes::where('comp_id', request('inputCompId'))->updateOrInsert([
                        'comp_id' => request('inputCompId'),
                        'clash_id' => $addedClash,
                        'status_id' => 0
                    ]);
                }
            }

            
            if(null !== request('removedClashes')){
                foreach(request('removedClashes') as $removeClashId){
                    $whereArray = array('comp_id' => request('inputCompId'),'clash_id' => $removeClashId);

                    $query = DB::table('competition_clashes');
                    foreach($whereArray as $field => $value) {
                        $query->where($field, $value);
                    }
                    $query->delete();
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
        return redirect('success');
    }
}

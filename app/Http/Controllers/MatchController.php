<?php

namespace App\Http\Controllers;

use App\clash;
use App\clashtiming;
use App\point_table;
use App\punishment;
use App\clash_competitors;
use App\competitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    public function __construct(){}

    public function edit($clash_id)
    {
        return view('matches.edit',[
            'clash' => clash::where('id', $clash_id)->firstOrFail(),
            'clashCompetitors' => clash_competitors::where('clash_id', $clash_id)->first()
        ]);
    }

    public function show($clash_id)
    {
        $clash_competitors = clash_competitors::where('clash_id', $clash_id)->first();

        if(!isset($clash_competitors->comp_id) or !isset($clash_competitors->comp_id_2)){
            return view('matches.missingData');
        }

        $organization = $this->getOrganization($clash_competitors->comp_id);
        $organization_2 = $this->getOrganization($clash_competitors->comp_id_2);

        return view('matches.show',[
            'clash' => clash::where('id', $clash_id)->firstOrFail(),
            'clashCompetitors' => $clash_competitors,
            'organization' => $organization,
            'organization_2' => $organization_2
        ]);
    }

    private function getOrganization($competitor_id)
    {
        $result = '';

        $competitor = competitor::where('id', $competitor_id)->first();
        if(isset($competitor)){
            $result = $competitor->organization_id;
        }

        return $result;
    }

    public function addPoint(Request $request)
    {
        $clash_id = $request->input('clash_id');
        $competitor_id = $request->input('competitor_id');
        $point = $request->input('point');


        try {
            $point_table = new point_table();
            $point_table->clash_id = $clash_id;
            $point_table->comp_id = $competitor_id;
            $point_table->current_point = 0;
            $point_table->point_added = $point;
            $point_table->user_id = 1;

            $point_table->save();

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return response()->json([
            'clash_id' => "$clash_id",
            'competitor_id'=>"$competitor_id",
            'point' => "$point"
        ]);
    }

    public function addPunishment(Request $request)
    {
        $clash_id = $request->input('clash_id');
        $competitor_id = $request->input('competitor_id');
        $punishment_added = $request->input('punishment');

        try {
            $punishment = new punishment();
            $punishment->clash_id = $clash_id;
            $punishment->comp_id = $competitor_id;
            $punishment->punishment_added = $punishment_added;
            $punishment->user_id = 1;

            $punishment->save();
        } catch (\Throwable $th) {
            return $e->getMessage();
        }

        return response()->json([
            'clash_id' => "$clash_id",
            'competitor_id'=>"$competitor_id",
            'punishment' => "$punishment_added"
        ]);
    }

    public function getPoints(Request $request)
    {
        $clash_id = $request->input('clash_id');
        $competitor_id = $request->input('competitor_id');

        $sumPoints = 0;

        try {
            $sumPoints = point_table::where([
                ['clash_id', '=', $clash_id],
                ['comp_id', '=', $competitor_id]
            ])->sum('point_added');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return response()->json([
            'sum' => "$sumPoints"
        ]);
    }

    public function getPunishments(Request $request)
    {
        $clash_id = $request->input('clash_id');
        $competitor_id = $request->input('competitor_id');

        $sumPunisments = 0;

        try {
            $sumPunisments = punishment::where([
                ['clash_id', '=', $clash_id],
                ['comp_id', '=', $competitor_id]
            ])->sum('punishment_added');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return response()->json([
            'sum' => "$sumPunisments"
        ]);
    }

    public function saveClashTime(Request $request)
    {
        $clash_id = $request->input('clash_id');
        $time_value = $request->input('time_value');

        try {
            $clash_current_timings = clashtiming::where('clash_id', $clash_id)->first();

            if ($clash_current_timings === null) {
                $clashtiming = new clashtiming;

                $clashtiming->clash_id = $clash_id;
                $clashtiming->timevalue = $time_value;

                $clashtiming->save();
            } else {
                $clash_current_timings->timevalue = $time_value;
                
                $clash_current_timings->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getClashTime(Request $request)
    {
        $clash_id = $request->input('clash_id');

        $clash_current_time = 0;

        try {
            $clash_current_time = clashtiming::where('clash_id', $clash_id)->first()->timevalue;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return response()->json([
            'clash_current_time' => "$clash_current_time"
        ]);
    }

    public function isClashOver(Request $request)
    {
        // Get competitors
        $clash_competitors = clash_competitors::where('clash_id', $request->input('clash_id'))->first();

        // Get points for competitor 1
        $sumPoints_1 = 0;

        try {
            $sumPoints_1 = point_table::where([
                ['clash_id', '=', $request->input('clash_id')],
                ['comp_id', '=', $clash_competitors->comp_id]
            ])->sum('point_added');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // Get points for competitor 2
        $sumPoints_2 = 0;

        try {
            $sumPoints_2 = point_table::where([
                ['clash_id', '=', $request->input('clash_id')],
                ['comp_id', '=', $clash_competitors->comp_id_2]
            ])->sum('point_added');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // Get punisments for competitor 1
        $sumPunisments_1 = 0;

        try {
            $sumPunisments_1 = punishment::where([
                ['clash_id', '=', $request->input('clash_id')],
                ['comp_id', '=', $clash_competitors->comp_id]
            ])->sum('punishment_added');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // Get punisments for competitor 2
        $sumPunisments_2 = 0;

        try {
            $sumPunisments_2 = punishment::where([
                ['clash_id', '=', $request->input('clash_id')],
                ['comp_id', '=', $clash_competitors->comp_id_2]
            ])->sum('punishment_added');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return response()->json([
            'point_dif' => abs($sumPoints_1 - $sumPoints_2),
            'punisment_comp_1' => $sumPunisments_1,
            'punisment_comp_2' => $sumPunisments_2
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\clash;
use App\clashtiming;
use App\point_table;
use App\clash_competitors;
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
        return view('matches.show',[
            'clash' => clash::where('id', $clash_id)->firstOrFail(),
            'clashCompetitors' => clash_competitors::where('clash_id', $clash_id)->first()
        ]);
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
        $punishment = $request->input('punishment');

        return response()->json([
            'clash_id' => "$clash_id",
            'competitor_id'=>"$competitor_id",
            'punishment' => "$punishment"
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
}

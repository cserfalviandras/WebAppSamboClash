@extends('layouts.spectator')

@section('content')
<div class="card h-100">
    <h5 class="card-title">
        <div class="float-right">
            <a href="{{ url('/spectator') }}"><button type="button" class="btn btn-light">x</button></a>
        </div>
    </h5>
    <div class="card-body h-100">
        <div class="my-5 w-100 col">
            <div class="row h-100 w-100" style="z-index:100; position: absolute;">
                <div class="col-7 my-auto">
                    <div id="time_field" class="text-warning font-weight-bold" style="font-size: 9vw"></div>
                </div>
                <div class="col-5 my-auto" style="font-size: 3vw">
                    <div class="row">
                        <div class="col-5 text-warning font-weight-bold">
                            Katagória:
                        </div>
                        <div class="col-3 text-warning font-weight-bold">
                            {{$clash->weight_cat_id}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 text-warning font-weight-bold">
                            Súly:
                        </div>
                        <div class="col-3 text-warning font-weight-bold">
                            {{$clash->age_group_id}}
                        </div>
                    </div>
                </div>
            </div>   
            
            @include('components.match_panel_spectator', [
                'panel_id' => 0,
                'clash_id' => $clash->id,
                'comp_id' => $clashCompetitors->comp_id,
                'dress_id' => $clashCompetitors->dress_id,
                'organization' => $organization
                ])
            @include('components.match_panel_spectator', [
                'panel_id' => 0,
                'clash_id' => $clash->id,
                'comp_id' => $clashCompetitors->comp_id_2,
                'dress_id' => $clashCompetitors->dress_id_2,
                'organization' => $organization_2
                ])
        </div>
    </div>
</div>

<script type="text/javascript">
    // ------------------------------------------------------------
    // Variables
    // ------------------------------------------------------------
    var clash_id = '{{$clash->id}}';
    var competitor_id = '{{$clashCompetitors->comp_id}}';
    var competitor_id_2 = '{{$clashCompetitors->comp_id_2}}';

    // ------------------------------------------------------------
    // Functions
    // ------------------------------------------------------------
    window.setInterval(function(){
        getPoints(clash_id, competitor_id, "#point_field-0");
        getPoints(clash_id, competitor_id_2, "#point_field-1");
        getPunishments(clash_id, competitor_id, "#punishment_field-0");
        getPunishments(clash_id, competitor_id_2, "#punishment_field-1");
        getClashTime(clash_id, "#time_field")
    }, 2000);

    function getPoints(clash_id, competitor_id, point_field_id){
        $.ajax({
            type:'GET',
            url:'/getPoints',
            data:{
                clash_id:clash_id, 
                competitor_id:competitor_id, 
            },
            success:function(data){
                $(point_field_id).first().text(data.sum);
            }
        });
    }

    function getPunishments(clash_id, competitor_id, punishment_field_id){
        $.ajax({
            type:'GET',
            url:'/getPunishments',
            data:{
                clash_id:clash_id, 
                competitor_id:competitor_id, 
            },
            success:function(data){
                $(punishment_field_id).first().text(data.sum);
            }
        });
    }

    function getClashTime(clash_id, time_field_id){
        $.ajax({
            type:'GET',
            url:'/getClashTime',
            data:{
                clash_id:clash_id, 
                competitor_id:competitor_id, 
            },
            success:function(data){
                $(time_field_id).first().text(data.clash_current_time);
            }
        });
    }
</script>
@endsection
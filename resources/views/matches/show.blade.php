@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="my-5 col">
                        <div id="time_field" class="row"></div>

                        @include('components.match_panel_spectator', [
                            'panel_id' => 0,
                            'clash_id' => $clash->id,
                            'comp_id' => $clashCompetitors->comp_id,
                            'dress_id' => $clashCompetitors->dress_id
                            ])
                        @include('components.match_panel_spectator', [
                            'panel_id' => 0,
                            'clash_id' => $clash->id,
                            'comp_id' => $clashCompetitors->comp_id_2,
                            'dress_id' => $clashCompetitors->dress_id_2
                            ])
                    </div>
                </div>
            </div>
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
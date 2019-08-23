@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="my-2 row">
                        <div class="col-sm-6 text-right font-weight-bold h2">
                            Küzdelem idő
                        </div>
                        <div class="col-sm-2 h2">
                            <time id="match-timer" class="countdown" datetime="P5M">00:05:00</time>
                        </div>  
                        <div class="col-sm-2">
                            <select id="match-time-selector" class="custom-select custom-select-sm">
                                <option selected>Mérkőzés időhossza</option>
                                <option value="00:05:00">5 perc</option>
                                <option value="00:04:00">4 perc</option>
                                <option value="00:03:00">3 perc</option>
                            </select>                                   
                        </div>                     
                    </div>

                    <div class="my-1 row">
                        <div class="col-sm-6 text-right font-weight-bold h4">
                            Leszorítási idő
                        </div>
                        <div class="col-sm-4 h4">
                            <div id="squeeze-timer" class="countdown" datetime="P5M">-</div>
                        </div>                      
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            
                        </div>
                        <div class="col-sm">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            @include('components.match_panel', [
                                'panel_id' => 0,
                                'clash_id' => $clash->id,
                                'comp_id' => $clashCompetitors->comp_id,
                                'dress_id' => $clashCompetitors->dress_id
                                ])
                        </div>
                        <div class="col-sm">
                            @include('components.match_panel', [
                                'panel_id' => 1,
                                'clash_id' => $clash->id,
                                'comp_id' => $clashCompetitors->comp_id_2,
                                'dress_id' => $clashCompetitors->dress_id_2
                                ])
                        </div>
                    </div>

                    <form>
                        <div class="my-5 form-group">
                            <label for="inputStartTime">Idő</label>
                            <div class="row">  
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm">
                                            <button class="btn btn-secondary btn-block btn-start">Indít</button>
                                        </div>
                                        <div class="col-sm">
                                            <button class="btn btn-secondary btn-block btn-pause">Állj</button>
                                        </div>
                                        <div class="col-sm">
                                            <button class="btn btn-danger btn-block btn-reset">Visszaállít</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    {{-- <button class="btn btn-secondary btn-block">Mérkőzés vége</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
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
    // Button functions
    // ------------------------------------------------------------
    $("#btn-addpoint-0").click(function(e){
        addPoint(clash_id, competitor_id, "1");
    });

    $("#btn-removepoint-0").click(function(e){
        addPoint(clash_id, competitor_id, "-1");
    });

    $("#btn-addpunishment-0").click(function(e){
        addPunishment(clash_id, competitor_id, "1");
    });

    $("#btn-removepunishment-0").click(function(e){
        addPunishment(clash_id, competitor_id, "-1");
    });

    $("#btn-startsqueeze-0").click(function(e){
        enableButtons(false, ["#btn-startsqueeze-1", "#btn-stopsqueeze-1"]);
        startSqueeze(competitor_id);
    });

    $("#btn-stopsqueeze-0").click(function(e){
        enableButtons(true, ["#btn-startsqueeze-1", "#btn-stopsqueeze-1"]);
        stopSqueeze();
    });

    $("#btn-startspan-0").click(function(e){
        alert(this.id)
    });

    $("#btn-stopspan-0").click(function(e){
        alert(this.id)
    });


    $("#btn-addpoint-1").click(function(e){
        addPoint(clash_id, competitor_id_2, "1");
    });

    $("#btn-removepoint-1").click(function(e){
        addPoint(clash_id, competitor_id_2, "-1");
    });

    $("#btn-addpunishment-1").click(function(e){
        addPunishment(clash_id, competitor_id_2, "1");
    });

    $("#btn-removepunishment-1").click(function(e){
        addPunishment(clash_id, competitor_id_2, "-1");
    });

    $("#btn-startsqueeze-1").click(function(e){
        enableButtons(false, ["#btn-startsqueeze-0", "#btn-stopsqueeze-0"]);
        startSqueeze(competitor_id_2);
    });

    $("#btn-stopsqueeze-1").click(function(e){
        enableButtons(true, ["#btn-startsqueeze-0", "#btn-stopsqueeze-0"]);
        stopSqueeze();
    });

    $("#btn-startspan-1").click(function(e){
        alert(this.id)
    });

    $("#btn-stopspan-1").click(function(e){
        alert(this.id)
    });


    // Ajax functions
    function addPoint(clash_id, competitor_id, point){
        $.ajax({
            type:'POST',
            url:'/addPoint',
            data:{
                clash_id:clash_id, 
                competitor_id:competitor_id, 
                point:point
            },
            success:function(data){
                //alert("Point: " + data.clash_id + ", " + data.competitor_id + ", " + data.point);
            }
        });
    }

    function addPunishment(clash_id, competitor_id, punishment){
        $.ajax({
            type:'POST',
            url:'/addPunishment',
            data:{
                clash_id:clash_id, 
                competitor_id:competitor_id, 
                punishment:punishment
            },
            success:function(data){
                //alert("Punisment: " + data.clash_id + ", " + data.competitor_id + ", " + data.punishment);
            }
        });
    }

    function saveClashTime(clash_id, timevalue){
        $.ajax({
            type:'POST',
            url:'/saveClashTime',
            data:{
                clash_id:clash_id, 
                time_value:timevalue, 
            },
            success:function(data){
                
            }
        });
    }


    // ------------------------------------------------------------
    // Timer
    // ------------------------------------------------------------
    var matchtime = "00:05:00";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.setInterval(function(){
        var timevalue = $("#match-timer").text();
        saveClashTime(clash_id, timevalue);
    }, 2000);

    $("#match-time-selector").on('change', function() {
        matchtime = this.value;
        resetTimer('match-timer', matchtime);
    });

    $(".btn-start").click(function(e){
        e.preventDefault();
        $('#match-timer').countDown({
            with_labels: false
        });
    });

    $(".btn-pause").click(function(e){
        e.preventDefault();
        var currenttime = $( "#match-timer" ).text();
        resetTimer('match-timer', currenttime);
    });

    $(".btn-reset").click(function(e){
        e.preventDefault();
        resetTimer('match-timer', matchtime);
    });

    function resetTimer(timerid, startvalue){
        var hashmarkedtimer = '#' + timerid;
        var timevalue = $(timerid).text();

        $(hashmarkedtimer).countDown('destroy').replaceWith('<time id="' + timerid + '"></time>');
        var newCountdown = $(hashmarkedtimer);
        newCountdown.attr('datetime', startvalue);
        $(hashmarkedtimer).text( startvalue );
    }

    // ------------------------------------------------------------
    // Timer (secounds counter)
    // ------------------------------------------------------------
    var seconds = 0;
    var squeezeTimerElement = document.getElementById('squeeze-timer');
    var timer;

    function incrementSeconds() {
        seconds += 1;
        squeezeTimerElement.innerText = seconds + " s";
    }
    
    function startSqueeze(competitor_id){
        timer = setInterval(incrementSeconds, 1000);
    }

    function stopSqueeze(){
        seconds = 0;
        clearInterval(timer);
        squeezeTimerElement.innerText = "-";
    }

    // ------------------------------------------------------------
    // Helper functions
    // ------------------------------------------------------------
    function enableButtons(enable, buttonsArray){
        buttonsArray.forEach(element => {
            $(element).prop('disabled', !enable);
        });
    }
    
</script>
@endsection
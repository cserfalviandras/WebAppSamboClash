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
                        <div id="timer-container" class="col-sm-2 h2">
                            <time id="match-timer"></time>
                        </div>  
                        <div class="col-sm-2">
                            <select id="match-time-selector" class="custom-select custom-select-sm">
                                <option selected>Mérkőzés időhossza</option>
                                <option value="5">5 perc</option>
                                <option value="4">4 perc</option>
                                <option value="3">3 perc</option>
                            </select>                                   
                        </div>   
                        <div class="col-sm-2">
                            <a href="{{ url('/matches/' . $clash->id . '/show') }}" target="_blank" class="btn btn-secondary btn-block"
                                data-toggle="tooltip" title="{{ config('tooltips.link_to_spectator_view') }}">Nézői oldal</a>
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
                                            <button class="btn btn-secondary btn-block btn-start"
                                                data-toggle="tooltip" title="{{ config('tooltips.clash_time_start') }}">Indít</button>
                                        </div>
                                        <div class="col-sm">
                                            <button class="btn btn-secondary btn-block btn-pause"
                                                data-toggle="tooltip" title="{{ config('tooltips.clash_time_pause') }}">Állj</button>
                                        </div>
                                        <div class="col-sm">
                                            <button class="btn btn-danger btn-block btn-reset"
                                                data-toggle="tooltip" title="{{ config('tooltips.clash_time_reset') }}">Visszaállít</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-secondary btn-block btn-end"
                                        data-toggle="tooltip" title="{{ config('tooltips.clash_ending') }}">Mérkőzés vége</button>
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
    var maximum_point_dif = 8;
    var maximum_punisment = 4;


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

    // ------------------------------------------------------------
    // Main
    // ------------------------------------------------------------
    function initialization(){
        enablePanelButtons(false);
    }

    $( document ).ready(function() {
        initialization();
    });
    // ------------------------------------------------------------
    // Ajax functions
    // ------------------------------------------------------------
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
                isClashOver(clash_id);
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
                isClashOver(clash_id);
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

    function updateClashStatus(clash_id, clash_status_id){
        $.ajax({
            type:'POST',
            url:'/updateClashStatus',
            data:{
                clash_id:clash_id, 
                clash_status_id:clash_status_id, 
            },
            success:function(data){
                
            }
        });
    }

    function isClashOver(clash_id){
        $.ajax({
            type:'GET',
            url:'/isClashOver',
            data:{
                clash_id:clash_id
            },
            success:function(data){
                if(data.point_dif >= maximum_point_dif){
                    if (confirm('Pontkülönbség: ' + data.point_dif + '. Lezárja a mérkőzést?')) {
                        clashEnd(clash_id);
                    }
                }

                if(data.punisment_comp_1 >= maximum_punisment){
                    if (confirm('Büntetések száma az 1. ellenfélnél: ' + data.punisment_comp_1 + '. Lezárja a mérkőzést?')) {
                        clashEnd(clash_id);
                    }
                }

                if(data.punisment_comp_2 >= maximum_punisment){
                    if (confirm('Büntetések száma az 2. ellenfélnél: ' + data.punisment_comp_2 + '. Lezárja a mérkőzést?')) {
                        clashEnd(clash_id);
                    }
                }
            },
            error: function(){
                alert('Error at clash over checking!');
            }
        });
    }


    // ------------------------------------------------------------
    // Timer - Main match timer: only minutes and seconds
    // ------------------------------------------------------------

    var counter;

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;

        counter = setInterval(function () {
            if(!isPaused){
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                currentMatchMinutes = minutes;
                currentMatchSeconds = seconds;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                $('#match-timer').text(minutes + ":" + seconds);

                if (--timer < 0) {
                    timer = duration;
                }
            }
        }, 1000);
    }

    // ------------------------------------------------------------
    // Timer - functions
    // ------------------------------------------------------------
    var timerElementId = '#match-timer';
    var isPaused = false;

    var selectedMatchDuration = 5;
    var currentMatchMinutes = selectedMatchDuration;
    var currentMatchSeconds = 0;

    var startTime = 60 * currentMatchMinutes;
    var display = document.querySelector(timerElementId);
    $('#match-time-selector').prop('disabled', false);

    $(document).ready(function(){
        resetTimer(timerElementId, currentMatchMinutes, currentMatchSeconds);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.setInterval(function(){
        var timevalue = $(timerElementId).text();
        saveClashTime(clash_id, timevalue);
    }, 2000);

    $("#match-time-selector").on('change', function() {
        selectedMatchDuration = this.value
        currentMatchSeconds = 0;
        resetTimer(timerElementId, selectedMatchDuration, currentMatchSeconds);
    });

    $(".btn-start").click(function(e){
        e.preventDefault();   
        isPaused = false;
        startTimer(startTime, display);

        resumeSubTimers();
        updateClashStatus(clash_id, 2);
        enablePanelButtons(true);
        $('#match-time-selector').prop('disabled', true);
    });

    $(".btn-pause").click(function(e){
        e.preventDefault();
        resetTimer(timerElementId, currentMatchMinutes, currentMatchSeconds);
        pauseSubTimers();
        enablePanelButtons(false);
    });

    $(".btn-reset").click(function(e){
        e.preventDefault();
        currentMatchMinutes = selectedMatchDuration;
        currentMatchSeconds = 0;
        resetTimer(timerElementId, selectedMatchDuration, currentMatchSeconds);

        resetSubTimers();
        updateClashStatus(clash_id, 1);
        enablePanelButtons(false);
        $('#match-time-selector').prop('disabled', false);
    });

    $(".btn-end").click(function(e){
        e.preventDefault();
        clashEnd(clash_id);
    });

    function resetTimer(timerid, currentMatchMinutes, currentMatchSeconds){
        startTime = 60 * currentMatchMinutes + currentMatchSeconds;
        clearInterval(counter);
        isPaused = true;

        currentMatchMinutes = currentMatchMinutes < 10 ? "0" + currentMatchMinutes : currentMatchMinutes;
        currentMatchSeconds = currentMatchSeconds < 10 ? "0" + currentMatchSeconds : currentMatchSeconds;
        $(timerid).text( currentMatchMinutes  + ':' +  currentMatchSeconds);
    }

    // ------------------------------------------------------------
    // Timer - forward counter: secounds counter
    // ------------------------------------------------------------
    var seconds = 0;
    var maxSqueezeTime = 20;
    var squeezeTimerElement = document.getElementById('squeeze-timer');
    var timer;
    var squeezerCompetitorId;
    var isSqueezePaused = false;

    function incrementSeconds() {
        if(maxSqueezeTime > seconds && !isSqueezePaused){
            seconds += 1;
            squeezeTimerElement.innerText = seconds + " s";

            // add points by time
            switch (seconds) {
                case 10:
                    addPoint(clash_id, squeezerCompetitorId, "1");
                    break;
                case 15:
                    addPoint(clash_id, squeezerCompetitorId, "2");
                    break;
                case 20:
                    addPoint(clash_id, squeezerCompetitorId, "4");
                    break;
            
                default:
                    break;
            }
        }
    }
    
    function startSqueeze(competitor_id){
        squeezerCompetitorId = competitor_id;
        isSqueezePaused = false;
        timer = setInterval(incrementSeconds, 1000);
    }

    function stopSqueeze(){
        seconds = 0;
        isSqueezePaused = false;
        clearInterval(timer);
        squeezeTimerElement.innerText = "-";
    }

    function resumeSqueeze(){
        isSqueezePaused = false;
    }

    function pauseSqueeze(){
        isSqueezePaused = true;
    }

    function resetSqueeze(){
        stopSqueeze();
    }

    // ------------------------------------------------------------
    // Helper functions
    // ------------------------------------------------------------
    function enableButtons(enable, buttonsArray){
        buttonsArray.forEach(element => {
            $(element).prop('disabled', !enable);
        });
    }

    function enablePanelButtons(enable){
        let buttons = $('button[id^="btn"]').get();
        let buttonsIds = [];
        buttons.forEach(element => {
            buttonsIds.push("#" + element["id"]);
        });
        enableButtons(enable, buttonsIds);
    }

    function clashEnd(clash_id){
        var currenttime = $( "#match-timer" ).text();
        resetTimer('match-timer', currenttime);
        
        updateClashStatus(clash_id, 3);
        enablePanelButtons(false);
    }

    function resumeSubTimers(){
        resumeSqueeze();
    }

    function pauseSubTimers(){
        pauseSqueeze();
    }

    function resetSubTimers(){
        resetSqueeze();
    }
    
</script>
@endsection
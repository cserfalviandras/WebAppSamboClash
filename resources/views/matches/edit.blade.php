@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="my-5 row">
                        <div class="col-sm text-right font-weight-bold h2">
                            Küzdelem idő
                        </div>
                        <div class="col-sm h2">
                            <time id="match-timer" class="countdown" datetime="P5M">00:05:00</time>
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
                                'clash_id' => $clash->id,
                                'comp_id' => $clashCompetitors->comp_id,
                                'dress_id' => $clashCompetitors->dress_id
                                ])
                        </div>
                        <div class="col-sm">
                            @include('components.match_panel', [
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
                                    <button class="btn btn-secondary btn-block">Mérkőzés vége</button>
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
    var matchtime = "00:05:00";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
    
</script>
@endsection
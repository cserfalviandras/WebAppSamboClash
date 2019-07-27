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
                                <time class="countdown" datetime="P5M"></time>
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
                                            <button type="" class="btn btn-secondary btn-block btn-submit">Indít</button>
                                        </div>
                                        <div class="col-sm">
                                            <button type="" class="btn btn-secondary btn-block">Állj</button>
                                        </div>
                                        <div class="col-sm">
                                            <button type="" class="btn btn-danger btn-block">Visszaállít</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <button type="" class="btn btn-secondary btn-block">Mérkőzés vége</button>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){
        e.preventDefault();
        /*var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();*/

        $.ajax({
           type:'POST',
           url:'/ajaxRequest',
           data:{},
           success:function(data){
              alert(data.success);
           }
        });
	});

    $('div, h1, time').countDown({
        with_labels: false
    });
</script>
@endsection
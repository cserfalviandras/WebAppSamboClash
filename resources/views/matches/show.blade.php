@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="my-5 col">
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
@endsection
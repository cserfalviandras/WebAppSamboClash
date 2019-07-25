@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            Küzdelem idő
                        </div>
                        <div class="col-sm">
                            05:00
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
                            <div class="card">
                                <div class="card-body bg-danger text-white">
                                    <h5 class="card-title">Ellenfél 1</h5>
                                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                                    <div class="form-group">
                                        @include('components.match_panel', [
                                            'clash_id' => $clash->id,
                                            'comp_id' => $clashCompetitors->comp_id,
                                            'dress_id' => $clashCompetitors->dress_id
                                            ])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body bg-primary text-white">
                                     <h5 class="card-title">Ellenfél 2</h5> {{-- {{ App\competitor::where('id', $clashCompetitors->comp_id_2)->first()->name }} --}}
                                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                                    <div class="form-group">
                                        @include('components.match_panel', [
                                            'clash_id' => $clash->id,
                                            'comp_id' => $clashCompetitors->comp_id_2,
                                            'dress_id' => $clashCompetitors->dress_id_2
                                            ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 row">  
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm">
                                    <button type="" class="btn btn-secondary  btn-block">Indít</button>
                                </div>
                                <div class="col-sm">
                                    <button type="" class="btn btn-secondary  btn-block">Állj</button>
                                </div>
                                <div class="col-sm">
                                    <button type="" class="btn btn-danger  btn-block">Visszaállít</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <button type="" class="btn btn-secondary btn-block">Mérkőzés vége</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
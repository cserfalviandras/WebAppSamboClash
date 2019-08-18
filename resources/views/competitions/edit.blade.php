@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Verseny
                        <div class="float-right">
                            <form action="/competitions/destroy" enctype="multipart/form-data" method="post">
                                @csrf

                                <input id="inputCompId" type="hidden" class="form-control" name="inputCompId" value="{{ $comp->id }}" required >

                                <button type="submit" class="btn btn-danger">Verseny törlése</button>
                            </form>
                        </div>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>
                    
                    <form class="pt-3" action="/competitions/update" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <input 
                                id="inputCompId" 
                                type="hidden" 
                                class="form-control"
                                name="inputCompId" 
                                value="{{ $comp->id }}" 
                                required
                                >
                        </div>

                        <div class="form-group">
                            <label for="inputCompetitionName">Megnevezés</label>
                            <input 
                                id="inputCompetitionName" 
                                type="text" 
                                class="form-control"
                                name="inputCompetitionName" 
                                value="{{ old('inputCompetitionName', $comp->name) }}"
                                required
                                autofocus>

                            @error('inputCompetitionName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputCompetitionStartDate">Mettől</label>
                                    <input 
                                        id="inputCompetitionStartDate" 
                                        type="date" 
                                        min="2019-01-01"
                                        class="form-control"
                                        name="inputCompetitionStartDate" 
                                        value="{{ old('inputCompetitionStartDate', $comp->start_date) }}"
                                        required
                                        autofocus>
        
                                    @error('inputCompetitionStartDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputCompetitionEndDate">Meddig</label>
                                    <input 
                                        id="inputCompetitionEndDate" 
                                        type="date" 
                                        class="form-control"
                                        name="inputCompetitionEndDate" 
                                        value="{{ old('inputCompetitionEndDate', $comp->end_date) }}"
                                        required
                                        autofocus>
        
                                    @error('inputCompetitionEndDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>A {{ $comp->name }} verseny mérkőzései</label>
                            <div class="pt-3 table-responsive">
                                <table id="clashes_table" class="table">
                                    <thead>
                                        <th>Törlés</th>
                                        <th>Korosztály</th>
                                        <th>Súlycsoport</th>
                                        <th>Dátum</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
            
                                    <tbody>
                                        @if(@isset($competitionClashes))
                                            @foreach ($competitionClashes as $competition_clash)
                                                @php
                                                    $clash = app\clash::where('id',$competition_clash->clash_id)->first();
                                                @endphp
                                                @include('components.clash_remove_row', [
                                                    'clash_id' => $clash->id,
                                                    'age_group_id' => $clash->age_group_id, 
                                                    'weight_cat_id' => $clash->weight_cat_id,
                                                    'start_time' => $clash->start_time,
                                                    'competitors_in_clash' => $clashCompetitors->where('clash_id', $clash->id)->first(),
                                                    'competitors' => $competitors
                                                    ])
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hozzáadható mérkőzések</label>
                            <div class="pt-3 table-responsive">
                                <table id="clashes_table" class="table">
                                    <thead>
                                        <th>Hozzáadás</th>
                                        <th>Korosztály</th>
                                        <th>Súlycsoport</th>
                                        <th>Dátum</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($clashes as $clash)
                                            @include('components.clash_add_row', [
                                                'clash_id' => $clash->id,
                                                'age_group_id' => $clash->age_group_id, 
                                                'weight_cat_id' => $clash->weight_cat_id,
                                                'start_time' => $clash->start_time,
                                                'competitors_in_clash' => $clashCompetitors->where('clash_id', $clash->id)->first(),
                                                'competitors' => $competitors
                                                ])
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
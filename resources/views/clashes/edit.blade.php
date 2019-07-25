@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzés, {{ $clash->start_time }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>
                    <form class="pt-3" action="/clashes/update" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <input 
                                id="inputClashId" 
                                type="hidden" 
                                class="form-control"
                                name="inputClashId" 
                                value="{{ $clash->id }}" 
                                required
                                >
                        </div>

                        <div class="form-group">
                            <label for="inputAgeGroup">Korosztály</label>
                            <input 
                                id="inputAgeGroup" 
                                type="text" 
                                class="form-control"
                                name="inputAgeGroup" 
                                value="{{ old('inputAgeGroup', $clash->age_group_id) }}" 
                                required
                                autofocus>

                            @error('inputAgeGroup')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputWeightCat">Súlycsoport</label>
                            <input 
                                id="inputWeightCat" 
                                type="text" 
                                class="form-control"
                                name="inputWeightCat" 
                                value="{{ old('inputWeightCat', $clash->weight_cat_id) }}" 
                                required
                                >

                            @error('inputWeightCat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Státusz</label>
                            <input 
                                id="inputStatus" 
                                type="text" 
                                class="form-control"
                                name="inputStatus" 
                                value="{{ old('inputStatus', $clash->clash_status_id) }}" 
                                required
                                >

                            @error('inputStatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body bg-danger text-white">
                                        <h5 class="card-title">Ellenfél 1</h5>
                                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                                        <div class="form-group">
                                            @php
                                                $tempCompId = $clashCompetitors->comp_id ?? null;
                                            @endphp
                                            <select class="form-control" name="inputCompetitor_1_id">
                                                @foreach ($competitors as $key => $value)
                                                    <option value="{{ $key }}" {{ $tempCompId == $key ? 'selected' : ''}}> 
                                                        {{ $value->name }}, {{ $value->birth_date }}
                                                    </option>
                                                @endforeach    
                                            </select>
                
                                            @error('inputCompetitor_1_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body bg-primary text-white">
                                        <h5 class="card-title">Ellenfél 2</h5>
                                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                                        <div class="form-group">
                                            @php
                                                $tempCompId = $clashCompetitors->comp_id_2 ?? null;
                                            @endphp
                                            <select class="form-control" name="inputCompetitor_2_id">
                                                @foreach ($competitors as $key => $value)
                                                    <option value="{{ $key }}"  {{ $tempCompId == $key ? 'selected' : ''}}> 
                                                        {{ $value->name }}, {{ $value->birth_date }}
                                                    </option>
                                                @endforeach    
                                            </select>
                
                                            @error('inputCompetitor_2_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-5 btn btn-primary">Mentés</button>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzés</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/clashes/update" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <input 
                                id="inputClashId" 
                                type="hidden" 
                                class="form-control"
                                name="inputClashId" 
                                value="{{ old('inputClashId', $clash->clash_id) }}" 
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

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputStartTime">Kezdési idő</label>
                                    <input 
                                        id="inputStartTime" 
                                        type="datetime-local" 
                                        class="form-control"
                                        name="inputStartTime" 
                                        value="{{ old('inputStartTime', $clash->start_time) }}" 
                                        required
                                        >
        
                                    @error('inputStartTime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputEndTime">Befejezési idő</label>
                                    <input 
                                        id="inputEndTime" 
                                        type="datetime-local" 
                                        class="form-control"
                                        name="inputEndTime" 
                                        value="{{ old('inputEndTime', $clash->inputEndTime) }}" 
                                        required
                                        >
        
                                    @error('inputEndTime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzések</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített mérkőzések</h6>
                    <div class="pt-3 table-responsive">
                        <table id="clashes_table" class="table table-striped table-wrapper">
                            <thead>
                                <th>Korosztály</th>
                                <th>Súlycsoport</th>
                                <th>Dátum</th>
                                <th>Állapot</th>
                                <th></th>
                                <th></th>
                            </thead>
    
                            <tbody>
                                @foreach ($clashes as $clash)
                                    @include('components.clash_row', [
                                        'clash_id' => $clash->id,
                                        'age_group_id' => $clash->age_group_id, 
                                        'weight_cat_id' => $clash->weight_cat_id,
                                        'start_time' => $clash->start_time,
                                        'clash_status_id' => $clash->clash_status_id
                                        ])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Új Mérkőzés</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Mérkőzés rögzítése</h6>
                    <form class="pt-3" action="/clashes/store" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="inputAgeGroup">Korosztály</label>
                            <input 
                                id="inputAgeGroup" 
                                type="text" 
                                class="form-control"
                                name="inputAgeGroup" 
                                value="{{ old('inputAgeGroup') }}" 
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
                                value="{{ old('inputWeightCat') }}" 
                                required
                                autofocus>

                            @error('inputWeightCat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputStartTime">Dátum</label>
                                    <input 
                                        id="inputStartTime" 
                                        type="date" 
                                        class="form-control"
                                        name="inputStartTime" 
                                        value="{{ old('inputStartTime') }}" 
                                        required
                                        autofocus>
        
                                    @error('inputStartTime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
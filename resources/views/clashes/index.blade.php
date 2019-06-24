@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzések</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített mérkőzések</h6>
                    <p class="card-text">lista..<p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
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
                                    <label for="inputStartTime">Kezdési idő</label>
                                    <input 
                                        id="inputStartTime" 
                                        type="datetime-local" 
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
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputEndTime">Befejezési idő</label>
                                    <input 
                                        id="inputEndTime" 
                                        type="datetime-local" 
                                        class="form-control"
                                        name="inputEndTime" 
                                        value="{{ old('inputEndTime') }}" 
                                        required
                                        autofocus>
        
                                    @error('inputEndTime')
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
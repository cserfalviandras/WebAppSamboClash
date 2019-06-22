@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Versenyek</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített versenyek</h6>
                    <p class="card-text">lista..<p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Új verseny</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Verseny rögzítése</h6>
                    <form class="pt-3" action="/storeCompetition" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="inputClashName">Megnevezés</label>
                            <input 
                                id="inputClashName" 
                                type="text" 
                                class="form-control"
                                name="inputClashName" 
                                value="{{ old('inputClashName') }}" 
                                required
                                autofocus>

                            @error('inputClashName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputClashStartDate">Mettől</label>
                                    <input 
                                        id="inputClashStartDate" 
                                        type="date" 
                                        min="2019-01-01"
                                        class="form-control"
                                        name="inputClashStartDate" 
                                        value="{{ old('inputClashStartDate') }}" 
                                        required
                                        autofocus>
        
                                    @error('inputClashStartDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputClashEndDate">Meddig</label>
                                    <input 
                                        id="inputClashEndDate" 
                                        type="date" 
                                        class="form-control"
                                        name="inputClashEndDate" 
                                        value="{{ old('inputClashEndDate') }}" 
                                        required
                                        autofocus>
        
                                    @error('inputClashEndDate')
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Verseny</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/competitions/update" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <input 
                                id="inputCompId" 
                                type="hidden" 
                                class="form-control"
                                name="inputClashId" 
                                value="{{ $comp->comp_id }}" 
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

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Versenyzők</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített versenyzők</h6>
                    @php
                        $competitors = App\competitor::all();
                    @endphp

                    <div class="pt-3 table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Név</th>
                                <th>Korosztály</th>
                                <th>Súlycsoport</th>
                                <th>Szövetség</th>
                                <th></th>
                            </thead>
    
                            <tbody>
                                @foreach ($competitors as $competitor)
                                    @include('components.competitor_row', [
                                        'comp_id' => $competitor->id,
                                        'name' => $competitor->name, 
                                        'age_group_id' => $competitor->age_group_id,
                                        'weight_cat_id' => $competitor->weight_cat_id,
                                        'organization_id' => $competitor->organization_id
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
                    <h5 class="card-title">Új versenyző</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Versenyző rögzítése</h6>
                    <form class="pt-3" action="/competitors/store" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="inputCompetitorName">Név</label>
                            <input 
                                id="inputCompetitorName" 
                                type="text" 
                                class="form-control"
                                name="inputCompetitorName" 
                                value="{{ old('inputCompetitorName') }}" 
                                required
                                autofocus>

                            @error('inputCompetitorName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputBirthDate">Születési dátum</label>
                            <input 
                                id="inputBirthDate" 
                                type="date" 
                                min="1919-01-01"
                                class="form-control"
                                name="inputBirthDate" 
                                value="{{ old('inputBirthDate') }}" 
                                required
                                autofocus>

                            @error('inputBirthDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputBirthPlace">Születési hely</label>
                            <input 
                                id="inputBirthPlace" 
                                type="text" 
                                class="form-control"
                                name="inputBirthPlace" 
                                value="{{ old('inputBirthPlace') }}" 
                                required
                                autofocus>

                            @error('inputBirthPlace')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputMothersMaidenName">Anyja születési neve</label>
                            <input 
                                id="inputMothersMaidenName" 
                                type="text" 
                                class="form-control"
                                name="inputMothersMaidenName" 
                                value="{{ old('inputMothersMaidenName') }}" 
                                required
                                autofocus>

                            @error('inputMothersMaidenName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputWeightCategory">Súlycsoport</label>
                            <input 
                                id="inputWeightCategory" 
                                type="text" 
                                class="form-control"
                                name="inputWeightCategory" 
                                value="{{ old('inputWeightCategory') }}" 
                                required
                                autofocus>

                            @error('inputWeightCategory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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
                            <label for="inputOrganization">Szövetség</label>
                            <input 
                                id="inputOrganization" 
                                type="text" 
                                class="form-control"
                                name="inputOrganization" 
                                value="{{ old('inputOrganization') }}" 
                                required
                                autofocus>

                            @error('inputOrganization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
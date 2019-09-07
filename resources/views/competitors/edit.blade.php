@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col">
                            <a href="{{url()->previous()}}"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <h5 class="card-title">
                        Versenyző
                        <div class="float-right">
                            <form action="/competitors/destroy" enctype="multipart/form-data" method="post">
                                @csrf

                                <input id="inputCompId" type="hidden" class="form-control" name="inputCompId" value="{{ $comp->id }}" required >

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törli?')"  
                                    data-toggle="tooltip" title="{{ config('tooltips.competitor_delete_button') }}">Versenyző törlése</button>
                            </form>
                        </div>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/competitors/update" enctype="multipart/form-data" method="post">
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
                            <label for="inputCompetitorName">Név</label>
                            <input 
                                id="inputCompetitorName" 
                                type="text" 
                                class="form-control"
                                name="inputCompetitorName" 
                                value="{{ old('inputCompetitorName', $comp->name) }}" 
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
                                value="{{ old('inputBirthDate', $comp->birth_date) }}" 
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
                                value="{{ old('inputBirthPlace', $comp->birth_place) }}" 
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
                                value="{{ old('inputMothersMaidenName', $comp->mother_maiden_name) }}" 
                                required
                                autofocus>

                            @error('inputMothersMaidenName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @php
                            //dd($comp);
                        @endphp

                        <div class="form-group">
                            <label for="inputWeightCategory">Súlycsoport</label>
                            <input 
                                id="inputWeightCategory" 
                                type="text" 
                                class="form-control"
                                name="inputWeightCategory" 
                                value="{{ old('inputWeightCategory',$comp->weight_cat_id) }}" 
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
                                value="{{ old('inputAgeGroup',$comp->age_group_id) }}" 
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
                            @php
                                $tempOrgId = $comp->organization_id ?? null;
                            @endphp
                            <select class="form-control" name="inputOrganization">
                                @foreach ($organizations as $key => $value)
                                    <option value="{{ $value->id }}" {{ $tempOrgId == $value->id ? 'selected' : ''}}> 
                                        {{ $value->name }}, {{ $value->leader_name }}
                                    </option>
                                @endforeach    
                            </select>

                            @error('inputOrganization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"
                            data-toggle="tooltip" title="{{ config('tooltips.update_button') }}">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
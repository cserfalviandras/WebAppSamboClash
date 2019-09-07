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
                        Szövetség
                        <div class="float-right">
                            <form action="/organization/destroy" enctype="multipart/form-data" method="post">
                                @csrf

                                <input id="inputOrganizationId" type="hidden" class="form-control" name="inputOrganizationId" value="{{ $organization->id }}" required >

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törli?')"  
                                    data-toggle="tooltip" title="{{ config('tooltips.organization_delete_button') }}">Szövetség törlése</button>
                            </form>
                        </div>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/organization/update" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <input 
                                id="inputOrganizationId" 
                                type="hidden" 
                                class="form-control"
                                name="inputOrganizationId" 
                                value="{{ $organization->id }}" 
                                required
                                >
                        </div>

                        <div class="form-group">
                            <label for="inputOrganizationName">Név</label>
                            <input 
                                id="inputOrganizationName" 
                                type="text" 
                                class="form-control"
                                name="inputOrganizationName" 
                                value="{{ old('inputOrganizationName', $organization->name) }}" 
                                required
                                autofocus>
    
                            @error('inputOrganizationName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="inputOrganizationLeaderName">Vezető neve</label>
                            <input 
                                id="inputOrganizationLeaderName" 
                                type="text" 
                                class="form-control"
                                name="inputOrganizationLeaderName" 
                                value="{{ old('inputOrganizationLeaderName', $organization->leader_name) }}" 
                                required
                                autofocus>

                            @error('inputOrganizationLeaderName')
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Szövetségek</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített szövetségek</h6>
                    <div class="pt-3 table-responsive">
                        <table class="table table-striped table-wrapper">
                            <thead>
                                <th>Név</th>
                                <th>Vezető</th>
                                <th></th>
                            </thead>
    
                            <tbody>
                                @foreach ($organizations as $organization)
                                    @include('components.organization_row', [
                                        'id' => $organization->id,
                                        'name' => $organization->name, 
                                        'leader_name' => $organization->leader_name,
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
                    <h5 class="card-title">Új szövetség</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szövetség rögzítése</h6>
                    <form class="pt-3" action="/competitors/store" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="inputOrganizationName">Név</label>
                            <input 
                                id="inputOrganizationName" 
                                type="text" 
                                class="form-control"
                                name="inputOrganizationName" 
                                value="{{ old('inputOrganizationName') }}" 
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
                                value="{{ old('inputOrganizationLeaderName') }}" 
                                required
                                autofocus>

                            @error('inputOrganizationLeaderName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="{{ config('tooltips.competitor_save_new_button') }}">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
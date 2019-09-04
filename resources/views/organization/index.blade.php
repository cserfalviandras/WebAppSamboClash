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
    </div>
</div>
@endsection
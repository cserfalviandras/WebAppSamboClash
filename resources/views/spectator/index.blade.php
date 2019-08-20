@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="my-5 row">
                        <h5 class="card-title">Mérkőzések</h5>

                        <div class="pt-3 table-responsive">
                            <table id="clashes_table" class="table table-striped">
                                <thead>
                                    <th>Korosztály</th>
                                    <th>Súlycsoport</th>
                                    <th>Dátum</th>
                                    <th>Állapot</th>
                                    <th></th>
                                </thead>
        
                                <tbody>
                                    @foreach ($clashes as $clash)
                                        @include('components.clash_spectator_row', [
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
        </div>
    </div>
</div>
@endsection
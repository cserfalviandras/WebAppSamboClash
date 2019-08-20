@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Versenyzők</h5>
                        <p class="card-text">Versenyzők rögzítése, szerkesztése, törlése.</p>
                        <p class="card-text"><small class="text-muted">Tipp: Az itt rögzített versenyzők a Mérkőzések menü alatt hozzárendelhetők egy-egy mérkőzéshez.</small></p>
                        <a href="{{ url('/competitors') }}" class="btn btn-dark mt-auto">Megnyítás</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Mérkőzések</h5>
                        <p class="card-text">Mérkőzések rögzítése, szerkesztése, törlése. </p>
                        <p class="card-text"><small class="text-muted">Tipp: Egy már rögzített mérkőzést itt indítható el: időkezelés, pontozások, büntetések.</small></p>
                        <a href="{{ url('/clashes') }}" class="btn btn-dark mt-auto">Megnyítás</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Versenyek</h5>
                        <p class="card-text">Versenyek rögzítése, szerkesztése, törlése.</p>
                        <p class="card-text"><small class="text-muted">Tipp: A versenyek kezdési és befejezési ideje is megadható.</small></p>
                        <a href="{{ url('/competitions') }}" class="btn btn-dark mt-auto">Megnyítás</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
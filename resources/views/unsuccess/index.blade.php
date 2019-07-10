@extends('layouts.app')

@section('content')
@php
    $previous = url()->previous();
@endphp
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-danger">Sikertelen mentés</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"><p>
                    <a href="{{$previous}}" class="card-link">Vissza</a>
                    <a href="/" class="card-link">Főoldal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
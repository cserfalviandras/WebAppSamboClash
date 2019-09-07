@extends('layouts.app')

@section('content')
@php
    $previous = url()->previous();
@endphp
<div class="container">
    <div class="row justify-content-center">
        @include('components.success_message', [
            'success' => 1,
            'title' => 'Sikeres mentés', 
            'subTitle' => 'A kért módosítás mentése sikeres volt'
            ])
    </div>
</div>
@endsection
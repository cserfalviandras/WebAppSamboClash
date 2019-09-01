@extends('layouts.app')

@section('content')
@php
    $previous = url()->previous();
@endphp
<div class="container">
    <div class="row justify-content-center">
        @include('components.success_message', [
            'success' => 0,
            'title' => 'Sikertelen mentés', 
            'subTitle' => 'A kért módosítás mentése sikertelen volt'
            ])
    </div>    
</div>
@endsection
@extends('layouts.app')

@section('content')
@php
    $previous = url()->previous();
@endphp
<div class="container">
    <div class="row justify-content-center">
        @include('components.success_message', [
            'success' => 0,
            'title' => 'A mérkőzés még nem választható ki', 
            'subTitle' => 'Kérjük várja meg, amíg befejeződnek a konfigurálások.'
            ])
    </div>    
</div>
@endsection
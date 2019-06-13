@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user -> name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="p-2">{{ $user->profile->title }}</div>
                    <div class="p-2">{{ $user->profile->description }}</div>
                    <div class="p-2">{{ $user->profile->url ?? 'N/A' }}</div>
                    <div>
                        <a href="">
                            Add new
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

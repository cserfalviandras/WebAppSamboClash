@extends('layouts.app')

@section('content')
@role('admin')
    I am admin!
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>
                </div>
            </div>
        </div>
    </div>
@else
    I am not an admin...
@endrole
@endsection

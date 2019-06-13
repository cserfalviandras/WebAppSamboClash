@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create post</div>

                <div class="card-body">
                    <form action="/p" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="caption" class="col-md-6 col-form-label">Post Caption</label>

                                    <input 
                                        id="caption" 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        name="caption" 
                                        value="{{ old('caption') }}" 
                                        required
                                        autofocus>

                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="image" class="col-md-6 col-form-label">Post Image</label>
                            <input 
                                id="image"
                                type="file"
                                class="form-control-file"  
                                name="image">

                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="row pt-4">
                            <button class="btn btn-primary" type="submit">Add New Post</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

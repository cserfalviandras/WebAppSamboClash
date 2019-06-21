@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzések</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített mérkőzések</h6>
                    <p class="card-text">lista..<p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Új Mérkőzések</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Mérkőzés rögzítése</h6>
                    <form class="pt-3">
                        <div class="form-group">
                            <label for="inputClashName">Verseny</label>
                            <input type="text" class="form-control" id="inputClashName" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="inputClashName">Korosztály</label>
                            <input type="text" class="form-control" id="inputClashName" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="inputClashName">Súlycsoport</label>
                            <input type="text" class="form-control" id="inputClashName" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="inputClashName">Kezdési időpont</label>
                            <input type="text" class="form-control" id="inputClashName" placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
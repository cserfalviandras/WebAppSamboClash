@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Versenyzők</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített versenyzők</h6>
                    <p class="card-text">lista..<p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Új versenyző</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Versenyző rögzítése</h6>
                    <form class="pt-3">
                        <div class="form-group">
                            <label for="inputClashName">Név</label>
                            <input type="text" class="form-control" id="inputClashName" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Korosztály</label>
                            <input type="text" class="form-control" id="inputDate" name="daterange" value="" />
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Súlycsoport</label>
                            <input type="text" class="form-control" id="inputDate" name="daterange" value="" />
                        </div>
                        
                        <div class="form-group">
                            <label for="inputDate">Egyesület</label>
                            <input type="text" class="form-control" id="inputDate" name="daterange" value="" />
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Születési idő</label>
                            <input type="text" class="form-control" id="inputDate" name="daterange" value="" />
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Születési hely</label>
                            <input type="text" class="form-control" id="inputDate" name="daterange" value="" />
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Anyja leánykori neve</label>
                            <input type="text" class="form-control" id="inputDate" name="daterange" value="" />
                        </div>

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
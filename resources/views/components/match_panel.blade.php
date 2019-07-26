@php
    use App\competitor;
    $competitor_name = competitor::where('id', ($comp_id+1))->first()->name;
@endphp
<div class="card">
    <div class="card-body text-white <?php if($dress_id == 1){echo 'bg-primary'; } else { echo 'bg-danger'; } ?>">
        <h5 class="card-title">{{$competitor_name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        
        <div class="form-group">
            <label for="inputStartTime">Pont</label>
            <div class="row">
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">+</button>
                </div>
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">-</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputStartTime">Büntetés</label>
            <div class="row">
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">+</button>
                </div>
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">-</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputStartTime">Leszorítás</label>
            <div class="row">
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">Indít</button>
                </div>
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">Állj</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputStartTime">Feszítés</label>
            <div class="row">
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">Indít</button>
                </div>
                <div class="col-sm">
                    <button type="" class="btn btn-light  btn-block">Állj</button>
                </div>
            </div>
        </div>
    </div>
</div>
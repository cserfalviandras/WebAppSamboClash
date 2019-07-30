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
                    <button id={{"btn-addpoint-".$panel_id}} class="btn btn-light  btn-block">+</button>
                </div>
                <div class="col-sm">
                    <button id={{"btn-removepoint-".$panel_id}} class="btn btn-light  btn-block">-</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputStartTime">Büntetés</label>
            <div class="row">
                <div class="col-sm">
                    <button id={{"btn-addpunishment-".$panel_id}} class="btn btn-light  btn-block">+</button>
                </div>
                <div class="col-sm">
                    <button id={{"btn-removepunishment-".$panel_id}} class="btn btn-light  btn-block">-</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputStartTime">Leszorítás</label>
            <div class="row">
                <div class="col-sm">
                    <button id={{"btn-startsqueeze-".$panel_id}} class="btn btn-light  btn-block">Indít</button>
                </div>
                <div class="col-sm">
                    <button id={{"btn-stopsqueeze-".$panel_id}} class="btn btn-light  btn-block">Állj</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputStartTime">Feszítés</label>
            <div class="row">
                <div class="col-sm">
                    <button id={{"btn-startspan-".$panel_id}} class="btn btn-light  btn-block">Indít</button>
                </div>
                <div class="col-sm">
                    <button id={{"btn-stopspan-".$panel_id}} class="btn btn-light  btn-block">Állj</button>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $competitor_name = App\competitor::where('id', ($comp_id+1))->first()->name;
@endphp
<div class="row">
    <div class="card w-100">
        <div class="card-body text-white <?php if($dress_id == 1){echo 'bg-primary'; } else { echo 'bg-danger'; } ?>">
            <div class="row">
                <div class="col-md-5">
                    <div style="font-size:4rem !important;" class="card-title">{{$competitor_name}}</div>
                    <div style="font-size:2rem !important;" class="card-subtitle mb-2 text-white">Egyesület</div>
                </div>
                <div class="col-md-3">
                    <div class="row mx-5 h-100">
                        <div class="col-sm-12 my-auto text-center font-weight-bold">
                        <div class="text-dark bg-warning rounded" style="font-size:4rem !important;">{{$dress_id+1}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 w-100">
                    <div class="row h-100">
                        <div class="col-sm-12 my-auto text-center font-weight-bold">
                            <div style="font-size:10rem !important;" id={{"point_field-".$dress_id}}></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

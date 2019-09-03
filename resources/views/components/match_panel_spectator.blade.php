@php
    $competitor_name = App\competitor::where('id', ($comp_id+1))->first()->name ?? '-';
@endphp
<div class="row">
    <div class="card w-100" style="min-height:300px;">
        <div class="card-body text-white <?php if($dress_id == 1){echo 'bg-primary'; } else { echo 'bg-danger'; } ?>">
            <div class="row">
                <?php
                    if($dress_id == 0) {
                        ?>
                            <div class="col-md-5">
                                <div class="row h-100">
                                    <div class="ml-3">
                                        <div style="font-size:4rem !important;" class="text-white" style="font-size:3rem">{{$competitor_name}}</div>
                                        <div style="font-size:2rem !important;" class="mb-2 text-white" style="font-size:1rem" >{{$organization}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row mx-5 h-100">
                                    <div class="col-sm-12 my-auto text-center font-weight-bold">
                                    <div class="text-dark bg-warning rounded" style="font-size:4rem !important; min-width:60px; !important; max-width:120px;" id={{"punishment_field-".$dress_id}}>-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 w-100">
                                <div class="row h-100">
                                    <div class="col-sm-12 my-auto text-center font-weight-bold">
                                        <div style="font-size:10rem !important;" id={{"point_field-".$dress_id}}></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-5">
                            <div class="row h-100">
                                <div class="mt-auto ml-3">
                                    <div style="font-size:2rem !important;" class="mb-2 text-white" style="font-size:1rem">{{$organization}}</div>
                                    <div style="font-size:4rem !important;" class="text-white" style="font-size:3rem">{{$competitor_name}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row mx-5 h-100">
                                <div class="col-sm-12 my-auto text-center font-weight-bold">
                                    <div class="text-dark bg-warning rounded" style="font-size:4rem !important; min-width:60px; !important; max-width:120px;" id={{"punishment_field-".$dress_id}}>-</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 w-100">
                            <div class="row h-100">
                                <div class="col-sm-12 my-auto text-center font-weight-bold">
                                    <div style="font-size:10rem !important;" id={{"point_field-".$dress_id}}></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>

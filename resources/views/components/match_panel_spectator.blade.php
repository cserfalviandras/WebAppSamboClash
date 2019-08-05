@php
    use App\competitor;
    $competitor_name = competitor::where('id', ($comp_id+1))->first()->name;
@endphp
<div class="row">
    <div class="card w-100">
        <div class="card-body text-white <?php if($dress_id == 1){echo 'bg-primary'; } else { echo 'bg-danger'; } ?>">
            <h1 class="card-title">{{$competitor_name}}</h1>
            <h3 class="card-subtitle mb-2 text-white">Egyesület</h3>

            <p id={{"point_field-".$dress_id}}></p>
        </div>
    </div>
</div>

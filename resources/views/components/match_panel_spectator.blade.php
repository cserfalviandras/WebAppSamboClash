@php
    use App\competitor;
    $competitor_name = competitor::where('id', ($comp_id+1))->first()->name;
@endphp
<div class="row">
    <div class="card">
        <div class="card-body text-white <?php if($dress_id == 1){echo 'bg-primary'; } else { echo 'bg-danger'; } ?>">
        </div>
    </div>
</div>

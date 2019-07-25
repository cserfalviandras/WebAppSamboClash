@php
    use App\competitor;
    $competitor_name = competitor::where('id', ($comp_id+1))->first()->name;
@endphp
<div class="card">
    <div class="card-body text-white <?php if($dress_id == 1){echo 'bg-primary'; } else { echo 'bg-danger'; } ?>">
        <h5 class="card-title">{{$competitor_name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <div class="form-group">
        <table class="table">
            <tr>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
                <td>
                    <button type="" class="btn btn-dark  btn-block">-</button>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>
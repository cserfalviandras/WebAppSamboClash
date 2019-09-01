<div class="col-md-6">
    <div class="card <?php if($success == 1){echo 'border-success'; } else { echo 'border-danger'; } ?>">
        <div class="card-body">
            <h5 class="card-title h3 <?php if($success == 1){echo 'text-success'; } else { echo 'text-danger'; } ?>">{{$title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$subTitle}}</h6>
            <p class="card-text">Folytatáshoz válasszon az alábbi navigációs lehetőségek közül, vagy az oldal tetején megtalálható menüsávból.<p>
            <a href="{{$previous}}" class="card-link btn btn-secondary" type="button">Vissza az előző oldalra</a>
            <a href="/" class="card-link btn btn-secondary float-right">Főoldal</a>
        </div>
    </div>
</div>
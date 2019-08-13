<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sambo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    SAMBO
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-sm-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Nézői oldal</h5>
                                <p class="card-text">Még el nem kezdett, folyamatban lévő és már befejeződött mérkőzések megtekintése. A felületek eléréséhez nem szükséges regisztráció.</p>
                                <a href="<?php echo e(url('/spectator')); ?>" class="btn btn-primary mt-auto">Belépés</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Adminisztrátori oldal</h5>
                                <p class="card-text">Versenyek, mérkőzések és versenyzők teljeskörű adminisztrációja, valamint az egyes mérkőzések levezetése. Használatához regisztráció és <b>adminisztrátori jogosultság szükséges</b>.</p>
                                <a href="<?php echo e(url('/administrator')); ?>" class="btn btn-dark mt-auto">Belépés</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/welcome.blade.php ENDPATH**/ ?>
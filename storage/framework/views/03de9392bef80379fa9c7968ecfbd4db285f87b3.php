<?php $__env->startSection('content'); ?>
<?php
    $previous = url()->previous();
?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sikeres mentés</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"><p>
                    <a href="<?php echo e($previous); ?>" class="card-link">Vissza</a>
                    <a href="/" class="card-link">Főoldal</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/success/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<?php if(auth()->check() && auth()->user()->hasRole('spectator')): ?>
    I am admin!
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    I am not an admin...
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/home.blade.php ENDPATH**/ ?>
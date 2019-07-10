<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e($user -> name); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                    <div class="p-2"><?php echo e($user->profile->title); ?></div>
                    <div class="p-2"><?php echo e($user->profile->description); ?></div>
                    <div class="p-2"><?php echo e($user->profile->url ?? 'N/A'); ?></div>
                    <div>
                        <a href="">
                            Add new
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/profiles/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create post</div>

                <div class="card-body">
                    <form action="/p" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="caption" class="col-md-6 col-form-label">Post Caption</label>

                                    <input 
                                        id="caption" 
                                        type="text" 
                                        class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                        name="caption" 
                                        value="<?php echo e(old('caption')); ?>" 
                                        required
                                        autofocus>

                                    <?php if ($errors->has('caption')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('caption'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="image" class="col-md-6 col-form-label">Post Image</label>
                            <input 
                                id="image"
                                type="file"
                                class="form-control-file"  
                                name="image">

                            <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                <strong><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="row pt-4">
                            <button class="btn btn-primary" type="submit">Add New Post</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/posts/create.blade.php ENDPATH**/ ?>
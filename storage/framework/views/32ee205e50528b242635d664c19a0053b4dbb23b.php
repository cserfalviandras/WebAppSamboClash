<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzések</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített mérkőzések</h6>
                    <div class="pt-3 table-responsive">
                        <table id="clashes_table" class="table table-striped table-wrapper">
                            <thead>
                                <th>Korosztály</th>
                                <th>Súlycsoport</th>
                                <th>Dátum</th>
                                <th>Állapot</th>
                                <th></th>
                                <th></th>
                            </thead>
    
                            <tbody>
                                <?php $__currentLoopData = $clashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('components.clash_row', [
                                        'clash_id' => $clash->id,
                                        'age_group_id' => $clash->age_group_id, 
                                        'weight_cat_id' => $clash->weight_cat_id,
                                        'start_time' => $clash->start_time,
                                        'clash_status_id' => $clash->clash_status_id
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Új Mérkőzés</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Mérkőzés rögzítése</h6>
                    <form class="pt-3" action="/clashes/store" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="inputAgeGroup">Korosztály</label>
                            <input 
                                id="inputAgeGroup" 
                                type="text" 
                                class="form-control"
                                name="inputAgeGroup" 
                                value="<?php echo e(old('inputAgeGroup')); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputAgeGroup')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputAgeGroup'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputWeightCat">Súlycsoport</label>
                            <input 
                                id="inputWeightCat" 
                                type="text" 
                                class="form-control"
                                name="inputWeightCat" 
                                value="<?php echo e(old('inputWeightCat')); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputWeightCat')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputWeightCat'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputStartTime">Dátum</label>
                                    <input 
                                        id="inputStartTime" 
                                        type="date" 
                                        class="form-control"
                                        name="inputStartTime" 
                                        value="<?php echo e(old('inputStartTime')); ?>" 
                                        required
                                        autofocus>
        
                                    <?php if ($errors->has('inputStartTime')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputStartTime'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/clashes/index.blade.php ENDPATH**/ ?>
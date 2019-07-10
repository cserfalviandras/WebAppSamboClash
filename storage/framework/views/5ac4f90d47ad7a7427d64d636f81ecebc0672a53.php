<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mérkőzés</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/clashes/update" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input 
                                id="inputClashId" 
                                type="hidden" 
                                class="form-control"
                                name="inputClashId" 
                                value="<?php echo e($clash->clash_id); ?>" 
                                required
                                >
                        </div>

                        <div class="form-group">
                            <label for="inputAgeGroup">Korosztály</label>
                            <input 
                                id="inputAgeGroup" 
                                type="text" 
                                class="form-control"
                                name="inputAgeGroup" 
                                value="<?php echo e(old('inputAgeGroup', $clash->age_group_id)); ?>" 
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
                                value="<?php echo e(old('inputWeightCat', $clash->weight_cat_id)); ?>" 
                                required
                                >

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
                                    <label for="inputStartTime">Kezdési idő</label>
                                    <input 
                                        id="inputStartTime" 
                                        type="datetime-local" 
                                        class="form-control"
                                        name="inputStartTime" 
                                        value="<?php echo e(old('inputStartTime', $clash->start_time)); ?>" 
                                        required
                                        >
        
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
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputEndTime">Befejezési idő</label>
                                    <input 
                                        id="inputEndTime" 
                                        type="datetime-local" 
                                        class="form-control"
                                        name="inputEndTime" 
                                        value="<?php echo e(old('inputEndTime', $clash->end_time)); ?>" 
                                        required
                                        >
        
                                    <?php if ($errors->has('inputEndTime')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputEndTime'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Státusz</label>
                            <input 
                                id="inputStatus" 
                                type="text" 
                                class="form-control"
                                name="inputStatus" 
                                value="<?php echo e(old('inputStatus', $clash->clash_status_id)); ?>" 
                                required
                                >

                            <?php if ($errors->has('inputStatus')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputStatus'); ?>
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
                                    <?php
                                        $tempCompId = $clashCompetitors->comp_id ?? null;
                                    ?>

                                    <label for="inputCompetitor_1_id">Ellenfél 1</label>
                                    <select class="form-control" name="inputCompetitor_1_id">
                                        <?php $__currentLoopData = $competitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e($tempCompId == $key ? 'selected' : ''); ?>> 
                                                <?php echo e($value->name); ?>, <?php echo e($value->birth_date); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    </select>
        
                                    <?php if ($errors->has('inputCompetitor_1_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputCompetitor_1_id'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <?php
                                        $tempCompId = $clashCompetitors->comp_id_2 ?? null;
                                    ?>

                                    <label for="inputCompetitor_2_id">Ellenfél 2</label>
                                    <select class="form-control" name="inputCompetitor_2_id">
                                        <?php $__currentLoopData = $competitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"  <?php echo e($tempCompId == $key ? 'selected' : ''); ?>> 
                                                <?php echo e($value->name); ?>, <?php echo e($value->birth_date); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    </select>
        
                                    <?php if ($errors->has('inputCompetitor_2_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputCompetitor_2_id'); ?>
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
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/clashes/edit.blade.php ENDPATH**/ ?>
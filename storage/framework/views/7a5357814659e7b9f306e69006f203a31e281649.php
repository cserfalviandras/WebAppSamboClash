<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Versenyző</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/competitors/update" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input 
                                id="inputCompId" 
                                type="hidden" 
                                class="form-control"
                                name="inputCompId" 
                                value="<?php echo e($comp->comp_id); ?>" 
                                required
                                >
                        </div>

                        <div class="form-group">
                            <label for="inputCompetitorName">Név</label>
                            <input 
                                id="inputCompetitorName" 
                                type="text" 
                                class="form-control"
                                name="inputCompetitorName" 
                                value="<?php echo e(old('inputCompetitorName', $comp->name)); ?>" 
                                required
                                autofocus>
    
                            <?php if ($errors->has('inputCompetitorName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputCompetitorName'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
    
                        <div class="form-group">
                            <label for="inputBirthDate">Születési dátum</label>
                            <input 
                                id="inputBirthDate" 
                                type="date" 
                                min="1919-01-01"
                                class="form-control"
                                name="inputBirthDate" 
                                value="<?php echo e(old('inputBirthDate', $comp->birth_date)); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputBirthDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputBirthDate'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputBirthPlace">Születési hely</label>
                            <input 
                                id="inputBirthPlace" 
                                type="text" 
                                class="form-control"
                                name="inputBirthPlace" 
                                value="<?php echo e(old('inputBirthPlace', $comp->birth_place)); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputBirthPlace')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputBirthPlace'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputMothersMaidenName">Anyja születési neve</label>
                            <input 
                                id="inputMothersMaidenName" 
                                type="text" 
                                class="form-control"
                                name="inputMothersMaidenName" 
                                value="<?php echo e(old('inputMothersMaidenName', $comp->mother_maiden_name)); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputMothersMaidenName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputMothersMaidenName'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <?php
                            //dd($comp);
                        ?>

                        <div class="form-group">
                            <label for="inputWeightCategory">Súlycsoport</label>
                            <input 
                                id="inputWeightCategory" 
                                type="text" 
                                class="form-control"
                                name="inputWeightCategory" 
                                value="<?php echo e(old('inputWeightCategory',$comp->weight_cat_id)); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputWeightCategory')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputWeightCategory'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputAgeGroup">Korosztály</label>
                            <input 
                                id="inputAgeGroup" 
                                type="text" 
                                class="form-control"
                                name="inputAgeGroup" 
                                value="<?php echo e(old('inputAgeGroup',$comp->age_group_id)); ?>" 
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
                            <label for="inputOrganization">Szövetség</label>
                            <input 
                                id="inputOrganization" 
                                type="text" 
                                class="form-control"
                                name="inputOrganization" 
                                value="<?php echo e(old('inputOrganization',$comp->organization_id)); ?>" 
                                required
                                autofocus>

                            <?php if ($errors->has('inputOrganization')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputOrganization'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/competitors/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Verseny</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerkesztés</h6>

                    <form class="pt-3" action="/competitions/update" enctype="multipart/form-data" method="post">
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
                            <label for="inputCompetitionName">Megnevezés</label>
                            <input 
                                id="inputCompetitionName" 
                                type="text" 
                                class="form-control"
                                name="inputCompetitionName" 
                                value="<?php echo e(old('inputCompetitionName', $comp->name)); ?>"
                                required
                                autofocus>

                            <?php if ($errors->has('inputCompetitionName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputCompetitionName'); ?>
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
                                    <label for="inputCompetitionStartDate">Mettől</label>
                                    <input 
                                        id="inputCompetitionStartDate" 
                                        type="date" 
                                        min="2019-01-01"
                                        class="form-control"
                                        name="inputCompetitionStartDate" 
                                        value="<?php echo e(old('inputCompetitionStartDate', $comp->start_date)); ?>"
                                        required
                                        autofocus>
        
                                    <?php if ($errors->has('inputCompetitionStartDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputCompetitionStartDate'); ?>
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
                                    <label for="inputCompetitionEndDate">Meddig</label>
                                    <input 
                                        id="inputCompetitionEndDate" 
                                        type="date" 
                                        class="form-control"
                                        name="inputCompetitionEndDate" 
                                        value="<?php echo e(old('inputCompetitionEndDate', $comp->end_date)); ?>"
                                        required
                                        autofocus>
        
                                    <?php if ($errors->has('inputCompetitionEndDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inputCompetitionEndDate'); ?>
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
                            <label>A <?php echo e($comp->name); ?> verseny mérkőzései</label>
                            <div class="pt-3 table-responsive">
                                <table id="clashes_table" class="table">
                                    <thead>
                                        <th>Törlés</th>
                                        <th>Korosztály</th>
                                        <th>Súlycsoport</th>
                                        <th>Kezdési idő</th>
                                        <th>Állapot</th>
                                        <th></th>
                                    </thead>
            
                                    <tbody>
                                        <?php if(@isset($competitionClashes)): ?>
                                            <?php $__currentLoopData = $competitionClashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition_clash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $clash = app\clash::where('clash_id',$competition_clash->clash_id)->first();
                                                ?>
                                                <?php echo $__env->make('components.clash_remove_row', [
                                                    'clash_id' => $clash->clash_id,
                                                    'age_group_id' => $clash->age_group_id, 
                                                    'weight_cat_id' => $clash->weight_cat_id,
                                                    'start_time' => $clash->start_time,
                                                    'clash_status_id' => $clash->clash_status_id
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Hozzáadható mérkőzések</label>
                            <div class="pt-3 table-responsive">
                                <table id="clashes_table" class="table">
                                    <thead>
                                        <th>Hozzáadás</th>
                                        <th>Korosztály</th>
                                        <th>Súlycsoport</th>
                                        <th>Kezdési idő</th>
                                        <th>Állapot</th>
                                        <th></th>
                                    </thead>
            
                                    <tbody>
                                        <?php $__currentLoopData = $clashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('components.clash_add_row', [
                                                'clash_id' => $clash->clash_id,
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
            
                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/competitions/edit.blade.php ENDPATH**/ ?>
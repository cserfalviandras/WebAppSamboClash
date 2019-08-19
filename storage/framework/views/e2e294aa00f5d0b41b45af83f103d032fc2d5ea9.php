<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Versenyek</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rögzített versenyek</h6>
                    <div class="pt-3 table-responsive">
                        <table class="table table-striped table-wrapper">
                            <thead>
                                <th>Megnevezés</th>
                                <th>Kezdési dátum</th>
                                <th>Befejezési dátum</th>
                                <th></th>
                            </thead>
    
                            <tbody>
                                <?php $__currentLoopData = $competitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('components.competition_row', [
                                        'comp_id' => $competition->id,
                                        'name' => $competition->name, 
                                        'start_date' => $competition->start_date,
                                        'end_date' => $competition->end_date
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
                    <h5 class="card-title">Új verseny</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Verseny rögzítése</h6>
                    <form class="pt-3" action="/competitions/store" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="inputCompetitionName">Megnevezés</label>
                            <input 
                                id="inputCompetitionName" 
                                type="text" 
                                class="form-control"
                                name="inputCompetitionName" 
                                value="<?php echo e(old('inputCompetitionName')); ?>" 
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
                                        value="<?php echo e(old('inputCompetitionStartDate')); ?>" 
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
                                        value="<?php echo e(old('inputCompetitionEndDate')); ?>" 
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

                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/competitions/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo $__env->make('shared._search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="row"><?php echo e($logistics->count().'/'.$logistics->total(), false); ?>



    </div>
    <div class="row p-2 flex-column">
        <?php $__currentLoopData = $logistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-2 col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($logistic->user->company->comp_name.$logistic->id, false); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo e($logistic->description, false); ?></h6>
                    <p class="card-text">
                        <?php echo e($logistic->startAddress, false); ?>

                        <i class="iconfont iconzhuanhuan text-primary"></i>
                        <?php echo e($logistic->startAddress, false); ?></p>
                    
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptsAfterJs'); ?>
    <script>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/pages/search.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
    <ul>
        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($item->code . '-'. $item->name, false); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php echo e($city->onEachSide(2)->links(), false); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/pages/city.blade.php ENDPATH**/ ?>
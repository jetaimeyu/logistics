<?php $__env->startSection('title', '首页'); ?>
<?php $__env->startSection('content'); ?>
    <div><img src="<?php echo e($image, false); ?>" alt=""></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/pages/xxx.blade.php ENDPATH**/ ?>
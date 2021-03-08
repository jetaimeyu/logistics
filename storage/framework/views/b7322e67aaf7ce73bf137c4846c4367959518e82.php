<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scale=no">
    <title><?php echo e(config('app.name'), false); ?>- <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="Keywords" content="<?php echo e(config('app.keywords'), false); ?>-<?php echo $__env->yieldContent('keywords'); ?>">
    <meta name="Description" content="<?php echo e(config('app.description'), false); ?>-<?php echo $__env->yieldContent('description'); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">
        <link rel="stylesheet" href="//at.alicdn.com/t/font_2387487_oiqbcaenf3.css">
    <style>
        .BMap_cpyCtrl {
            display: none;
        }
        .anchorBL {
            display: none;
        }
        .modal-open {
        　　overflow: auto !important;
        }
    </style>
</head>
<body>
<?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div  class="container">
    <div id="app" class="<?php echo e(route_class(), false); ?>-page">
        <?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(mix('js/app.js'), false); ?>"></script>
<?php echo $__env->yieldContent('scriptsAfterJs'); ?>
</body>
</html>
<?php /**PATH F:\www\logistics\resources\views/layouts/default.blade.php ENDPATH**/ ?>
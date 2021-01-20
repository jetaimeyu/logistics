
<?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert" id="common-err">
        <button type="button" class="close" aria-label="Close" onclick="$('#common-err').hide()">
            <span aria-hidden="true">×</span></button>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error, false); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH F:\www\logistics\resources\views/shared/_errors.blade.php ENDPATH**/ ?>
<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">萨瓦迪卡</h5>
            <span class="text-muted">heiheihei mmp.</span>
        </div>
    </div>
    
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if(Auth::check()): ?>
            <div class="dropdown justify-content-end">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(auth()->user()->name, false); ?>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo e(route('personal.index'), false); ?>">个人中心</a>
                    <a class="dropdown-item" href="<?php echo e(route('logistic.index'), false); ?>">我的专线</a>
                    <form method="post" action="<?php echo e(route('logout'), false); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('login'), false); ?>">登录</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('users.create'), false); ?>">注册</a>
                </li>
            </ul>
        <?php endif; ?>
    </nav>
</div>
<?php $__env->startSection('scriptAfterJS'); ?>
    <script>
        $('#nav-tabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH F:\www\logistics\resources\views/layouts/_header.blade.php ENDPATH**/ ?>
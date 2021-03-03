<div class="pos-f-t">
    <nav class="navbar sticky-top navbar-light navbar-expand-md" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">LOGISTICS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <?php if(Auth::check()): ?>
                <div class="dropdown justify-content-end d-flex">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(auth()->user()->name, false); ?>

                    </button>
                    <div class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton">
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
        </div>
        
        
        

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
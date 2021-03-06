
<?php $__env->startSection('title', '个人中心'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3">
            <nav class="navbar navbar-light bg-light">
                <ul class="nav d-flex flex-column border-0">
                    <li class="active nav-item m-2">
                        <a class="breadcrumb-item active text-decoration-none" href="#user" rel="external nofollow"
                           data-toggle="tab">个人信息</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="breadcrumb-item text-decoration-none" href="#company" rel="external nofollow"
                           data-toggle="tab">企业信息</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-9 tab-content">
            <div class="tab-pane active" id="user">
                <div class="row m-3 align-middle">
                    <div class="col-md-2 text-md-right align-middle">
                        用户名
                    </div>
                    <div class="col-md-8">
                        <?php echo e($user->name, false); ?>

                        <a href="#" onclick="changeUserName()" class="text-decoration-none d-inline-block"><i
                                class="iconfont icon-edit"
                                style="font-size: 1.4rem;line-height: 1.4rem; margin-left: 20px" title="修改用户名"></i></a>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-md-2 text-md-right">手机号</div>
                    <div class="col-md-8"><?php echo e($user->phone, false); ?></div>
                </div>
            </div>
            <div class="tab-pane" id="company">
                <?php if($user->company): ?>
                <div class="row m-3">
                    <div class="col-md-2  text-md-right">企业名称</div>
                    <div class="col-md-8"><?php echo e($user->company->compName, false); ?></div>
                </div>
                <div class="row m-3">
                    <div class="col-md-2 text-md-right">联系人</div>
                    <div class="col-md-8"><?php echo e($user->company->contact, false); ?></div>
                </div>
                <div class="row m-3">
                    <div class="col-md-2 text-md-right">手机</div>
                    <div class="col-md-8"><?php echo e($user->company->phone, false); ?></div>
                </div>
                <div class="row m-3">
                    <div class="col-md-2 text-md-right">座机</div>
                    <div class="col-md-8"><?php echo e($user->company->tel, false); ?></div>
                </div>
                <div class="row m-3">
                    <div class="col-md-2 text-md-right">地址</div>
                    <div class="col-md-8"><?php echo e($user->company->address, false); ?><?php echo e($user->company->detail_address, false); ?></div>
                </div>
                <div class="m-3 col-md-10" style="text-align: center">
                    <a href="<?php echo e(route('company.edit', ['user' => $user->id]), false); ?>" class="btn btn-primary">修改</a>
                </div>
                <?php else: ?>
                    <div class="m-3 col-md-10" style="text-align: center">
                        <a href="<?php echo e(route('company.create'), false); ?>" class="btn btn-primary">新增</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptsAfterJs'); ?>
    <script>
        function changeUserName() {
            swal({
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "请输入新的用户名",
                        type: "text",
                    },
                },
            }).then(function (message) {
                console.log(message)
                if (!!message) {
                    axios.put('edit', {'name': message}).then(function (res) {
                        location.reload();
                    })
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/personal/index.blade.php ENDPATH**/ ?>
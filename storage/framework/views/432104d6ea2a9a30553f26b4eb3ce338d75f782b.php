
<?php $__env->startSection('title', '专线列表'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        
        <div class="card panel-default">
            <div class="card-header">
                <h5 class="float-left">专线列表</h5>
                <a href="<?php echo e(route('logistic.create'), false); ?>" class="float-right">添加专线</a>
            </div>
            <div class="card-body">

                <table class="table table-responsive table-bordered table-hover table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">出发地</th>
                        <th>出发地联系人</th>
                        <th>出发地手机号</th>
                        <th>目的地</th>
                        <th>目的地联系人</th>
                        <th>目的地手机号</th>

                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $logisticsLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logisticsLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($logisticsLine->start_province.$logisticsLine->startCity.$logisticsLine->startDistrict, false); ?></td>
                            <td><?php echo e($logisticsLine->startContact, false); ?></td>
                            <td><?php echo e($logisticsLine->startPhone, false); ?></td>
                            <td><?php echo e($logisticsLine->endProvince.$logisticsLine->endCity.$logisticsLine->endDistrict, false); ?></td>
                            <td><?php echo e($logisticsLine->endContact, false); ?></td>
                            <td><?php echo e($logisticsLine->endPhone, false); ?></td>

                            <td><?php echo e($logisticsLine->status, false); ?></td>
                            <td>
                                <?php if($logisticsLine->state!=1): ?>
                                    <a href="<?php echo e(route('logistic.edit',['logistics_line'=>$logisticsLine->id]), false); ?>" class="btn btn-primary">修改</a>
                                <?php endif; ?>
                                <button onclick="deleteLogisticsLine(this)" data-id="<?php echo e($logisticsLine->id, false); ?>"
                                        class="btn btn-danger">删除
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptsAfterJs'); ?>
    <script>
        function deleteLogisticsLine(dom) {
            var id = $(dom).data('id');
            swal({
                title: '提示',
                text: "确定删除吗？",
                buttons: ['取消', '确定'],
                icon: 'warning',


            })
                .then(function (res) {
                    if (!!res) {
                        axios.delete('logistic/' + id)
                            .then(function () {
                                window.location.reload();
                            })
                    }
                })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/logistic/index.blade.php ENDPATH**/ ?>
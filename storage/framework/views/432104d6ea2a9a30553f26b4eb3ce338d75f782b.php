<?php $__env->startSection('title', '专线列表'); ?>
<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-1">
            <li class="breadcrumb-item"><a href="/">home</a></li>
            <li class="breadcrumb-item active" aria-current="page">专线列表</li>
            <a href="<?php echo e(route('logistic.create'), false); ?>" class="float-right is-justify-end">添加专线</a>
        </ol>
    </nav>
    <div class="row">
        <?php $__currentLoopData = $logisticsLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logisticsLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card col-12 m-2">
                <div class="card-body">
                    <div class="row">
                        <div><?php echo e($logisticsLine->start_province.$logisticsLine->startCity.$logisticsLine->startDistrict, false); ?></div>
                        <i class="iconfont icon-qiehuan"></i>
                        <div><?php echo e($logisticsLine->endProvince.$logisticsLine->endCity.$logisticsLine->endDistrict, false); ?></div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 p-0">
                            出发地联系人：<?php echo e($logisticsLine->startContact, false); ?> <?php echo e($logisticsLine->startPhone, false); ?></div>
                        <div class="col-md-6 p-0">
                            目的地联系人：<?php echo e($logisticsLine->endContact, false); ?><?php echo e($logisticsLine->endPhone, false); ?></div>
                    </div>
                    <div class="row">
                        <?php echo e($logisticsLine->description, false); ?>

                    </div>
                    <div class="row justify-content-end operate-button">
                        <a href="<?php echo e(route('logistic.edit',['logistics_line'=>$logisticsLine->id]), false); ?>"
                           class="btn btn-primary">修改</a>
                        <a href="#" onclick="deleteLogisticsLine(this)" data-id="<?php echo e($logisticsLine->id, false); ?>"
                           class="btn btn-primary">删除</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
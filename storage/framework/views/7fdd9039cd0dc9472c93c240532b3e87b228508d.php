<?php $__env->startSection('title', ($logisticLine->id?'编辑':'新增').'专线信息'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-2">
        <h5><?php echo e($logisticLine->id?'编辑':'新增', false); ?>专线信息</h5>
    </div>
    <div class="row justify-content-center">
        <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="container p-0">
        <?php if($logisticLine->id): ?>
            <form class="needs-validation" novalidate action="<?php echo e(route('logistic.update',['logistics_line'=>$logisticLine]), false); ?>" method="post">
            <?php echo method_field('put'); ?>
        <?php else: ?>
            <form class="needs-validation" novalidate action="<?php echo e(route('logistic.store'), false); ?>" method="post">
        <?php endif; ?>
            <?php echo csrf_field(); ?>
                <address-create-and-edit inline-template>
                    <div class="form-group">
                        <select-district inline-template @change="onDistrictChanged"
                                         :init-value="<?php echo e(json_encode([old('start_province', $logisticLine->start_province),old('start_city', $logisticLine->start_city),old('start_district', $logisticLine->start_district)]), false); ?>">
                            <div class="form-row align-items-center">
                                <label class="col-form-label col-sm-2 text-md-right"
                                       style="padding-right: 20px">出发地</label>
                                <div class="col-sm-3 mb-2 mt-2">
                                    <select class="form-control" v-model="provinceId" required pattern="">
                                        <option value="">选择省</option>
                                        <option v-for="(name, id) in provinces" :value="id">{{ name }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      请选择
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-2 mt-2">
                                    <select class="form-control" v-model="cityId" required>
                                        <option value="">选择市</option>
                                        <option v-for="(name, id) in cities" :value="id">{{ name }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        请选择
                                    </div>
                                </div>
                                <div class="col-sm-3  mb-2 mt-2">
                                    <select class="form-control" v-model="districtId" required>
                                        <option value="">选择区</option>
                                        <option v-for="(name, id) in districts" :value="id">{{ name }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        请选择
                                    </div>
                                </div>
                            </div>
                        </select-district>
                        <input type="text" hidden name="start_province" v-model="province">
                        <input type="text" hidden name="start_city" v-model="city">
                        <input type="text" hidden name="start_district" v-model="district">
                    </div>
                </address-create-and-edit>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label text-md-right">联系人</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="start_contact" name="start_contact"
                               placeholder="出发地联系人"
                               value="<?php echo e(old('start_contact', $logisticLine->start_contact), false); ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label text-md-right">手机号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="start_phone" name="start_phone"
                               placeholder="出发地联系人手机号" pattern="^((13[0-9])|(17[0-1,6-8])|(15[^4,\\D])|(18[0-9]))\d{8}$"
                               value="<?php echo e(old('start_phone', $logisticLine->start_phone), false); ?>" required>
                        <div class="invalid-feedback">请输入正确的手机号</div>
                    </div>
                </div>
                <address-create-and-edit inline-template>
                    <div class="form-group">
                        <select-district inline-template @change="onDistrictChanged"
                                         :init-value="<?php echo e(json_encode([old('end_province', $logisticLine->end_province),old('end_city', $logisticLine->end_city),old('end_district', $logisticLine->end_district)]), false); ?>">
                            <div class="form-row align-items-center">
                                <label class="col-form-label col-sm-2 text-md-right"
                                       style="padding-right: 20px">目的地</label>
                                <div class="col-sm-3  mb-2 mt-2">
                                    <select class="form-control" v-model="provinceId" required>
                                        <option value="">选择省</option>
                                        <option v-for="(name, id) in provinces" :value="id">{{ name }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        请选择
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-2 mt-2">
                                    <select class="form-control" v-model="cityId" required>
                                        <option value="">选择市</option>
                                        <option v-for="(name, id) in cities" :value="id">{{ name }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        请选择
                                    </div>
                                </div>
                                <div class="col-sm-3  mb-2 mt-2">
                                    <select class="form-control" v-model="districtId" required>
                                        <option value="">选择区</option>
                                        <option v-for="(name, id) in districts" :value="id">{{ name }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        请选择
                                    </div>
                                </div>
                            </div>
                        </select-district>
                        <input type="text" hidden name="end_province" v-model="province">
                        <input type="text" hidden name="end_city" v-model="city">
                        <input type="text" hidden name="end_district" v-model="district">
                    </div>
                </address-create-and-edit>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label text-md-right">联系人</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="end_contact" name="end_contact"
                               placeholder="目的地联系人"
                               value="<?php echo e(old('end_contact', $logisticLine->end_contact), false); ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label text-md-right">手机号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="end_phone" name="end_phone" pattern="^((13[0-9])|(17[0-1,6-8])|(15[^4,\\D])|(18[0-9]))\d{8}$"
                               placeholder="目的地联系人手机号" value="<?php echo e(old('end_phone', $logisticLine->end_phone), false); ?>" required>
                        <div class="invalid-feedback">请输入正确的手机号</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label text-md-right">描述</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="description" name="description" required
                           placeholder="请输入描述"><?php echo e(old('description', $logisticLine->description), false); ?></textarea>
                    </div>
                </div>
                <div class="row justify-content-center p-2">
                    <button class="btn btn-primary" type="submit">提交</button>
                </div>
            </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/logistic/create.blade.php ENDPATH**/ ?>
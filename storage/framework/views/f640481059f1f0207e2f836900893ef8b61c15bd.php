<form action="<?php echo e(route('search'), false); ?>" method="get" class="form-row align-items-center">
    <?php echo csrf_field(); ?>
    <div class="form-group select-text" style="font-size: 12px">
        <address-create-and-edit inline-template>
            <div class="form-group ">
                <select-district inline-template @change="onDistrictChanged"
                                 :init-value="<?php echo e(json_encode([old('start_province'),old('start_city'),old('start_district')]), false); ?>">
                    <div class="form-row">
                        <label class="col-form-label col-sm-2 text-md-right"
                               style="padding-right: 20px">始发地</label>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control   <?php $__errorArgs = ['start_province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" v-model="provinceId" required>
                                <option value="">选择省</option>
                                <option v-for="(name, id) in provinces" :value="id">{{ name }}</option>
                            </select>
                            <?php $__errorArgs = ['start_province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message, false); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  <?php $__errorArgs = ['start_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" v-model="cityId" required>
                                <option value="">选择市</option>
                                <option v-for="(name, id) in cities" :value="id">{{ name }}</option>
                            </select>
                            <?php $__errorArgs = ['start_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message, false); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  <?php $__errorArgs = ['start_district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" v-model="districtId" required>
                                <option value="">选择区</option>
                                <option v-for="(name, id) in districts" :value="id">{{ name }}</option>
                            </select>
                            <?php $__errorArgs = ['start_district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div><?php echo e($message, false); ?></div>
                            <div class="invalid-feedback"><?php echo e($message, false); ?>1</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </select-district>
                <input type="text" hidden name="start_province" v-model="province">
                <input type="text" hidden name="start_city" v-model="city">
                <input type="text" hidden name="start_district" v-model="district">
            </div>
        </address-create-and-edit>
        <address-create-and-edit inline-template>
            <div class="form-group">
                <select-district inline-template @change="onDistrictChanged"
                                 :init-value="<?php echo e(json_encode([old('end_province'),old('end_city'),old('end_district')]), false); ?>">
                    <div class="form-row input-group-sm">
                        <label class="col-form-label col-sm-2 text-md-right"
                               style="padding-right: 20px">目的地</label>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  <?php $__errorArgs = ['end_province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" v-model="provinceId" required>
                                <option value="">选择省</option>
                                <option v-for="(name, id) in provinces" :value="id">{{ name }}</option>
                            </select>
                            <?php $__errorArgs = ['end_province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message, false); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  <?php $__errorArgs = ['end_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" v-model="cityId" required>
                                <option value="">选择市</option>
                                <option v-for="(name, id) in cities" :value="id">{{ name }}</option>
                            </select>
                            <?php $__errorArgs = ['end_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message, false); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  <?php $__errorArgs = ['end_district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" v-model="districtId" >
                                <option value="">选择区</option>
                                <option v-for="(name, id) in districts" :value="id">{{ name }}</option>
                            </select>
                            <?php $__errorArgs = ['end_district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message, false); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </select-district>
                <input type="text" hidden name="end_province" v-model="province">
                <input type="text" hidden name="end_city" v-model="city">
                <input type="text" hidden name="end_district" v-model="district">
            </div>
        </address-create-and-edit>
    </div>
    <div class="form-group">
        <button type="submit" class="btn-primary btn  btn-sm">搜索</button>
    </div>
</form>
<?php /**PATH F:\www\logistics\resources\views/logistic/logisticSearch.blade.php ENDPATH**/ ?>
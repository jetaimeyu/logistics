<?php $__env->startSection('content'); ?>
    <div>
        <div class="mb-2" data-toggle="modal" data-target="#exampleModal">第一个地址<input type="text" name="first"></div>
        <div class="mb-2" data-toggle="modal" data-target="#exampleModal">第二个地址<input type="text" name="second"></div>
        <button class="btn btn-primary">搜索</button>
    </div>

    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">地址选择</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <address-create-and-edit inline-template>
                        <div class="form-group">
                            <select-district inline-template @change="onDistrictChanged">
                                <div class="form-group">
                                    <select class="form-control mb-2" v-model="provinceId">
                                        <option :value="id" v-for="(name,id) in provinces">{{name}}</option>
                                    </select>
                                    <select class="form-control mb-2"  v-model="cityId">
                                        <option value="">不限</option>
                                        <option :value="id" v-for="(name,id) in cities">{{name}}</option>
                                    </select>
                                    <select class="form-control mb-2"  v-model="districtId">
                                        <option value="">不限</option>
                                        <option :value="id" v-for="(name,id) in districts">{{name}}</option>
                                    </select>
                                </div>
                            </select-district>
                            <input type="text" hidden name="start_province" v-model="province">
                            <input type="text" hidden name="start_city" v-model="city">
                            <input type="text" hidden name="start_district" v-model="district">
                        </div>
                    </address-create-and-edit>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('ScriptAfterJS'); ?>
    <script>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/pages/xx.blade.php ENDPATH**/ ?>
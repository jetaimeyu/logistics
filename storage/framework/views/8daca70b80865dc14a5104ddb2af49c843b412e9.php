<?php $__env->startSection('content'); ?>
    <div>
        <test></test>
        <form action="<?php echo e(route('search'), false); ?>" method="get">
            <?php echo csrf_field(); ?>
            <div class="mb-2" data-toggle="modal" data-target="#addressSelectModal" @click="kkk">
                <label for="">第一个地址</label>
                <input autocomplete="off" type="text" id="start" name="first">
                <input hidden type="text" name="start_province">
                <input hidden type="text" name="start_city">
                <input hidden type="text" name="start_district">
            </div>
            <div class="mb-2" data-toggle="modal" data-target="#addressSelectModal">
                <label for="">第二个地址</label>
                <input autocomplete="off" type="text" id="end" name="second">
                <input hidden type="text" name="end_province">
                <input hidden type="text" name="end_city">
                <input hidden type="text" name="end_district">
            </div>

            <button type="submit" class="btn-primary btn  btn-sm">搜索</button>
        </form>
    </div>

    
    <div class="modal fade" id="addressSelectModal" tabindex="-1" role="dialog"
         aria-labelledby="addressSelectModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressSelectModalLabel">地址选择</h5>
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
                                    <select class="form-control mb-2" v-model="cityId">
                                        <option></option>
                                        <option :value="id" v-for="(name,id) in cities">{{name}}</option>
                                    </select>
                                    <select class="form-control mb-2" v-model="districtId">
                                        <option></option>
                                        <option :value="id" v-for="(name,id) in districts">{{name}}</option>
                                    </select>
                                </div>
                            </select-district>
                            <input type="text" hidden id="provinceName" v-model="province">
                            <input type="text" hidden id="cityName" v-model="city">
                            <input type="text" hidden id="districtName" v-model="district">
                        </div>
                    </address-create-and-edit>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="setAddress()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptsAfterJs'); ?>
    <script>
        var setAddress = () => {
            const province = $("#provinceName").val();
            const city = $("#cityName").val();
            const district = $("#districtName").val();
            console.log(province, city, district);
            $('#start').val(province + city + district)
            $('#addressSelectModal').modal('hide');
        }
        var kkk = ()=>{
            console.log(23)
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\www\logistics\resources\views/pages/xx.blade.php ENDPATH**/ ?>
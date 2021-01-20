<div>
    <form action="{{route('search')}}" class="search-form" method="get">
        @csrf
        <div class="mb-2" data-toggle="modal" data-target="#addressSelectModal" onclick="window.addressOrder=1">
            <label for="">第一个地址</label>
            <input autocomplete="off" type="text" id="start" name="start" value="{{old('start')}}">
            <input hidden type="text" id="start_province" name="start_province" value="{{old('start_province')}}">
            <input hidden type="text" id="start_city" name="start_city" value="{{old('start_city')}}">
            <input hidden type="text" id="start_district" name="start_district" value="{{old('start_district')}}">
        </div>
        <div class="mb-2" data-toggle="modal" data-target="#addressSelectModal" onclick="window.addressOrder=2">
            <label for="">第二个地址</label>
            <input autocomplete="off" type="text" id="end" name="end" value="{{old('end')}}">
            <input hidden type="text" id="end_province" name="end_province" value="{{old('end_province')}}">
            <input hidden type="text" id="end_city" name="end_city" value="{{old('end_city')}}">
            <input hidden type="text" id="end_district" name="end_district" value="{{old('end_district')}}">
        </div>
        <button type="submit" class="btn-primary btn  btn-sm">搜索</button>
    </form>
</div>

{{--modal--}}
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
                                    <option :value="id" v-for="(name,id) in provinces">@{{name}}</option>
                                </select>
                                <select class="form-control mb-2" v-model="cityId">
                                    <option></option>
                                    <option :value="id" v-for="(name,id) in cities">@{{name}}</option>
                                </select>
                                <select class="form-control mb-2" v-model="districtId">
                                    <option></option>
                                    <option :value="id" v-for="(name,id) in districts">@{{name}}</option>
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
{{--modalend--}}
<script>
    var addressOrder = 1;
    var setAddress = () => {
        const province = $("#provinceName").val();
        const city = $("#cityName").val();
        const district = $("#districtName").val();
        switch (addressOrder) {
            case 1:
                $('#start').val(province + city + district);
                $('#start_province').val(province);
                $('#start_city').val(city);
                $('#start_district').val(district);
                break;
            case 2:
                $('#end').val(province + city + district);
                $('#end_province').val(province);
                $('#end_city').val(city);
                $('#end_district').val(district);
                break;

        }
        console.log(province, city, district);
        $('#addressSelectModal').modal('hide');
    }

    {{--var filters = {!! json_encode($filters) !!};--}}
    {{--debugger--}}
    {{--console.log(filters);--}}
    {{--$('.search-form input[name=start]').val(filters.start);--}}
    {{--$('.search-form select[name=start_province]').val(filters.start_province);--}}
    {{--$('.search-form select[name=start_city]').val(filters.start_city);--}}
    {{--$('.search-form select[name=start_district]').val(filters.start_district);--}}
    {{--$('.search-form select[name=end]').val(filters.end);--}}
    {{--$('.search-form select[name=end_province]').val(filters.end_province);--}}
    {{--$('.search-form select[name=end_city]').val(filters.end_city);--}}
    {{--$('.search-form select[name=end_district]').val(filters.end_district);--}}
</script>

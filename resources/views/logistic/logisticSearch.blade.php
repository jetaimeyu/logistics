<form action="{{route('search')}}" method="get" class="form-row align-items-center">
    @csrf
    <div class="form-group select-text" style="font-size: 12px">
        <address-create-and-edit inline-template>
            <div class="form-group ">
                <select-district inline-template @change="onDistrictChanged"
                                 :init-value="{{json_encode([old('start_province'),old('start_city'),old('start_district')])}}">
                    <div class="form-row">
                        <label class="col-form-label col-sm-2 text-md-right"
                               style="padding-right: 20px">初始地</label>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control   @error('start_province') is-invalid @enderror" v-model="provinceId" required>
                                <option value="">选择省</option>
                                <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                            </select>
                            @error('start_province')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  @error('start_city') is-invalid @enderror" v-model="cityId" required>
                                <option value="">选择市</option>
                                <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                            </select>
                            @error('start_city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  @error('start_district') is-invalid @enderror" v-model="districtId" required>
                                <option value="">选择区</option>
                                <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                            </select>
                            @error('start_district')
                            <div>{{$message}}</div>
                            <div class="invalid-feedback">{{ $message }}1</div>
                            @enderror
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
                                 :init-value="{{json_encode([old('end_province'),old('end_city'),old('end_district')])}}">
                    <div class="form-row input-group-sm">
                        <label class="col-form-label col-sm-2 text-md-right"
                               style="padding-right: 20px">目的地</label>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  @error('end_province') is-invalid @enderror" v-model="provinceId" required>
                                <option value="">选择省</option>
                                <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                            </select>
                            @error('end_province')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  @error('end_city') is-invalid @enderror" v-model="cityId" required>
                                <option value="">选择市</option>
                                <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                            </select>
                            @error('end_city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3 input-group-sm">
                            <select class="form-control  @error('end_district') is-invalid @enderror" v-model="districtId" >
                                <option value="">选择区</option>
                                <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                            </select>
                            @error('end_district')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
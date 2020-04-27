@extends('layouts.default')
@section('title', ($company->id?'企业信息编辑':'新增企业信息') )
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{$company->id?'企业信息编辑':'新增企业信息'}} </h5>
        </div>
        @include('shared._errors')
        <div class="card-body">
            @if($company->id)
                <form class="" action="{{route('company.update', ['companyInfo'=>$company->id])}}" method="post" id="company-create">
                    @method('put')
                    @else
                        <form class="" action="{{route('company.store')}}" method="post" id="company-create">
                            @endif
                            @csrf
                            <div class="form-group row">
                                <label for="compName" class="col-sm-2 col-form-label">名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="compName" name="comp_name" value="{{ old('comp_name', $company->compName) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact" class="col-sm-2 col-form-label">联系人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $company->contact) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tel" class="col-sm-2 col-form-label">座机</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel', $company->tel)}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">手机</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $company->phone)}}">
                                </div>
                            </div>
                            <div class="form-group row" onclick="showMapModal()">
                                <label for="address" class="col-sm-2 col-form-label">地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address',$company->address)}}">
                                    <input type="text" hidden id="longitude" name="longitude" value="{{ old('longitude', $company->longitude)}}">
                                    <input type="text" hidden id="latitude" name="latitude" value="{{ old('latitude', $company->latitude)}}">
                                    <div style="position: absolute;top: 50%;right: 30px;transform: translate(0,-50%);cursor: pointer;">
                                        <i class="fa fa-map-marker fa-lg"></i></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addressDetail" class="col-sm-2 col-form-label">详细地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="detail_address" name="detail_address" value="{{ old('detail_address', $company->detailAddress)}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit-button">提交</button>
                        </form>
        </div>
        <!-- MapModal -->
        <div class="modal fade bd-example-modal-lg" id="mapModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mapModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="height: 500px;width: 1000px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mapModalTitle">地址选择</h5>
                        <button class="btn-sm btn-primary btn" onclick="getUserLocation()" style="margin-left: 20px">
                            定位到当前位置
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="container" style="height: 100%; width:100%;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="saveAddress()">确定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scriptsAfterJs')
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=uUUBI8RNG8GrpQ1SzI3sEkGdrLZOUKN5"></script>
    <script>
        $(function () {
            $("#submit-button").click(function () {
                $(this).attr("disabled", "true"); //设置变灰按钮
                $("#company-create").submit();//提交表单
                setTimeout("$('#submit').removeAttr('disabled')", 3000); //设置三秒后提交按钮 显示
            })
        })
    </script>
    <script>
        var map, geoc, mk, currentPoint, province, city, district, currentAddress;
        $(function () {
            map = new BMap.Map("container", {enableMapClick: false});
            var point = new BMap.Point(117.03233899835905, 36.68278473);
            map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
            map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
            map.centerAndZoom(point, 15);
            geoc = new BMap.Geocoder();
            map.addEventListener("click", function (e) {    //给地图添加点击事件
                map.clearOverlays();
                var lng = e.point.lng;
                var lat = e.point.lat;
                //创建标注位置
                var pt = new BMap.Point(lng, lat);
                currentPoint = pt;
                var marker2 = new BMap.Marker(pt);  // 创建标注
                map.addOverlay(marker2);
                // 将标注添加到地图中
                // map.panTo(pt);
                geoc.getLocation(pt, function (rs) {
                    console.log('选点地址信息', rs);
                    var addComponent = rs.addressComponents;
                    province = addComponent.province;
                    city = addComponent.city;
                    district = addComponent.district;
                    // currentAddress= rs.address
                    showInfoWindow(marker2, rs.address);
                });
            });
        })

        function showInfoWindow(mark, info) {
            currentAddress = info;
            var infoWindow = new BMap.InfoWindow(info, {title: '当前位置'});
            mark.openInfoWindow(infoWindow);
            // map.openInfoWindow(infoWindow,point);
        }

        function getUserLocation() {
            map.clearOverlays();
            var geolocation = new BMap.Geolocation();
            geolocation.getCurrentPosition(function (r) {
                if (this.getStatus() == BMAP_STATUS_SUCCESS) {
                    var mk = new BMap.Marker(r.point);
                    currentPoint = r.point
                    map.addOverlay(mk);
                    map.panTo(r.point);
                    geoc.getLocation(r.point, function (rs) {
                        console.log('选点地址信息', rs);
                        var addComponent = rs.addressComponents;
                        province = addComponent.province;
                        city = addComponent.city;
                        district = addComponent.district;
                        showInfoWindow(mk, rs.address);
                    });
                }
            }, {enableHighAccuracy: true})
        }

        function saveAddress() {
            if (!currentAddress || !currentPoint) {
                $('.toast').toast('show');
                return;
            }
            $('#mapModal').modal('hide');
            $('#address').val(province + city + district);
            $('#detail_address').val(currentAddress);
            $('#longitude').val(currentPoint.lng);
            $('#latitude').val(currentPoint.lat);
        }

        function showMapModal() {
            $('#mapModal').modal()
        }
    </script>
@endsection

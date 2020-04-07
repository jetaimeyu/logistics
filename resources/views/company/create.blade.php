@extends('layouts.default')
@section('title', '信息编辑')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>信息编辑</h5>
        </div>
        <div class="card-body">
            <form class="" action="">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">名称</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addressDetail" class="col-sm-2 col-form-label">联系人</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="addressDetail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addressDetail" class="col-sm-2 col-form-label">座机</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="addressDetail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addressDetail" class="col-sm-2 col-form-label">手机</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="addressDetail">
                    </div>
                </div>
                <div class="form-group row" onclick="showMapModal()">
                    <label for="address" class="col-sm-2 col-form-label">地址</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address">
                        <input type="text" hidden id="lng">
                        <input type="text" hidden id="lat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="addressDetail" class="col-sm-2 col-form-label">详细地址</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="addressDetail">
                    </div>
                </div>
            </form>
        </div>
        <!-- MapModal -->
        <div class="modal fade bd-example-modal-lg" id="mapModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mapModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="height: 500px;width: 1000px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mapModalTitle">位置选择</h5>
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

{{--    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">--}}
{{--        <div class="toast" style="position: absolute; top: 0; right: 0;">--}}
{{--            <div class="toast-header">--}}
{{--                <strong class="mr-auto">Bootstrap</strong>--}}
{{--                <small>11 mins ago</small>--}}
{{--                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="toast-body">--}}
{{--                Hello, world! This is a toast message.--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- MapModalEnd -->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=uUUBI8RNG8GrpQ1SzI3sEkGdrLZOUKN5"></script>
    <script>
        var map, geoc, mk,currentPoint,currentAddress;
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
                currentPoint= pt;
                var marker2 = new BMap.Marker(pt);  // 创建标注
                map.addOverlay(marker2);
                // 将标注添加到地图中
                // map.panTo(pt);
                geoc.getLocation(pt, function (rs) {
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
                    currentPoint= r.point
                    map.addOverlay(mk);
                    map.panTo(r.point);
                    geoc.getLocation(r.point, function (rs) {
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
            $('#address').val(currentAddress);
            $('#lng').val(currentPoint.lng);
            $('#lat').val(currentPoint.lat);
            console.log(currentPoint)
        }

        function showMapModal() {
            $('#mapModal').modal()
        }
    </script>
@endsection

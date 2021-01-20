<?php
use Illuminate\Support\Facades\Storage;
/**
 * Created by PhpStorm.
 * User: yuyuyu
 * Date: 2020/4/23 0023
 * Time: 上午 9:53
 */
function route_class(){
    return str_replace('.', '-', \Illuminate\Support\Facades\Route::currentRouteName());
};


function upload_image($path, $file, $driver='oss'){
    $disk = Storage::disk($driver);
    $path = $disk->putFileAs($path, $file,$file->getClientOriginalName());
    return $disk->url($path);

}

<?php
/**
 * Created by PhpStorm.
 * User: yuyuyu
 * Date: 2020/4/23 0023
 * Time: 上午 9:53
 */
function route_class(){
    return str_replace('.', '-', Route::currentRouteName());
}

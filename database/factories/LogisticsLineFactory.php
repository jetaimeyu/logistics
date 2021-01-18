<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LogisticsLine;
use Faker\Generator as Faker;

$factory->define(LogisticsLine::class, function (Faker $faker) {
    return [
        'user_id'=>2,
        'start_province'=>'天津市',
        "start_city"=>"市辖区",
        "start_district"=>"河东区",
        "start_contact"=>"1221",
        'start_phone'=>'15106950278',
        'end_province'=>'天津市',
        "end_city"=>"市辖区",
        "end_district"=>"河东区",
        "end_contact"=>"222",
        "end_phone"=>"15522222222",
        "description"=>"1222",
        "state"=>1,
    ];
});

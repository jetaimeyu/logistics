<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompanyInfo;
use Faker\Generator as Faker;

$factory->define(CompanyInfo::class, function (Faker $faker) {
    $addresses = [
        ["北京市", "市辖区", "东城区"],
        ["河北省", "石家庄市", "长安区"],
        ["江苏省", "南京市", "浦口区"],
        ["江苏省", "苏州市", "相城区"],
        ["广东省", "深圳市", "福田区"],
    ];
    $address = $faker->randomElement($addresses);

    return [
        //
        'address' => $address[0] . $address[1] . $address[2],
        'detail_address' => sprintf('第%d街道第%d号', $faker->randomNumber(2), $faker->randomNumber(3)),
        'comp_name' => $faker->company,
        'contact' => $faker->name,
        'phone' => $faker->phoneNumber,
        'tel'=>$faker->tld,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});


<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogisticsLineRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_province' => 'required',
            'start_city' => 'required',
            'start_district' => 'required',
            'start_contact' => 'required',
            'start_phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
            ],
            'end_province' => 'required',
            'end_city' => 'required',
            'end_district' => 'required',
            'end_contact' => 'required',
            'end_phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
            ],
            'description' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'start_province' => '出发地 省份',
            'start_city' => '出发地 城市',
            'start_district' => '出发地 区/县',
            'start_contact' => '出发地 联系人',
            'start_phone' => '出发地 手机号',
            'end_province' => '目的地 省份',
            'end_city' => '目的地 城市',
            'end_district' => '目的地 区/县',
            'end_contact' => '目的地 联系人',
            'end_phone' => '目的地 手机号',
            'description' => '描述',
        ];

    }
}

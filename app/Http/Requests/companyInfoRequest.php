<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companyInfoRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comp_name' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'detail_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function attributes()
    {
        return[
            'comp_name' => '企业名称',
            'contact' => '联系人',
            'phone' => '手机号',
            'tel' => '电话',
            'address' => '地址',
            'detail_address' => '详细地址',
            'latitude' => '纬度',
            'longitude' => '经度',
        ];

    }
}

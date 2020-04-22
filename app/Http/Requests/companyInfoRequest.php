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
}

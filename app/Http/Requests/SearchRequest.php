<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'start_province' => 'required',
            'start_city' => 'required',
            'start_district' => 'required',
            'end_province' => 'required',
            'end_city' => 'required',
            'end_district' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'start_province' => '出发地',
            'start_city' => '出发地',
            'start_district' => '出发地',
            'end_province' => '出发地',
            'end_city' => '出发地',
            'end_district' => '出发地',
        ];
    }

}

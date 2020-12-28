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
            'start_province' => '始发地省',
            'start_city' => '始发地市',
            'start_district' => '始发地区',
            'end_province' => '目的地省',
            'end_city' => '目的地市',
            'end_district' => '目的地区',
        ];
    }

}

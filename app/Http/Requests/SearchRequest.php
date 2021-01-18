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
            'start'=>'required',
            'end'=>'required',
        ];
    }
    public function attributes()
    {
        return [
            'start' => '始发地',
            'end' => '目的地',
        ];
    }

}

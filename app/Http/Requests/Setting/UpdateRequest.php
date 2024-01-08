<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [


            'title' => 'required',
            'email' => 'required',
            'description' => 'required',
            'googleconsole' => 'nullable',
            'color1'  => 'nullable',
            'color2'  => 'nullable',
            'color3'  => 'nullable',
            'color4'  => 'nullable',
            'fblink' => 'required',
            'twlink' => 'required',
            'instalink' => 'required',
            'link' => 'required',
            'fixedheader' => 'nullable'
        ];
    }
}

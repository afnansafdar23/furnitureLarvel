<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSettingRequest extends FormRequest
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
                'application_name' => 'nullable',
                'email' => 'nullable',
                'short_description' => 'nullable',
                'color_one'  => 'nullable',
                'color_two'  => 'nullable',
                'color_three'  => 'nullable',
                'color_four'  => 'nullable',
                'facebook_link' => 'nullable',
                'instagram_link' => 'nullable',
                'gsc' => 'nullable',
                'site_index' => 'nullable',
        ];
    }
}
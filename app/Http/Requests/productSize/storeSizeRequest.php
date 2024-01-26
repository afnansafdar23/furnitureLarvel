<?php

namespace App\Http\Requests\productSize;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeSizeRequest extends FormRequest
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
            'name' =>   ['required', Rule::unique('product_sizes', 'name')->ignore($this->name)],
            'parent_category_id' => 'required',
            'child_category_id' => 'nullable',
            "dimension"=> "required"
        ];
    }
}

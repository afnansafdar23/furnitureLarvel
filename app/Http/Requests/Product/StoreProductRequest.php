<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', Rule::unique('products', 'name')->ignore($this->name)],
            'sku' => 'required',
            'description' => 'required',
            'features' => 'required',
            'price' => 'required',
            'discounted_price' => 'nullable',
            'parent_category_id' => 'required',
            'child_category_id' => 'nullable',
            'color_id' => 'required',
            'product_length' => 'nullable',
            'product_weight' => 'nullable',
            'product_height' => 'nullable',
            'product_width' => 'nullable',
            'availability' => 'nullable'
        ];
    }
}

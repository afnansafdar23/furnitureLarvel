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
            'sku' =>  ['required', Rule::unique('products', 'sku')->ignore($this->sku)],
            'description' => 'required',
            'features' => 'required',
            'price' => 'required',
            'discounted_price' => 'nullable',
            'parent_category_id' => 'required',
            'child_category_id' => 'nullable',
            'color' => 'required',
            'size' => 'required',
            'product_length' => 'required',
            'product_weight' => 'required',
            'product_height' => 'required',
            'product_width' => 'required',
            'availability' => 'nullable'
        ];
    }
}

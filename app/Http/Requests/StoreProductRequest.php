<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:sub_categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id'
        ];
    }
}

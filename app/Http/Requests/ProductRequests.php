<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'tag' => 'nullable|in:Hot,Sale',
            'status' => 'boolean',
        ];

        if ($this->route()->getName() === 'dash.product.edit') {
            $id = $this->route(param: 'id');

            $rules['id'] = 'numeric|exist:products,id';
            $rules['images'] = 'array|max:5';
            $rules['images.*'] = 'image|max:2048';
            $rules['slug'] = 'required|unique:products,slug,' . $id;

        } else if ($this->route()->getName() === 'dash.product.add') {
            $rules['images'] = 'array|min:1|max:5';
            $rules['images.*'] = 'required|filled|image|max:2048';
            $rules['slug'] = 'required|unique:products,slug';
        }

        return $rules;
    }
}

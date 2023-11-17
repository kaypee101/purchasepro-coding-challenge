<?php

namespace App\Http\Requests;

class ProductFormRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
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
        return [
            'name' => 'required|min:3|max:50',
            'catalog_id' => 'required|not_in:0',
            'detail' => 'required|min:3|max:100',
            'quantity' => 'min:1|max:100',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store()
    {
        return [];
    }

    public function update()
    {
        return [];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is a required field.',
            'catalog_id' => 'Please select a valid :attribute',
            'quantity.min' => ':attribute should be at least :min',
            'quantity.max' => ':attribute should be at most :max',
            'min' => ':attribute should be at least :min characters.',
            'max' => ':attribute should be at least :max characters.',
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Product Name',
            'catalog_id' => 'Catalog',
            'detail' => 'Detail',
            'quantity' => 'Quantity',
        ];
    }
}

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
            'detail' => 'required|min:3|max:100',
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
            'min' => ':attribute should be at least :min characters.',
            'max' => ':attribute should be at least :max characters.',
        ];
    }
}

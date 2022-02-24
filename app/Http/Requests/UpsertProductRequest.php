<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:35',
            'body' => 'required|max:1500',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|between:0,999999.99',
            'image' => 'nullable|image|mimes:jpg,png',
            'category_id' => 'nullable|integer|min:0'
        ];
    }

    /**
     * Zmiana komunikatu w wybranym formularzu
     *
     */
    public function messages()
    {
        return [
            'name.required' => 'Jest wymagane pole :attribute!'
        ];
    }

    /**
     * Zmiana nazwy atrybutu
     *
     */
    public function attributes()
    {
        return [
            'name' => 'nazwa produktu'
        ];
    }
}
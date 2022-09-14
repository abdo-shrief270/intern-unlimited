<?php

namespace App\Http\Requests;

use App\Http\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    use ApiResponseTrait;
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
            'name'=>'required|string|min:3|max:50',
            'description'=>'required|string|min:10|max:2000',
            'price'=>'required|min:1',
            'main_image'=>'required|image|mimes:jpg,jpeg,csv,png',
            'images'=>'nullable',
            'images.*'=>'required|image|mimes:jpg,jpeg,csv,png',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
    }

}

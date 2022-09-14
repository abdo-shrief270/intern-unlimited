<?php

namespace App\Http\Requests;

use App\Http\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{
    use ApiResponseTrait;


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
            'name'=>'required|string|min:3',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:8'
        ];
    }

}

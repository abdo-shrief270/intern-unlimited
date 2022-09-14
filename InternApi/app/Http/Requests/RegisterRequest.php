<?php

namespace App\Http\Requests;

use App\Http\Traits\ApiResponseTrait;
use http\Client\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    use ApiResponseTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ];
    }
}

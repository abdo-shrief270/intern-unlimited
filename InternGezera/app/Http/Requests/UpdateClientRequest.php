<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'client_id'=>'required|exists:clients,id',
            'name'=>'required|string|min:3|max:50',
            'phone'=>'required|string|min:7|max:20',
            'tax_number'=>'required|string|min:5|max:50',
        ];
    }
}

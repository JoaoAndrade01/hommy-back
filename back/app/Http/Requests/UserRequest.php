<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            $validator->errors(),
            422
        ));
    }
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
        if ($this->isMethod('post')) {
            return [
                'nickname' => 'required|string',
                'name' => 'required|string',
                'email' => 'required|email|unique:Users,email',
                'password' => 'required'
            ];
        }
        if ($this->isMethod('put')) {
            return [
                'nickname' => 'required|string',
                'name' => 'required|string',
                'email' => 'required|email|unique:Users,email',
                'password' => 'required'
            ];
        }
        return [
            'nickname' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'Insira um email válido'
        ];
    }
}

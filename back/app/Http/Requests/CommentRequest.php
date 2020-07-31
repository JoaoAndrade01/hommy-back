<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Comment;

class CommentRequest extends FormRequest
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
                'date' => 'required|string',
                'commentary' => 'required|string',
                'valueOffer' => 'string|nullable'
                
            ];
        }
        if ($this->isMethod('put')) {
            return [
                'date' => 'string',
                'commentary' => 'string',
                'valueOffer' => 'string'
            ];
        }
    }   
}

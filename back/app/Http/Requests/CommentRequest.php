<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'date' => 'required|string',
                'commentary' => 'required|string',
                'valueOffer' => 'string'
                
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
    public function messages()
    {
    }
}

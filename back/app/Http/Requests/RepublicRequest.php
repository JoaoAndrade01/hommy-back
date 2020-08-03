<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Republic;

class RepublicRequest extends FormRequest
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
                'name' => 'string',
                'street' => 'string',
                'neighborhood' => 'string',
                'city' => 'string',
                'state' => 'string',
                'bedrooms' => 'integer',                
                'livingRoom' => 'integer',
                'bathrooms' => 'integer',
                'kitchens' => 'integer',
                'garages' => 'integer'
            ];
        }
        if ($this->isMethod('put')) {
            return [
                'name' => 'string',
                'street' => 'string',
                'neighborhood' => 'string',
                'city' => 'string',
                'state' => 'string',
                'bedrooms' => 'integer',
                'livingRoom' => 'integer',
                'bathrooms' => 'integer',
                'kitchens' => 'integer',
                'garages' => 'integer'
            ];
        }
    }    
}

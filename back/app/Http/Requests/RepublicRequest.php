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
                'name' => 'required|string',
                'street' => 'required|string',
                'neighborhood' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'bedrooms' => 'required|integer',
                'livingRoom' => 'required|integer',
                'bathrooms' => 'required|integer',
                'kitchens' => 'required|integer',
                'garages' => 'required|integer'
            ];
        }
        if ($this->isMethod('put')) {
            return [
                'name' => 'required|string',
                'street' => 'required|string',
                'neighborhood' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'bedrooms' => 'required|integer',
                'livingRoom' => 'required|integer',
                'bathrooms' => 'required|integer',
                'kitchens' => 'required|integer',
                'garages' => 'required|integer'
            ];
        }
        return [
            'name' => 'required|string',
            'street' => 'required|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'bedrooms' => 'required|integer',
            'livingRoom' => 'required|integer',
            'bathrooms' => 'required|integer',
            'kitchens' => 'required|integer',
            'garages' => 'required|integer'

        ];
    }
    public function messages()
    {
    }
}

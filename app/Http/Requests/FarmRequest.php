<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class FarmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => false, 'message' => $validator->errors()], 402));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>[
                'required',
                'min:5',
                'max:200',
                Rule::unique('farms')->ignore($this->id),   
            ],
            'address'=>[
                'required',
                'min:5',
                'max:200',
                Rule::unique('farms')->ignore($this->id), 
            ],
            'map_id'=>[
                'required'
            ]
            
        ];
    }
}

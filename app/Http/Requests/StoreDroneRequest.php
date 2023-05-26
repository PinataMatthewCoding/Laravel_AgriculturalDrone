<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDroneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    // THIS CODE WORK FOR DO VALIDATION
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'message' => $validator->errors()], 402));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "drone_id"=>"required|min:2",
            "country"=>"required|min:2",
            "company"=>"required|min:2",
            "endurance"=>"required|min:2",
            "range"=>"required|min:2",
            "battery"=>"required|min:2",
            "playload_cap"=>"required|min:2",
            "max_speed"=>"required|min:2",
            "instruction_id"=>"required",
        ];
    }
}

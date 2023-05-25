<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreInstructionRequest extends FormRequest
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
<<<<<<< HEAD
            "brand"=>"required",
            "type"=>"required|unique:instructions",
=======

            "name"=>"required",
            "band"=>"required",
            "type"=>"required",
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
            "max_flight_time"=>"required",
            "description"=>"required",
            "instruction"=>"required",
        ];
    }
}

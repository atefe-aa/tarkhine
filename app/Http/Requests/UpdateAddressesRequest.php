<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'string',
            'is_customer_receiver'=>'boolean',
            'receiver_name'=>'string',
            'receiver_phone'=>'string',
            'address'=>'string',
            'coordinates'=>'array:latitude,longitude',
            'status'=>'boolean:false',
        ];
    }
}

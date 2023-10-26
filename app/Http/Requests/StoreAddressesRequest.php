<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressesRequest extends FormRequest
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
            'title'=> 'required|string',
            'is_customer_receiver'=> 'required|boolean',
            'receiver_name'=> 'required|string',
            'receiver_phone'=> 'required|string',
            'address'=> 'required|string',
            'coordinates'=> 'required|array:latitude,longitude',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrdersRequest extends FormRequest
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
            'status' => 'in:suspended,preparing,sent,delivered',
            'address_id'=> 'required|exists:addresses,id',
            'branch_id'=> 'required|exists:branches,id',
            'cart'=> 'required|array',
            'cart.*'=>'exists:foods,id',
            'total_price'=> 'required|integer',
            'foods_discount'=> 'required|integer',
            'delivery_cost'=> 'integer',
            'delivery_type'=> [
                'required',
                'string',
                Rule::in(["courier","in_person"])
                ],
            'payment_method'=> [
                'required',
                'string',
                Rule::in(["online","in_person"])
                ],
            'description'=> 'string',
            'delivery_time'=> 'date_format:H:i',
        ];
    }
}

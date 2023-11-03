<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchesRequest extends FormRequest
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
            "manager"=>'required|string',
            "manager_phone"=>'required|string',
            "manager_national_id"=>'required|string',
            "address"=>'required|string',
            "province"=>'required|string',
            "city"=>'required|string',
            "neighbourhood"=>'required|string',
            "ownership_type"=>'required|string',
            "property_area"=>'required|integer',
            "property_age"=>'required|integer',
            "business_license"=>'required|boolean',
            "parking_lot"=>'required|boolean',
            "warehouse"=>'required|boolean',
            "kitchen"=>'required|boolean',
            "coordinates"=>'required|array:latitude,longitude',
            "pictures"=>'required|array',
        ];
    }
}

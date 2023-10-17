<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketsRequest extends FormRequest
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
            'type' => 'required|in:message,consult',
            'full_name' => 'required|string',
            'best_time' => 'nullable|date', 
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'message' => 'nullable|string',
            'status' => 'in:active,closed',  
        ];
    }
}

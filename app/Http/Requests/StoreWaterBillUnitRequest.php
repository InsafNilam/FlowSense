<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaterBillUnitRequest extends FormRequest
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
            'fixed_charge' => ['required', 'numeric', 'between:0,999999.99'],
            'per_unit_charge' => ['required', 'numeric', 'between:0,999999.99'],
            'min_units' => ['required', 'numeric', 'between:0,999999.99'],
            'max_units' => ['nullable', 'numeric', 'between:0,999999.99'],
            'created_by' => ['required', 'exists:users,id'],
            'updated_by' => ['required', 'exists:users,id'],
        ];
    }
}

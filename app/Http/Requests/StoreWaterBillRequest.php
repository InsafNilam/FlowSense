<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaterBillRequest extends FormRequest
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
            'bill_no' => 'required|integer',
            'bill_date' => 'required|date',
            'due_date' => 'required|date',
            'bill_amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid',
            'user_id' => 'required|exists:users,id',
        ];
    }
}

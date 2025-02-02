<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'order_type_id' => 'required|exists:order_types,id',
            'partnership_id' => 'required|exists:partnerships,id',
            'description' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'sometimes|in:created,assigned,completed',
        ];
    }
}

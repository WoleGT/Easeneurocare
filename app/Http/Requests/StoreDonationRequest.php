<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'frequency' => 'required|in:weekly,monthly,quarterly,biannually,annually,one-time',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:bank_transfer,bank_card,standing_order',     
        ];

    
    }

}

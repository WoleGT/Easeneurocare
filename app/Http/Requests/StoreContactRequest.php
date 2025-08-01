<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
        'first_name'       => 'required|string|max:255',
        'last_name'        => 'required|string|max:255',
        'email'            => 'required|email|max:255',
        'services'         => 'sometimes|nullable|in:ATHS_free,CTR_free,IA_free,HcTS_paid,ScTS_paid,HolcTH_paid,SLT-AI_paid,PAI_paid,CDoNC_paid,Disco,Trainings',
        'appointment_date' => 'nullable|date',
        'appointment_time' => 'nullable|date_format:H:i',
        'phone_number'     => 'nullable|string|max:20',
        'subject'          => 'required|string|max:255',
        'message'          => 'required|string',
    ];
}

}

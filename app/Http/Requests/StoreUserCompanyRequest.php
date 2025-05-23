<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCompanyRequest extends FormRequest{
    public function authorize(): bool{
        return true; 
    }

    public function rules(): array{
        return [
            'id' => 'nullable|integer|exists:companies,id', 
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'status' => 'required|in:drektor,currer',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'FIO kiritilishi shart.',
            'phone.required' => 'Telefon raqam kiritilishi shart.',
            'email.required' => 'Email manzili kiritilishi shart.',
            'password.required' => 'Parol kiritilishi shart.',
            'status.required' => 'Status tanlanishi shart.',
            'status.in' => 'Noto‘g‘ri status tanlandi.',
        ];
    }
}

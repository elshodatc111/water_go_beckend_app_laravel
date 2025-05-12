<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'id' => 'required',
            'company_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'order_price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ];
    }
    public function messages(): array{
        return [
            'company_name.required' => 'Kompaniya nomi kiritilishi shart.',
            'price.required' => 'Narx kiritilishi shart.',
            'order_price.required' => 'Buyurtma narxi kiritilishi shart.',
            'description.required' => 'Tavsif kiritilishi shart.',
        ];
    }
}

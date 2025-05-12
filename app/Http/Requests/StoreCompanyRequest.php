<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'company_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'order_price' => 'required|numeric|min:0',
            'banner_url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'lat_one' => 'required',
            'lang_one' => 'required',
            'lat_two' => 'required',
            'lang_two' => 'required',
        ];
    }
}

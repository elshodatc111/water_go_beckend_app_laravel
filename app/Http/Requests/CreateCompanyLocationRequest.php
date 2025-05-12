<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyLocationRequest extends FormRequest{
    public function authorize(): bool{
        return true; 
    }
    public function rules(): array{
        return [
            'id' => 'required|integer|exists:companies,id',
            'lat_man' => 'required|numeric|between:-90,90',
            'lat_max' => 'required|numeric|between:-90,90|gte:lat_man',
            'lang_man' => 'required|numeric|between:-180,180',
            'lang_max' => 'required|numeric|between:-180,180|gte:lang_man',
        ];
    }
    public function messages(): array{
        return [
            'id.required' => 'Company ID kerak.',
            'lat_man.required' => 'Latitude Min (lat_man) kiritilishi shart.',
            'lat_max.required' => 'Latitude Max (lat_max) kiritilishi shart.',
            'lang_man.required' => 'Longitude Min (lang_man) kiritilishi shart.',
            'lang_max.required' => 'Longitude Max (lang_max) kiritilishi shart.',
            'lat_max.gte' => 'Latitude Max qiymati Latitude Min dan katta yoki teng bo‘lishi kerak.',
            'lang_max.gte' => 'Longitude Max qiymati Longitude Min dan katta yoki teng bo‘lishi kerak.',
        ];
    }
}

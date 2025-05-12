<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyFileRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'id' => 'required|integer|exists:companies,id',
            'banner_url' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048', // fayl turi va hajmi (MB: 2)
        ];
    }
    public function messages(): array{
        return [
            'banner_url.required' => 'Fayl tanlanishi shart.',
            'banner_url.file' => 'Yuklangan maʼlumot fayl bo‘lishi kerak.',
            'banner_url.mimes' => 'Faqat jpg, jpeg, png, pdf yoki docx formatdagi fayllarga ruxsat beriladi.',
            'banner_url.max' => 'Fayl hajmi 2MB dan oshmasligi kerak.',
        ];
    }
}

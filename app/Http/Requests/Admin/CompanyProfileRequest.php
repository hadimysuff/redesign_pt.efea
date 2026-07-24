<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about' => ['nullable', 'string', 'max:5000'],
            'vision' => ['nullable', 'string', 'max:2000'],
            'mission' => ['nullable', 'string', 'max:2000'],
            'history' => ['nullable', 'string', 'max:5000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'stat_years' => ['nullable', 'integer', 'min:0', 'max:200'],
            'stat_projects' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'stat_clients' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'stat_team' => ['nullable', 'integer', 'min:0', 'max:100000'],
        ];
    }
}

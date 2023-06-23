<?php

namespace App\Http\Requests\Division;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'available' => 'boolean',
        ];
    }
}

<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
}

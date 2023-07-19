<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tags' => ['array','sometimes'],
            'tags.*' => ['string'],
        ];
    }
}

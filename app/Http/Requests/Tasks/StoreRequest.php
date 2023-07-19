<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file',
            'user_id' => 'integer',
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'required|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}

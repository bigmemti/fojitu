<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:4|max:255',
            'body' => 'required|min:10',
            'deadline' => 'nullable|date|date_format:Y/m/d H:i:s',
            'types' => 'required',
            'types.*' => 'integer|exists:types,id',
        ];
    }
}

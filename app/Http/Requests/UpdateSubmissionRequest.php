<?php

namespace App\Http\Requests;

use App\Models\Submission;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('update', request()->submission);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'answer' => 'required_if:files,null|max:2048',
            'files' => 'required_if:answer,null',
            'files.*' => [
                'file',
                'nullable',
                'mimes' => fn ($attribute, $value, $fail)
                => (in_array($value->getClientOriginalExtension(), request()->submission->homework->mimes()->pluck('name')->toArray()))
                ? null
                : $fail(':attribute mimes is ' . request()->submission->homework->getMimes())
            ],
        ];
    }
}

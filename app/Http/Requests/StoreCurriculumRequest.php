<?php

namespace App\Http\Requests;

use App\Models\Curriculum;
use Closure;
use App\Models\Major;
use App\Models\Institution;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
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
            'institution_id' => ['required','integer', Rule::in(Institution::all()->pluck('id')->toArray()),],
            'major_id'=> ['required','integer', Rule::in(Major::all()->pluck('id')->toArray())],
            'record' => [function (string $attribute, mixed $value, Closure $fail) {
                if (Curriculum::where([['institution_id', '=', request()->institution_id],['major_id', '=', request()->major_id]])->count() !== 0) {
                    $fail("The {$attribute} is already exists.");
                }
            },'required']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMcqQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Auth::user()->can('update mcq_question');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question_text' => 'nullable|string', // Optional update for question text
            'options' => 'nullable|array|min:2', // Allow updating options
            'correct_option_index' => 'nullable|integer|between:1,options.count', // Update correct option if options are provided
            'chapter_id' => 'nullable|integer|exists:chapters,id', // Allow updating chapter association
            'topic_id' => 'nullable|integer|exists:topics,id', // Allow updating topic association
        ];
    }
}

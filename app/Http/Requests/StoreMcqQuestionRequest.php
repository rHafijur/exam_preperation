<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMcqQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Auth::user()->can('create mcq_question');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question_text' => 'required|string',
            'options' => 'required|array|min:2', // Ensure at least two options
            'correct_option_index' => 'required|integer|between:1,options.count', // Validates within option index range
            'chapter_id' => 'required|integer|exists:chapters,id', // Chapter association
            'topic_id' => 'required|integer|exists:topics,id', // Topic association
        ];
    }
}

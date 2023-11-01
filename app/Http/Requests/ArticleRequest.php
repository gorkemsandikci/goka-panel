<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'monotag' => 'nullable',
            'ditag' => 'nullable',
            'tritag' => 'nullable',
            'slug' => 'nullable',
            'image' => 'nullable',
            'category_id' => 'nullable',
            'full_text' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'title alanı zorunludur',
            'sub_title.required' => 'sub_title alanı zorunludur',
            'description.required' => 'description alanı zorunludur',
            'full_text.required' => 'full_text alanı zorunludur'
        ];
    }
}

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
            'monotag' => 'required',
            'ditag' => 'required',
            'tritag' => 'required',
            'slug' => 'required',
            'image' => 'required',
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
            'monotag.required' => 'monotag alanı zorunludur',
            'ditag.required' => 'ditag alanı zorunludur',
            'tritag.required' => 'tritag alanı zorunludur',
            'slug.required' => 'slug alanı zorunludur',
            'image.required' => 'image alanı zorunludur',
            'category_id.required' => 'category_id alanı zorunludur',
            'full_text.required' => 'full_text alanı zorunludur'
        ];
    }
}

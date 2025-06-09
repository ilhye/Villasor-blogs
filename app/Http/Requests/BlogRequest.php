<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|max:255',
            'image_url' => 'required|url',
            'description' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'status_id' => 'required',
        ];
    }

    public function messages() {
        return[
            'title.required' => 'The title is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image_url.required' => 'The image URL is required.',
            'image_url.url' => 'The image URL must be a valid URL.',
            'description.required' => 'The description is required.',
            'category_id.required' => 'The category ID is required.',
            'author.required' => 'The author is required.',
            'status_id.required' => 'The status ID is required.',
        ];
    }
}

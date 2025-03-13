<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookAdminRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'author' => 'required|string|max:200',
            'isbn' => 'required|string|unique:books,isbn|max:200',
            'cover_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'The book title is required.',
            'title.string' => 'The book title must be a valid string.',
            'title.max' => 'The book title must not exceed 200 characters.',

            'author.required' => 'The author name is required.',
            'author.string' => 'The author name must be a valid string.',
            'author.max' => 'The author name must not exceed 200 characters.',

            'isbn.required' => 'The ISBN is required.',
            'isbn.string' => 'The ISBN must be a valid string.',
            'isbn.unique' => 'This ISBN already exists in the database.',
            'isbn.max' => 'The ISBN must not exceed 200 characters.',

            'cover_image.required' => 'The cover image is required.',
            'cover_image.image' => 'The cover image must be an image file.',
            'cover_image.mimes' => 'The cover image must be in jpg, png, jpeg, gif, or svg format.',
            'cover_image.max' => 'The cover image size must not exceed 2MB.',

            'description.required' => 'The book description is required.',
            'description.string' => 'The book description must be a valid string.',
            'description.max' => 'The book description must not exceed 255 characters.',
        ];
    }
}

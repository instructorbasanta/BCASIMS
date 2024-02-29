<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required',
            'message' => 'required',
        ];
    }

    function  messages(): array
    {
        return [
            'title.required' => 'Please enter title',
            'title.max' => 'Maximum 255 character is allowed',
            'slug' => 'Please enter slug',
            'short_description.required' => 'Please enter short description',
        ];
    }
}

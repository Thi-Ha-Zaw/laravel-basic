<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        $id = request()->book->id;
        return [
            "name" => "required|min:3|max:50|unique:books,name,$id",
            "price" => "required|gte:50|lt:10000|numeric",
            "author" => "required|min:3|max:50",
        ];
    }
}
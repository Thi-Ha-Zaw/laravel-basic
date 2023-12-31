<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
        $id = request()->item->id;
        return [
            "name" => "required|min:3|max:50|unique:items,name,$id",
            "price" => "required|gte:50|lt:10000|numeric",
            "stock" => "required|gte:3|lt:100|numeric",
        ];
    }

    // public function messages()
    // {
    //     return [
    //         "name.required" => "နာမည်လေးထည့်လေကွာ",
    //         "name.min" => "အနည်းဆုံး၃လုံးထည့်လေကွာ"
    //     ];
    // }
}

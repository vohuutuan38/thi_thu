<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required|unique:students,phone',
            'address' => 'required',
            'image' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'name bắt buộc nhập',
            'gender.required' => 'gender bắt buộc nhập',
            'phone.required' => 'phone bắt buộc nhập',
            'phone.unique' => 'phone đã trùng',
            'address.required' => 'address bắt buộc nhập',
            'image.required' => 'image bắt buộc nhập',
        ];
    }
}

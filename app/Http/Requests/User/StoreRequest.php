<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() && auth()->user()->role_id === 3;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|min:3',
            'surname' => 'required|string|max:100|min:3',
            'email' => 'required|email|string|max:255|min:5|unique:users,email',
            'password' => 'required|string|min:6|same:password_r',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Реквест-класс для создания и обновления пользователя
 */
class SaveUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('user')),
            ],
            'password' => ['required', 'string', 'min:4'],
            'name' => ['nullable', 'string'],
            'comment' => ['nullable', 'string'],
            'ip' => ['nullable', 'string'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'email' => 'Почта',
            'password' => 'Пароль',
            'comment' => 'Комментарий',
            'name' => 'Имя',
            'ip' => 'IP',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => ':attribute обязательна',
            'email.unique' => ':attribute уже существует',
            'email.email' => ':attribute должна быть валидной',
            'password.required' => ':attribute обязателен',
            'password.min' => ':attribute должен состоять из минимум 4 символов',
        ];
    }
}

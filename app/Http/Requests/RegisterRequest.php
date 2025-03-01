<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'patronomyc' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[^a-zA-Z0-9]/',
            'phone' => 'required|string|max:20|unique:users,phone',
        ];
    }

    public function messages() {
        return [
            'first_name.required' => 'Поле Имя обязательно для заполнения',
            'first_name.string' => 'Поле Имя должно быть строкой',
            'first_name.max' => 'Поле Имя не должно превышать 50 символов',
            'last_name.required' => 'Поле Фамилия обязательно для заполнения',
            'last_name.string' => 'Поле Фамилия должно быть строкой',
            'last_name.max' => 'Поле Фамилия не должно превышать 50 символов',
            'patronomyc.required' => 'Поле Отчество обязательно для заполнения',
            'patronomyc.string' => 'Поле Отчество должно быть строкой',
            'patronomyc.max' => 'Поле Отчество не должно превышать 50 символов',
            'email.required' => 'Поле Email обязательно для заполнения',
            'email.email' => 'Поле Email должно быть валидным email адресом',
            'email.unique' => 'Пользователь с таким Email уже существует',
            'password.required' => 'Поле Пароль обязательно для заполнения',
            'password.string' => 'Поле Пароль должно быть строкой',
            'password.min' => 'Поле Пароль должно быть не менее 8 символов',
            'password.confirmed' => 'Поле Пароль должно совпадать с полем Подтверждение пароля',
            'password.regex' => 'Поле Пароль должно содержать хотя бы одну строчную букву, заглавную букву, цифру и спецсимвол',
            'phone.required' => 'Поле Телефон обязательно для заполнения',
            'phone.string' => 'Поле Телефон должно быть строкой',
            'phone.max' => 'Поле Телефон не должно превышать 20 символов',
        ];
    }
}

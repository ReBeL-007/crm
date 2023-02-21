<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    public function rules()
    {
        return [
            'name'    => [
                'required'],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id],
        ];

    }
}

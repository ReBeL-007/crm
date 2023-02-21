<?php

namespace App\Http\Requests\User;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    public function rules()
    {
        return [
            'name'     => [
                'required'],
            'email'    => [
                'required',
                'unique:users'],
            'password' => [
                'required'],
            
        ];

    }
}

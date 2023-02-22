<?php

namespace App\Http\Requests\CRM\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:employees,id',
        ];

    }
}

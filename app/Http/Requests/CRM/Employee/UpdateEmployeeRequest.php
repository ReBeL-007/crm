<?php

namespace App\Http\Requests\CRM\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    public function rules()
    {
        return [
            'firstname'     => [
                'required'],
            'lastname'     => [
                'required'],
            'company_id'     => [
                'required'],
        ];

    }
}

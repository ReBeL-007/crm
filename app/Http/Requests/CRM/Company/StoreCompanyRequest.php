<?php

namespace App\Http\Requests\CRM\Company;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCompanyRequest extends FormRequest
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
                'unique:companies'],
        ];

    }
}

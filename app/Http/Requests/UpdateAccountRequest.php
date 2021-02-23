<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'type'    => [
                'string',
                'required',
                
            ],
            'address'    => [
                'string',
                'required',
                
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('task_access');
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreOpportunityRequest extends FormRequest
{
    public function rules()
    {
        return [
           
            'name'     => [
                'string',
                'required',
            ],
            'amount'    => [
                'int',
                'required',
                
            ],
            'stage'    => [
                'string',
                'required',
                
            ],
            'account_id'=> [
                'int',
                'required',
            ],
        ];
    }
    public function authorize()
    {
        return Gate::allows('task_access');
    }
}

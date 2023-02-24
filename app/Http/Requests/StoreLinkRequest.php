<?php

namespace App\Http\Requests;

use App\Models\Link;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLinkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('link_create');
    }

    public function rules()
    {
        return [
            'slug' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:links',
            ],
            'route' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}

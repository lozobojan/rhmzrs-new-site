<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'slug' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:pages',
            ],
            'attachments' => [
                'array',
                'nullable',
            ],
            'html_content' => [
                'string',
                'nullable',
            ],
        ];
    }
}

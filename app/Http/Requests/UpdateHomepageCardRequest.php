<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateHomepageCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('homepage_cards_edit');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'required',
            ],
            'color' => [
                'string',
                'required',
            ],
        ];
    }
}

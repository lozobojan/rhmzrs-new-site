<?php

namespace App\Http\Requests;

use App\Models\PublicPurchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePublicPurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('public_purchase_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'attachments' => [
                'array',
                'required',
            ],
            'attachments.*' => [
                'required',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'page_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

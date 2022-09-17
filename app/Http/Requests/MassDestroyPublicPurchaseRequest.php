<?php

namespace App\Http\Requests;

use App\Models\PublicPurchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPublicPurchaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('public_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:public_purchases,id',
        ];
    }
}

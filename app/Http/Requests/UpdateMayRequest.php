<?php

namespace App\Http\Requests;

use App\Models\May;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('may_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'month' => [
                'string',
                'min:1',
                'max:8',
                'nullable',
            ],
            'description' => [
                'string',
                'min:1',
                'max:80',
                'nullable',
            ],
            'amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}

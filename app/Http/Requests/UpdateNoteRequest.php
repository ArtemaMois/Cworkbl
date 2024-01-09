<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['string'],
            'body' => ['string', 'min:2', 'max:300'],
            'is_important' => []
        ];
    }
}

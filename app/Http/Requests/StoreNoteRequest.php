<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['string', 'max:10'],
            'body' => ['required', 'string', 'min:2', 'max:300']
        ];
    }
}

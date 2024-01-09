<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchNoteRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['string', 'nullable']
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MinifiedNoteResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => Carbon::parse($this->created_at)->format('d:m Y:i'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d:m Y:i')
        ];
    }
}

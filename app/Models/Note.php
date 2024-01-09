<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'is_important'
    ];

    protected $casts = [
        'body' => 'string',
        'is_important' => 'boolean',
        'updated_at' => 'datetime:d.m H:i'
    ];

    protected function title()
    {
        return Attribute::make(
            get: function ($value) {
                return ucfirst($value);
            },
            set: function ($value) {
                return ucfirst($value);
            }
        );
    }

    protected function body()
    {
        return Attribute::make(
            get: function ($value) {
                return ucfirst($value);
            },
            set: function ($value) {
                return ucfirst($value);
            }
        );
    }
}

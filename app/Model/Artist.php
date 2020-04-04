<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artist';

    protected $fillable = [
        'name_en',
        'img_url',
        'img_size',
        'type',
        'is_active',
        'created_at',
        'updated_at',
    ];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brandjsm extends Model
{
    protected $table = 'brandjsm';

    protected $fillable = [
        'name_en',
        'name_th',
        'img_en',
        'img_th',
        'type',
        'detail_th',
        'detail_en',
        'detail_film',
        'is_active',
        'created_at',
        'updated_at',
    ];
}

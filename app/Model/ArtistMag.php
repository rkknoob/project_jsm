<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArtistMag extends Model
{
    protected $table = 'artist_magazine';

    protected $fillable = [
        'name_en',
        'name_th',
        'img_url',
        'img_url_thai',
        'img_size',
        'type',
        'detail_th',
        'detail_en',
        'is_active',
        'created_at',
        'updated_at',
    ];
}

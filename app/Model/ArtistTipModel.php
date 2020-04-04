<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArtistTipModel extends Model
{
    //
    protected $table = 'artist_tip';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title_en',
        'title_th',
        'img_banner',
        'detail_en',
        'detail_th',
        'link_vdo',
        'is_active',

    ];
}

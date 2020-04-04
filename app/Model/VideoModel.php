<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    //
    protected $table = 'video';
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
        'type',
        'name_en',
        'link_video',
        'is_active',
        'created_at',
        'updated_at',
    ];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model
{
    protected $table = 'notice';
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
        'content',
        'name',
        'create_date',
        'hit',
        'detail',
        'is_active',
    ];


}

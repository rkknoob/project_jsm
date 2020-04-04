<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'event';
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
        'event_type',
        'banner1',
        'banner2',
        'topic_en',
        'topic_th',
        'detail_en',
        'detail_th',
        'create_date',
        'modify_date',
        'is_active',
        'start_date',
        'end_date',
    ];


}

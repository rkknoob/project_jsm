<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FindStoreModel extends Model
{
    //
    protected $table = 'finestore';
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
        'name_th',
        'img1',
        'img2',
        'address',
        'tel',
        'create_date',
        'modify_date',
        'is_active',
        'detail_th',
        'detail_en',
        'map',
    ];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PopupModel extends Model
{
    protected $guard = "popup";
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'popup';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name_en',
        'name_th',
        'img_en',
        'img_th',
        'link',
        'is_active',
        'created_at',
        'updated_at',
    ];
}

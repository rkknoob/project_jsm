<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LineStoryDesciptionModel extends Model
{
    //
    protected $table = 'linestory_description';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seq',
        'linestory_id',
        'detail_type',
        'img_en',
        'img_th',
        'is_active',
        'created_at',
        'updated_at',
    ];
}

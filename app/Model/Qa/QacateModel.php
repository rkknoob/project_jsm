<?php

namespace App\Model\Qa;

use Illuminate\Database\Eloquent\Model;

class QacateModel extends Model
{
    protected $table = 'cate_qa';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];
}

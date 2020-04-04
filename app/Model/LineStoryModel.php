<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LineStoryModel extends Model
{
    protected $table = 'linestory';
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
        'name_en',
        'name_th',
        'banner_en',
        'banner_th',
        'detail_en',
        'detail_th',
        'create_date',
        'modify_date',
        'is_active',
    ];

    public function LineStoryDescrition()
    {
        return $this->hasMany(LineStoryDesciptionModel::class,'linestory_id','id');
    }


}

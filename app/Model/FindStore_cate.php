<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FindStore_cate extends Model
{
    //
    protected $table = 'store_category';
    public $timestamps = true;


    protected $fillable = [
        'id',
        'name_en',
        'name_th',
        'is_active',
        'sorting',
    ];


    public function Findst()
    {
        return $this->hasMany(FindStoreModel::class,'type','id');
    }

}

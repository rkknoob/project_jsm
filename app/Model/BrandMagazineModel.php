<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BrandMagazineModel extends Model
{
    protected $table = 'brand_magazine';
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
        'category_name','id','img_banner','topic_name','link_video','is_active','type'
    ];


}

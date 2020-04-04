<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
     //
     protected $table = 'banner';
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
         'id_category',
         'id_product',
         'seq',
         'name_en',
         'name_th',
         'img_en',
         'img_th',
         'created_at',
         'updated_at',
         'is_active',
     ];
}

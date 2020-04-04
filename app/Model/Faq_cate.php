<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq_cate extends Model
{
    protected $table = 'faq_category';
    public $timestamps = true;


    protected $fillable = [
        'id',
        'name_en',
        'name_th',
        'is_active',
    ];
}

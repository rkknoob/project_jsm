<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    public $timestamps = true;


    protected $fillable = [
        'id',
        'subject',
        'question',
        'answer',
        'type',
        'is_active',
    ];

    public function folder()
    {
        return $this->belongsto(Faq_cate::class,'type','id');
    }


}

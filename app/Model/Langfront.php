<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Langfront extends Model
{
    //
    protected $table = 'frontlang';
    public $timestamps = true;


    protected $fillable = [
        'id',
        'subject_en',
        'subject_th',
        'summary_en',
        'summary_th',
    ];
}

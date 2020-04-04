<?php

namespace App\Model\Qa;

use Illuminate\Database\Eloquent\Model;

class QarelatModel extends Model
{
    protected $guard = "qarelat";
    protected $table = 'qarelat';

    protected $fillable = [
        'id',
        'user_admin',
        'topic_id',
    ];



    public function replys()
    {
        return $this->hasMany(QaanswersModel::class,'qa_id');
    }
}

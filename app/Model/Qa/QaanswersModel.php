<?php

namespace App\Model\Qa;

use Illuminate\Database\Eloquent\Model;

class QaanswersModel extends Model
{
    protected $guard = "answers_qa";
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answers_qa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'details',
        'qa_id',
        'created_at',
        'updated_at',
    ];


}

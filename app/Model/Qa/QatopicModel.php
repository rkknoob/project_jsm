<?php

namespace App\Model\Qa;

use App\User;
use Illuminate\Database\Eloquent\Model;

class QatopicModel extends Model
{
    protected $guard = "topic_qa";
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topic_qa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'type',
        'content',
        'code',
        'hit',
        'user_id',
        'product_id',
        'status',
        'created_at',
        'updated_at',
    ];


    public function usertopics(){
        return $this->belongsTo(User::class , 'user_id');
    }

}

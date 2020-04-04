<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ProductDetailModel;

class Review extends Model
{

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'review';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'product_id',
        'user_id',
        'score',
        'content',
        'hit',
        'status',
        'created_at',
        'updated_at',
    ];


    public function review_product()
    {
        return $this->belongsto(ProductDetailModel::class,'product_id','id');
    }
}

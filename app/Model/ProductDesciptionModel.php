<?php

namespace App\Model;

use App\CoreFunction\Product;
use Illuminate\Database\Eloquent\Model;

class ProductDesciptionModel extends Model
{
    protected $table = 'product_description';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seq',
        'product_id',
        'detail_type',
        'img_en',
        'img_th',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function productsku()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }

}

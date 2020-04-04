<?php

namespace App\Model;

use App\Model\ProductDetailModel;

use Illuminate\Database\Eloquent\Model;


class ProductModel extends Model
{
    protected $guard = "products";
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'product_details_id',
        'product_id',
        'category_id',
        'product_description_id',
        'name_en',
        'name_th',
        'img_color',
        'img_product',
        'stock',
        'is_active',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];

    public function Cate()
    {
        return $this->hasOne('App\Model\CategoryModel' ,'id','category_id');
    }

    public function ProductDetails()
    {
        return $this->hasMany(ProductDetailModel::class,'folder_num','folder_num');
    }

    public function ProductColor()
    {
        return $this->hasMany(OptionModel::class,'product_id','id');
    }

    public static function checklang($num_folder,$id)
    {
        $locale = session()->get('locale');

        $test = ProductDetailModel::where('product_id', $id)->get();
        return $test;
    }

    public function test()
    {
        return $this->hasOne(ProductDetailModel::class,'id','product_details_id');
    }



}

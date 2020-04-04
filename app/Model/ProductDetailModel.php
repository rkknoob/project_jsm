<?php

namespace App\Model;

use App\Model\Qa\QatopicModel;
use App\Model\Review;
use Illuminate\Database\Eloquent\Model;


class ProductDetailModel extends Model
{
    protected $table = 'product_details';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_color',
        'name_th,',
        'product_id',
        'price',
        'size',
        'spl_price',
        'category_id',
        'product_details_id',
        'cover_img',
        'cover_zoom',
        'display_type',
        'name_en',
        'detail_th',
        'detail_en',
        'is_active',
        'start_time',
        'end_time',
        'detail_th',
        'detail_en',
        'created_at',
        'updated_at',
        'is_bestseller',
    ];


    public function Descrition()
    {
        return $this->belongsTo(ProductModel::class,'id','product_details_id');
    }

    public function sku()
    {
        return $this->hasMany(ProductModel::class,'product_details_id','id');
    }

    public function ProductDescrition()
    {
        return $this->hasMany(ProductDesciptionModel::class,'product_id','id');
    }

    public function Products()
    {
        return $this->hasMany(ProductModel::class,'product_details_id','id')->where('is_active','Y');
    }

    public function Cate()
    {
        return $this->hasOne(CategoryModel::class ,'id','category_id');
    }

    public function Producttopci()
    {
        return $this->hasMany(QatopicModel::class ,'product_id','id');
    }

    public function productreview()
    {
        return $this->hasMany(Review::class ,'product_id','id')->where('status','Y');
    }

    public function getDatatables($request = null)
    {
        $query = $this->model->select('products.*', 'categories.name as categorie_name')
            ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'categories.id', '=', 'product_categories.categorie_id');

        if (!empty($request->categorie_id)) {
            $query = $query->where('categories.id', $request->categorie_id);
        }

        if (!empty($request->active)) {
            $active = ($request->active == 1) ? 1 : 0;
            $query = $query->where('active', $active);
        }

        return $query;
    }

}

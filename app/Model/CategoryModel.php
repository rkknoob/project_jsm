<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $guard = "category";
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'img',
        'folder_name',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function Cateone()
    {
        return $this->hasMany(CategoryModel::class ,'product_id','id');
    }


}

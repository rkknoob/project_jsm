<?php

namespace App;

use App\Model\Langfront;
use App\Model\LangMenu;
use App\Model\ProductModel;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';


    protected $fillable = [
        'id',
        'name_en',
        'name_th',
        'parent_id',
        'uri',
        'sort',
        'menu_id'
    ];

    public function Subitem()
    {
        return $this->hasMany(LangMenu::class,'menu_id','id');
    }

}

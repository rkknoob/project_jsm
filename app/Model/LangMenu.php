<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class LangMenu extends Model
{
    //
    protected $table = 'menu_lang';
    public $timestamps = true;

    protected $fillable = [
        'menu_id',
        'lang_id',

    ];



    public function Submenu()
    {
        return $this->hasMany(Langfront::class,'lang_id','id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\AdminMenu;

class AdminProcessMenu extends Model
{
    protected $table = 'admin_menu_process';



    protected $fillable = [
        'id',
        'menu_id',
        'head_id',
    ];


    public function main_me()
    {
        return $this->hasMany(AdminMenu::class,'id','menu_id')->orderBy('id','asc');
    }

    public function main_head()
    {
        return $this->belongsTo(AdminHeadMenu::class,'head_id','id');
    }




}

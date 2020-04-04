<?php

namespace App\Model;

use App\Model\AdminProcessMenu;

use Illuminate\Database\Eloquent\Model;


class AdminHeadMenu extends Model
{

    protected $table = 'admin_menu_head';

    protected $fillable = [
        'name_en',
        'name_th',
        'menu_id',
        'sort_id',
    ];




    public function main_process()
    {
        return $this->hasMany(AdminProcessMenu::class,'head_id','id');
    }

    public function mainmenu()
    {
        return $this->hasMany(AdminMenu::class,'id','menu_id');
    }



}

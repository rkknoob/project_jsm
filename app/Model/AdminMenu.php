<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{


    protected $table = 'admin_menu';



    protected $fillable = [
        'id',
        'main_menu_id',
        'name_en',
        'name_th',
        'icon',
        'link',
        'sort_id',
        'collapse',
        'show',

    ];


}

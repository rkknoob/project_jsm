<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminSubmenu extends Model
{
    protected $table = 'admin_submenu';



    protected $fillable = [
        'id',
        'sub_id',
        'name_th',
        'name_en',
        'icon',
        'link',
        'sort_id',
        'show',
    ];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VDOBannerModel extends Model
{
    //
    protected $table = 'vdo_banner';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'Title_EN',
        'Title_TH',
        'Link_VDO',
        'IsActive',
        'UserCreate',
        'CreateDate',
        'UpdateDate',
    ];
}

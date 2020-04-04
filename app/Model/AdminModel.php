<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    protected $table = 'admin';
    public $timestamps = false;

    use Notifiable;
    // The authentication guard for admin
    protected $guard = 'admin';

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
        'fname',
        'lname',
        'email',
        'password',
        'phone',
        'role',
        'token',
        'created_at',
        'updated_at',
        'is_active',
        'reset_password_token'
    ];



}

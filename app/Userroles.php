<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Userroles extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user_roles_tbl';
    protected $fillable = [
        'user_role',
        'user_role_access' => 'array', 
    ];
    protected $cast = [
        'user_role_access' => 'array',
    ];
    public $primaryKey = 'user_role_id';
    public $timestamps = false; 
}

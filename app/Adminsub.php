<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Adminsub extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'admin_substitute_users_tbl';
    protected $fillable = [
        'substitute_last_name',
        'substitute_first_name',
        'substitute_description',
        'reason_substitution',
    ];
    public $primaryKey = 'substitute_user_id';
    public $timestamps = false; 
}

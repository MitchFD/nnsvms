<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usersemployee extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_employee_info_tbl';
    protected $fillable = [
        'employee_id',
        'employee_job_description',
        'employee_department', 
        'employee_phone_num',
    ];
    public $primaryKey = 'employee_id';
    public $timestamps = false; 
}

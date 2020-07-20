<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usersstudent extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_student_info_tbl';
    protected $fillable = [
        'student_number',
        'student_school',
        'student_course', 
        'student_yearlvl', 
        'student_phone_num',
    ];
    public $primaryKey = 'student_number';
    public $timestamps = false; 
}

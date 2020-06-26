<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students_tbl';
    public $primaryKey = 'student_id';
    public $timestamps = false; 
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Violation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'violations_tbl';
    protected $fillable = [
        'minor_offenses' => 'array', 
        'less_serious_offenses' => 'array', 
        'other_offenses' => 'array', 
        'offense_count',
        'student_id',
        'user_id',
    ];
    protected $cast = [
        'minor_offenses' => 'array', 
        'less_serious_offenses' => 'array', 
        'other_offenses' => 'array', 
    ];
    public $primaryKey = 'violation_id';
    public $timestamps = false; 
}

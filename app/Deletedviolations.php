<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Deletedviolations extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'deleted_violations_tbl';
    protected $fillable = [
        'from_violation_id',
        'deleted_offense_count',
        'deleted_minor_offenses' => 'array',
        'deleted_less_serious_offenses' => 'array',
        'deleted_other_offenses' => 'array',
        'reason_deletion',
        'user_id',
    ];
    protected $cast = [
        'deleted_minor_offenses' => 'array',
        'deleted_less_serious_offenses' => 'array',
        'deleted_other_offenses' => 'array',
    ];
    public $primaryKey = 'deletion_id';
    public $timestamps = false; 
}

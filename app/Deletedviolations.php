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
        'deleted_offenses' => 'array',
        'reason_deletion',
        'user_id',
    ];
    protected $cast = [
        'deleted_offenses' => 'array',
    ];
    public $primaryKey = 'deletion_id';
    public $timestamps = false; 
}

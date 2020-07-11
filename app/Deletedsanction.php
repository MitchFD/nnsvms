<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Deletedsanction extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'deleted_sanctions_tbl';
    protected $fillable = [
        'from_sanction_id',
        'deleted_sanctions' => 'array',
        'reason_deletion',
        'user_id',
    ];
    protected $cast = [
        'deleted_sanctions' => 'array',
    ];
    public $primaryKey = 'deletion_id';
    public $timestamps = false; 
}

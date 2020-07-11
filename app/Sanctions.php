<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sanctions extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sanction_details_tbl';
    protected $fillable = [
        'sanction_key',
        'sanction_details',
        'sanction_status',
        'user_id',
    ];
    public $primaryKey = 'sanction_id';
    public $timestamps = false; 
}

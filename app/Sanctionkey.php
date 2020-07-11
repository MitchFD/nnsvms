<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sanctionkey extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sanction_keys_tbl';
    protected $fillable = [
        'sanction_status',
    ];
    protected $cast = [
        'selected_violation_ids' => 'array',
    ];
    public $primaryKey = 'sanction_key';
    public $timestamps = false; 
}

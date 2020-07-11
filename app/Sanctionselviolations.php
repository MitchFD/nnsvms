<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sanctionselviolations extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sanction_sel_violations';
    protected $fillable = [
        'selected_violation_id',
    ];
    public $primaryKey = 'sanction_key';
    public $timestamps = false; 
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Useractivity extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_activities_tbl';
    protected $fillable = [
        'user_id', 
        'activity_type', 
        'activity_details', 
        'affected_key',
    ];
    public $primaryKey = 'activity_id';
    public $timestamps = false; 
}

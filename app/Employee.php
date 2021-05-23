<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Notifications\Notifiable;
class Employee extends Model
{
    use Notifiable;

    protected $fillable = ['employee_name','employee_designation','group_id','team_id','team_leader','joining_date','role','name','email','password'];

    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }
    public function team(){
        return $this->belongsTo('App\Team','team_id');
    }
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo('App\Role','role');
    }

}

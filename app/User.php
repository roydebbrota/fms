<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role','name', 'email', 'password','user_id','designation','group_id','team_id','is_team_leader'
    ];

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


    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }

    public function team(){
        return $this->belongsTo('App\Team','team_id');
    }

    public function profession(){
        return $this->belongsTo('App\Profession','profession_id');
    }


}

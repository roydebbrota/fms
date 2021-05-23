<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $follable = ['team_name'];

     public function group(){
        return $this->belongsTo('App\Group','group_id');
    }
}


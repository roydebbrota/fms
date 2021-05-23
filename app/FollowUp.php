<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    //

    public function visitType(){
        return $this->belongsTo('App\VisitType','visit_type_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function clientStatus(){
        return $this->belongsTo('App\ClientStatus','client_status_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function team(){
        return $this->belongsTo('App\Team','team_id');
    }

 


}

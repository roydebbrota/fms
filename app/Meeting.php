<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
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

    public function meetingType(){
        return $this->belongsTo('App\MeetingType','meeting_type_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectVisit extends Model
{
    public function visitType(){
        return $this->belongsTo('App\VisitType','visit_type_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function clientStatus(){
        return $this->belongsTo('App\ClientStatus','client_status_id');
    }

    public function project(){
        return $this->belongsTo('App\InterestProject','project_type_id');
    }

    public function vehicleType(){
        return $this->belongsTo('App\VehicleType','vehicle_type_id');
    }
}

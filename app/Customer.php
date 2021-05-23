<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function profession(){
        return $this->belongsTo('App\Profession','profession_id');
    }

    public function source(){
        return $this->belongsTo('App\Source','source_id');
    }

    public function project(){
        return $this->belongsTo('App\InterestProject','project_id');
    }


    public function plot(){
        return $this->belongsTo('App\PlotSize','plot_id');
    }

    public function clientStatus(){
        return $this->belongsTo('App\ClientStatus','client_status_id');
    }


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    
}

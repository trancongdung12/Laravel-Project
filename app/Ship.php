<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    function orders(){
        return $this->belongsTo('App\Order','order_id','id');
    }
    function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

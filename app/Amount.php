<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

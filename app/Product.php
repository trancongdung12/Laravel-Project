<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    function description(){
        return $this->hasOne('App\Description_Product','product_id','id');
    }
    function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }

}

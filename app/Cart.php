<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // function users(){
    //     return $this->belongsTo('App\User','user_id','id');
    // }
        function products(){
                return $this->hasMany('App\Product','id','product_id');
        }
        function getFormatedNumber($number){
            return number_format($number)." đ";
        }
        function getTotalProduct($number){
            return $this->quantity*$number;
        }
}

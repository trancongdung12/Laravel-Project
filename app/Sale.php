<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    function products(){
        return $this->hasOne("App\Product","id","product_id");
    }
}

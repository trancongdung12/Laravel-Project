<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function products(){
        return $this->hasMany("App\Product","category_id","id");
    }
    function getToupperName(){
        return mb_strtoupper($this->name, 'UTF-8');
    }
}

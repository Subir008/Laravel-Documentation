<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Seller extends Model
{
    //
    function onetoone(){
        return $this->hasOne( Product::class,'sell_id');
        // return $this->hasOne('App\Models\Product');
    }
    
    function onetomany(){
        return $this->hasMany(Product::class);
    }
}

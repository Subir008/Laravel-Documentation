<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    function onetooneinverse(){
        // return $this->belongsTo( Seller::class);
        return $this->belongsTo('App\Models\Seller');
    }
}

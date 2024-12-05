<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    //
    function onetoone(){
        return Seller::find(1)->onetoone;
    }
    function onetooneinverse(){
        return Product::with('onetooneinverse')->get();

    }
    function onetomany(){
        return Seller::find(1)->onetomany;

    }
}

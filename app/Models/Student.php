<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    // public $timestamps = false;

    function getnameAttribute ($var) {
        return ucfirst($var);
         //return "aaa";
     }
     function getcontactAttribute ($var) {
         return '+91-' .$var;
        }
        function setNameAttribute ($var) {
            $this->attributes['name'] = ucfirst($var);
         }
    }






<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Fetch data
    function get_data(){
       $student = new Student();
        return $student->all();
        // return "hello";
    }

    // Add data
    function add_data(Request $req){
       $student = new Student();
       $student->name =  $req->name ;
       $student->contact = $req->contact;
       $student->class = $req->class;
       $student->email = $req->email;

       if($student->save()){
        return "Data Added Successfully";
       }else{
        return "Error, Data Can't Added";
       }
    }


}

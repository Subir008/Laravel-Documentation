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
        return ['result' => 'Success' , 'Message' => 'Data Added Successfully' ];
    }else{
        return ['result' => 'Failed' , 'Message' => "Error, Data Can't Added" ];
       }
    }

    // Update data
    function update_data(Request $request){
        // $student = new Student();
        // $student->find($request->id);
        $student = Student::find($request->id);

        $student->name = $request->name;
        $student->contact = $request->contact;
        $student->class = $request->class;
        $student->email = $request->email;
        
        if($student->save()){
            return "Record Updated Successfully";
        }else{
            return "Record Couldn't be Updated";
        }
        // return $student;
    }


}

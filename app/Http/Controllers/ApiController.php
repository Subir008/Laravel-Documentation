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
    function add_data1(Request $req){
       $student = new Student();
       $student->insert([
        'name' =>   $req->name ,
        'contact' => $req->contact ,
        'class' => $req->class,
        'email' =>  $req->email
       ]);
      
       if($student){
        return ['Result' => 'Success' , 'Message' => 'Data Added Successfully' ];
    }else{
        return ['Result' => 'Failed' , 'Message' => "Error, Data Can't Added" ];
       }
    }

    // Update data
    function update_data(Request $request){
        $student = Student::find($request->id);

        $student->name = $request->name;
        $student->contact = $request->contact;
        $student->class = $request->class;
        $student->email = $request->email;
        
        if($student->save()){
            return ['Result' => 'Success' , 'Message' => 'Record Updated Successfully'];
        }else{
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Updated"];
        }
    }
    function update_data1(Request $request){
        $student = Student::where('id' , $request->id)->update([
            'name' =>   $request->name ,
            'contact' => $request->contact ,
            'class' => $request->class,
            'email' =>  $request->email
        ]);

        if($student){
            return ['Result' => 'Success' , 'Message' => 'Record Updated Successfully'];
        }else{
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Updated"];
        }
    }


    // Delete data
    function delete_data(Request $request){
        $student = Student::find($request->id)->delete();

        if($student){
            return ['Result' => 'Success' , 'Message' => 'Record Deleted Successfully'];
        }else{
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Deleted"];
        }
    }
    function delete_data1(Request $request){
        $student = Student::destroy($request->id);

        if($student){
            return ['Result' => 'Success' , 'Message' => 'Record Deleted Successfully'];
        }else{
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Deleted"];
        }
    }


}

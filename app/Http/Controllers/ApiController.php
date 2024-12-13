<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Validator;

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
        $student = Student::findOrFail($request->id)->delete();

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

    // Search data
    function search_data($val){
        $student = Student::where('name','like',"%$val%")->get();
        if($student->count() > 0){
            return ["result" => "success" , 'data' => $student] ;
        }else{
            return ["result" => "failed" , 'data' => "Data not found"] ;
        }
    }

    // Validation of data
    function validate_data(Request $request){
        $rule = [
            'name' => 'required | min:2 | max:10',
            'contact' => 'required | min:10',
            'email' => 'required | email'
            
        ];
        // $rule = array(
        //     'name' => 'required | min:2 | max:10'
        // );

        $validation = Validator::make($request->all() , $rule);

        if($validation->fails()){
            return $validation->errors();
        }else{
            $student = new Student();
            $student->name =  $request->name ;
            $student->contact = $request->contact;
            $student->class = $request->class;
            $student->email = $request->email;
     
            if($student->save()){
             return ['result' => 'Success' , 'message' => 'Data Added Successfully' ];
            }else{
             return ['result' => 'Failed' , 'message' => "Error, Data Can't Added" ];
            }
        }
    }


}

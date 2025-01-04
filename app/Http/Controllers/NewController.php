<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    function getUser(){
        return "hello";
    }

    function about($name){
        // To check the view is present or not
        if(View::exists('about')){
            return view("about" , ['appname' => $name]);
            // return "This is about " . $name ;
        }else{
            echo "Page Not Found";
        }
    }

    function array(){
        $user = ['one' , 'two', 'three'];

        return view('new' , ['user' => $user]);
    }

    function getuserdata(Request $request){
        return $request;
    }

    function getuserdata1(Request $request){
        //to validate a form
        $request->validate([
            'gender' => 'required' ,
            'skill' => 'required' ,
            'email' => 'required | email'
        ]);
        return $request;
    }

    function customformvalidation(Request $request){
        $request->validate([
            'username' => 'min:3 | max:5 | uppercase'
            // uppercase is not a default rule it is user created rule in the Rules folder.
        ],
    [
        // 'username' => 'Username should be between 3-5 characters'
    ]);
    }

    function nameRoute(){
        return to_route('nr');
    }
    function nameRoutes(){
        // return to_route('nrs' , ['name' => 'sss'] );
        return redirect()->route('nrs' , ['name' => 'sss'] );
    }

    //group routing
    function groupRouteShow(){
        return "Function Called";
    }
    function groupRoutefunction(){
        return "Another Function Called";
    }

    function dataFetch(){
        $user = DB::select("Select * From users");

        return view('datafetch' , ['user' => $user]);
    }

    function studentData(){
        $path = \App\Models\Student::all();
        return view('datafetch',['user'=>$path]);
    }

    //Route method
    function get_method(){
        return 'Get Method called';
    }
    function post_method(){
        return 'Post Method called';
    }
    function put_method(){
        return 'Put Method called';
    }
    function patch_method(){
        return 'Patch Method called';
    }
    function delete_method(){
        return 'Delete Method called';
    }
    function any_method(){
        return 'Any Method called';
    }
    function method1(){
        return 'Get, Put, Post Method Group Called';
    }
    function method2(){
        return 'Patch, Delete Method Group Called';
    }

    //Request Class Function
    function request_function(Request $request){ 
        echo "Getting all the data - ";
        print_r( $request->all());
        echo "<br>";
        print_r( $request->collect());
        echo "<br>";
        echo "Getting the required input data by user,like username is - ". $request->input('username');
        echo "<br>";
        echo "Getting the required input data by user,like username is - ". $request->input('password' , 'default');
        echo "<br>";
        echo 'Getting the path - '. $request->path();
        echo "<br>";
        echo "Getting the full URL - " . $request->url();
        echo "<br>";
        echo "Getting the full URL with query - " . $request->fullUrl();
        echo "<br>";
        echo "Getting the full URL with query - " . $request->host();
        echo "<br>";
        echo "Getting ip address - " .$request->ip();
        echo "<br>";
        echo "Getting the request method - " .$request->method();
        echo "<br>";
        echo "Getting the request method - " ;
        echo "<pre>";
        print_r($request->header());
        echo "</pre>";
        echo "<br>";
        
    }
    
    //Session 
    function session(Request $request){
        $request->session()->put(key: 'user', value: $request->input('username'));
        $request->session()->flash('status', 'Login Successful');
        $request->session()->keep('status');
       return redirect('session');
    }
    function logout(Request $request){
        $request->session()->pull(key: 'user');
        $request->session()->flash(key: 'status', value: 'Logout Successful');
        return redirect('session');
    }

    //Accessor
    function accessor_list(){
        return Student::all();
    }
    function normal_list(){
        return DB::table('students')->get();
    }

    // Mutator
    function mutator(){
        $student = new Student();
        $student->name = 'noob';
        $student->contact = 59979;

        $student->save();

        if($student->save()){
            echo "Data Inserted Successfully";
        }
    }

}

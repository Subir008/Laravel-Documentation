<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class QueryController extends Controller
{
    //Using Query Builder
    function query()
    {
        $result = DB::table('students')->get();
        // Search data based on condition
        // $result = DB::table('students')->where('contact','34443')->get();
        // $result = [$result];
        // return view('querybuilder' , ['data'=>$result] );

        // Data Insertion
        // $result = DB::table('students')->insert([
        //     'name' => 'tom',
        //     'contact' => '1234',
        //     'class'=> '9',
        //     'email' => 'tom@test.com'
        // ]);

        // $result = DB::table('students')->upsert(
        //     [
        //         [
        //             'name' => 'san',
        //             'contact' => '12346',
        //             'class' => '10',
        //             'email' => 'san@test.com'
        //         ],
        //         [
        //             'name' => 'toby',
        //             'contact' => '123456',
        //             'class' => '6',
        //             'email' => 'toby@test.com'
        //         ],
        //     ],
        //     ['name', 'email'],
        //     ['contact']
        // );
        // if ($result) {
        //     echo 'Data inserted successfully';
        // } else {
        //     echo 'Data not inserted';
        // }

        //Data Update
        // $update = DB::table('students')->where('id','5')->update(
        //    [ 'name' => 'gary',
        //             'contact' => '123456',
        //             'class' => '6',
        //             'email' => 'gary@test.com']
        // );
        // if ($update) {
        //         echo 'Data updated successfully';
        //     } else {
        //         echo 'Data not updated';
        //     }


        // //Data delete
        // $delete = DB::table('students')->where('id','15')->delete();
        // if ($delete) {
        //             echo 'Data deleted successfully';
        //         } else {
        //             echo 'Data not deleted';
        //         }

       return view('querybuilder' , ['data'=>$result] );
    }

    // Using Elequent model query builder
    function modelQuery(){
    
        // $response =Student::all();
        $response = Student::get();
        
        // $response = Student::where('class','10')->get();

        // $response = Student::where('class','10')->first();
        // $response = [$response];

        // $response = Student::find(1);
        // $response = [$response];

        // // Data insertion
        // $response = Student::insert([
        //     'name' => 'tony',
        //     'contact' => '134',
        //     'class'=> '2',
        //     'email' => 'tony@test.com'
        // ]);
        // if($response){
        //     echo 'Data inserted Successfully';
        // }else{
        //     echo "Data not inserted";
        // }

        // // Data update
        // $response = Student::where('id','16')->update([
        //     'name' => 'toby',
        //     'contact' => '1344',
        //     'class'=> '12',
        //     'email' => 'toby@test.com'
        // ]);
        // if($response){
        //     echo 'Data updated Successfully';
        // }else{
        //     echo "Data not updated";
        // }

        // // Data delete
        // $response = Student::where('id','16')->delete();
        // if($response){
        //     echo 'Data deleted Successfully';
        // }else{
        //     echo "Data not deleted";
        // }


        return view('modelquerybuilder',['data'=>$response]);
        // return $response;
    }

}

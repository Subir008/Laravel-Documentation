<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
   public function uploadFile(Request $request){

    // Way to store image

    // ------------------------------
        // $path = $request->file('file')->store('upload');

        // // Separating the file path
        // $filenameArray = explode('/' , $path);

        // $filename = $filenameArray[1];

        // return view('displayfile' , ['filepath'=> $filename]);
    // ---------------------------------------

        // Getting the user input file
        $image = $request->file('file');

        // echo $image->extension();

        // Separating the name and extension
        $imageArray = explode('.' , $image->getClientOriginalName());

        // Creating new name for the image
        $imagename = $imageArray[0]  . time() . '.' . $image->getClientOriginalExtension();
        
        // Setting the location of file
        $destinationPath = public_path('/upload');

        // Uploading the file to that location
        $image->move($destinationPath , $imagename);
        
        // return $image;
        return view('displayfile' , ['imagename'=> $imagename]);

    }
}

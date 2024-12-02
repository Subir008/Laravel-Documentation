<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\photo;

class CrudController extends Controller
{
    //Inserting items
    function adddetails(Request $request){
        $student = new Student();
        $student::insert([
            'name' => $request->user,
            'contact' => $request->contact ,
            'email' => $request->email
        ]);
        // $student->name = $request->user ;
        // $student->contact = $request->contact ;
        // $student->email = $request->email ;

        // $student->save();

        // return 'Added Successfully';
        $request->session()->flash('added','Record Added Successfully');
        return redirect('crud/show-details');
    }

    //List viewing
    function showdetails(){
        // $student = new Student();
        // $student = Student::get();
        $student = Student::Paginate(7);

        return view( view: 'crud/show-details' ,data: ['studentdata'=>$student]);
    }

    // Deleting items
    function deletedetails(Request $request, $id){
        // $delete = Student::find($id)->delete();
        $delete = Student::destroy(ids: $id);

        if($delete){
            $request->session()->flash('success' ,'Data deleted successfully');
            return redirect('crud/show-details');
        }else{
            $request->session()->flash('fail' , "Error, data can't be deleted ");
            return redirect('crud/show-details');
        }
    }

    // Fetching details for updation
    function fetchdetails(Request $request, $id){
        // $data = Student::where('id',$id)->get();
        $data = Student::find($id);
        return view('crud/update-details' , ['data' => $data]);
    }

    // Updating items
    function updatedetails(Request $request , $id){
        // $student = Student::find($id);
        // $student->name = $request->user;
        // $student->contact = $request->contact;
        // $student->email = $request->email;

        // $student->save();

        // if($student->save()){
        //     $request->session()->flash('success' ,'Data Updated Successfully');
        //     return redirect('crud/show-details');
        // }else{
        //     $request->session()->flash('fail' , "Error, Data Can't Be Updated ");
        //     return redirect('crud/show-details');
        // }

        $student = Student::where('id',$id)->update([
            'name' => $request->user,
            'contact' => $request->contact ,
            'email' => $request->email
        ]);

        if($student){
            $request->session()->flash('success' ,'Data Updated Successfully');
            return redirect('crud/show-details');
        }else{
            $request->session()->flash('fail' , "Error, Data Can't Be Updated ");
            return redirect('crud/show-details');
        }
        
    }

    // Searching items
    function search(Request $request){
        $searchvalue = $request->search;
        
        $student = Student::where('name','like' ,"%$searchvalue%")->get();

        return view('crud/show-details',['studentdata'=>$student , 'searchvalue' => $searchvalue]);
    }

    // Deleting multiple data
    function multidelete(Request $request){
        $student = Student::destroy($request->check);
        if($student){
            $request->session()->flash('success' , 'Record deleted successfully');
            return redirect('crud/show-details');
        }else{
            $request->session()->flash('fail' , "Record Can't Be Deleted");
            return redirect('crud/show-details');
        }
    }

    function uploadimage(Request $request){
        $image = $request->file('file');

        $imagearray = explode('.' , $image->getClientOriginalName() );

        $imageName = $imagearray[0] . time() . '.' . $image->getClientOriginalExtension() ;

        $uploadPath = public_path('/upload');

        $image->move($uploadPath, $imageName);

        // if($image->move($uploadPath)){
            $photo = new photo();
            $photo->name = $imageName;
            $photo->save();

            if($photo->save()){
                $request->session()->flash('success' , 'Image Uploaded Successfully');
                return redirect('crud/display-image');
            }else{
                $request->session()->flash('fail' , "Image Couldn't Uploaded");
                return redirect('crud/display-image');
            }
    }

    function displayimage(Request $request){
        $photo = photo::get();
        // return $photo;
        return view('crud/display-image' , ['photo' => $photo]);
    }

}

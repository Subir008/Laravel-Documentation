<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;
use Validator;

class ApiCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return response()->json([
            'status' => 'Success',
            'message' => 'Data Fetched Successfully' ,
            'data' => $post,
        ] , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min: 5',
                'description' => 'required',
                // 'image' => 'required|mimetype:jpg,png,jpeg'
            ]
        );

        if($validator->fails()){
        return response()->json([
                'status'=> false,
                'message' => 'Validation error',
                'error' => $validator->errors()
            ],401);
        }

        $imagename = "" ;

        if($request->image){
            $img = $request->image;
            // $img = $request->file('image');
            $imageext = $img->getClientOriginalExtension();
            $imagename = time() . '.' . $imageext;
            $path = public_path('upload/' );
            
            $img->move( $path , $imagename);
        }

        $post = Post::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagename,
        ]);

        return response()->json( [
            'status' => true ,
            'message' => 'Post Added Successful',
            'post' => $post
        ] ,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::where('id' , $id)->get()->first();

        return response()->json([
            'status' => true ,
            'message' => "Data Fetched Successfully",
            'post' => $post
        ],
        200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where('id' , $id)->get()->first();
        if($post){
            unlink( 'upload/'.$post['image']);
            $id = $post['id'];
    
            $post = Post::destroy($id);
            
            return response()->json([
                'status' => true ,
                'message' => "Data deleted Successfully",
                'deleted_data' => 'Id - ' .$id
            ],200);
        }else{
            return response()->json([
                'status' => false ,
                'message' => "Data Not Found",
                'delete_data' => $post
            ],404);
        }
    }
}

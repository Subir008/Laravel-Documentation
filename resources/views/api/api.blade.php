<div>
    <h2>API Documents</h2>
    <p>
        For working on Laravel API we have to install the API Packages as it files are not loaded like previous version.
        <br>
        We have to run the code on the terminal to get access of the files - <b>php artisan install:api</b>
        <br>
        After running the command we can access the files in the <b>routes/api.php</b>
        <br>
        The routing path will be written in the <b>api.php</b> file of the routes folder.
    </p>

    <div>

        <h3><u>Fetching all the data Using Api</u></h3>
        <h4>Controller code -</h4>
        function get_data(){ <br>
        $student = new Student(); <br>
        return $student->all(); <br>
        } <br>

        Call the function in the api route path.
    </div>

    <!-- Add -->
    <div>
        <h3><u>Adding data Using Api</u></h3>

        <h4>Controller code -</h4>
        <p>
            <b>1st Way</b><br>
            function add_data(Request $req){ <br>
            $student = new Student(); <br>
            $student->name = $req->name ; <br>
            $student->email = $req->email; <br>
            <br>
            if($student->save()){ <br>
            return ['result' => 'Success' , 'Message' => 'Data Added Successfully' ]; <br>
            }else{ <br>
            return ['result' => 'Failed' , 'Message' => "Error, Data Can't Added" ]; <br>
            } <br>
            } <br>
        </p>
        <p>
            <b>2nd Way</b><br>
            function add_data(Request $req){ <br>
            $student = new Student(); <br>
            $student->insert([ <br>
            'name' => $req->name , <br>
            'email' => $req->email <br>
            ]); <br>

            if($student){ <br>
            return ['Result' => 'Success' , 'Message' => 'Data Added Successfully' ]; <br>
            }else{ <br>
            return ['Result' => 'Failed' , 'Message' => "Error, Data Can't Added" ]; <br>
            } <br>
            } <br>
        </p>
        <h4>Router code-</h4>
        <p>
            Route::post('add-data' , [ApiController::class , 'add_data']);
        </p>
    </div>

    <!-- Update -->
    <div>
        <h3>
            <u>Update Data using Api</u>
        </h3>
        <h4>Controller code -</h4>
        <p>
            <b>1st Way</b>
            <br>
            function update_data(Request $request){ <br>
            $student = Student::find($request->id); <br>
            <br>
            $student->name = $request->name; <br>
            $student->email = $request->email; <br>
            <br>
            if($student->save()){ <br>
            return ['Result' => 'Success' , 'Message' => 'Record Updated Successfully']; <br>
            }else{ <br>
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Updated"]; <br>
            } <br>
            } <br>
            <b>2nd Way</b>
            <br>
            function update_data(Request $request){ <br>
            $student = Student::where('id' , $request->id)->update([ <br>
            'name' => $request->name , <br>
            'email' => $request->email <br>
            ]); <br>
            <br>
            if($student){ <br>
            return ['Result' => 'Success' , 'Message' => 'Record Updated Successfully']; <br>
            }else{ <br>
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Updated"]; <br>
            } <br>
            } <br>
        </p>
        <h4>Router code-</h4>
        <p>
            Route::put('update-data', [ApiController::class , 'update_data']); <br>
            <b>OR</b><br>
            Route::patch('update-data', [ApiController::class , 'update_data']);
        </p>
        <p>
            <b>Note-</b>
            Any of the router method can be called for updating the data either <b>put()</b> or <b>patch()</b>.
        </p>
    </div>

    <!-- Delete -->
    <div>
        <h3>
            <u>Delete code Using Api</u>
        </h3>
        <h4>
            Controller code
        </h4>
        <p>
            <b>1st Way</b>
            <br>
            function delete_data(Request $request){ <br>
            $student = Student::find($request->id)->delete();   <br>
                <br>
            if($student){   <br>
            return ['Result' => 'Success' , 'Message' => 'Record Deleted Successfully'];    <br>
            }else{  <br>
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Deleted"];  <br>
            }   <br>
            }   <br>
            <b>2nd Way</b>
            <br>
            function delete_data(Request $request){    <br>
            $student = Student::destroy($request->id);  <br>
                    <br>
            if($student){   <br>
            return ['Result' => 'Success' , 'Message' => 'Record Deleted Successfully'];    <br>
            }else{  <br>
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Deleted"];  <br>
            }   <br>
            }   <br>
        </p>
        <h4>Router code-</h4>
        <p>
        Route::delete('delete-data', [ApiController::class , 'delete_data']);
        </p>
        <p>
            <b>Note-</b>
            In case of deleting a data if you use <b>delete()</b> if the data is present there it will delete the data, but if the data is not present there it will throw an error, it will not go to the else block of code.
            <br>
            delete() work on after finding the data then deleting it, so you can use <b>findOrFail()</b> it will delete data if it is present otherwise it will throw page not found.
            <br>
            But it will work perfectly for the <b>destroy()</b>.
        </p>
    </div>


</div>
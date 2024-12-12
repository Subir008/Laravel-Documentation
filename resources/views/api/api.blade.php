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

    <div>
        <h3><u>Adding data Using Api</u></h3>

        <h4>Controller code -</h4>
        <p>
            <b>1st Way</b><br>
            function add_data(Request $req){ <br>
            $student = new Student(); <br>
            $student->name = $req->name ; <br>
            $student->contact = $req->contact; <br>
            $student->class = $req->class; <br>
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
            'contact' => $req->contact , <br>
            'class' => $req->class, <br>
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

    <div>
        <h3>
            <u>Update Data using Api</u>
        </h3>
        <p>

        </p>
    </div>
    

</div>
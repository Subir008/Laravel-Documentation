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

    <b>Files to look --</b>
    <li>Controller-> ApiController.php</li>
    <li>Resources -> Views -> api -> api.blade.php</li>
    <li>Routes -> api.php</li>

    <div>

        <h2><u>Fetching all the data Using Api</u></h2>
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
            <br>
            When using form-data for passing values for update it will not work using put method directly, we have to use post method  and in the form-data have to pass the key as <b>_method</b> and value as <b>put</b>, then it will work.
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
            $student = Student::find($request->id)->delete(); <br>
            <br>
            if($student){ <br>
            return ['Result' => 'Success' , 'Message' => 'Record Deleted Successfully']; <br>
            }else{ <br>
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Deleted"]; <br>
            } <br>
            } <br>
            <b>2nd Way</b>
            <br>
            function delete_data(Request $request){ <br>
            $student = Student::destroy($request->id); <br>
            <br>
            if($student){ <br>
            return ['Result' => 'Success' , 'Message' => 'Record Deleted Successfully']; <br>
            }else{ <br>
            return ['Result' => 'Failed' , 'Message' => "Record Couldn't Be Deleted"]; <br>
            } <br>
            } <br>
        </p>
        <h4>Router code-</h4>
        <p>
            Route::delete('delete-data', [ApiController::class , 'delete_data']);
        </p>
        <p>
            <b>Note-</b>
            In case of deleting a data if you use <b>delete()</b> if the data is present there it will delete the data,
            but if the data is not present there it will throw an error, it will not go to the else block of code.
            <br>
            delete() work on after finding the data then deleting it, so you can use <b>findOrFail()</b> it will delete
            data if it is present otherwise it will throw page not found.
            <br>
            But it will work perfectly for the <b>destroy()</b>.
        </p>
    </div>

    <!-- Search -->
    <div>
        <h3>
            <u>Search data using Api</u>
        </h3>

        <h4>Controller code </h4>
        <p>
            function search_data($val){ <br>
            $student = Student::where('name','like',"%$val%")->get(); <br>
            if($student->count() > 0){ <br>
            return ["result" => "success" , 'data' => $student] ; <br>
            }else{ <br>
            return ["result" => "failed" , 'data' => "Data not found"] ; <br>
            } <br>
            } <br>
        </p>

        <h4>Router code-</h4>
        <p>
            Route::get('search-data/{val}' , [ApiController::class , 'search_data']);
        </p>
        <p>

        </p>
    </div>

    <!-- Data Validate -->
    <div>
        <h3>
            <u>Validation of data Using Api</u>
        </h3>

        <h4>Controller code-</h4>
        <p>
            function validate_data(Request $request){ <br>
            $rule = [ <br>
            'name' => 'required | min:2 | max:10', <br>
            'contact' => 'required | min:10', <br>
            'email' => 'required | email' <br>
            ]; <br>
            // $rule = array( <br>
            // 'name' => 'required | min:2 | max:10' <br>
            // ); <br>
            <br>
            $validation = Validator::make($request->all() , $rule); <br>
            <br>
            if($validation->fails()){ <br>
            return $validation->errors(); <br>
            }else{ <br>
            $student = new Student(); <br>
            $student->name = $request->name ; <br>
            $student->contact = $request->contact; <br>
            $student->class = $request->class; <br>
            $student->email = $request->email; <br>
            <br>
            if($student->save()){ <br>
            return ['result' => 'Success' , 'message' => 'Data Added Successfully' ]; <br>
            }else{ <br>
            return ['result' => 'Failed' , 'message' => "Error, Data Can't Added" ]; <br>
            } <br>
            } <br>
            } <br>
        </p>
        <h4>Router code-</h4>
        <p>
            Route::post('validate-data' , [ApiController::class , 'validate_data']);
        </p>
        <p>
            For validating the data first create one array and store the rule for all the fields accordingly.
            <br>
            Then import the <b>Validator</b> class and call the <b>make()</b> function and pass the value in it like --
        <ul>
            <li>All the form input field, with the help of <b>Request</b> class <b>all()</b> </li>
            <li>Array of the rule</li>
            <li>Array of message, if created one</li>
        </ul>
        Then use the <b>fails()</b> function to check if the validation is fulfilled or not.
        </p>
    </div>

    <!-- Signup -->
    <div>
        <h2>
            <u>Signup Using Api</u>
        </h2>

        <h4>Controller code-</h4>
        <p>
            function signup(Request $request){ <br>
            <br>
            $input = $request->all(); <br>
            $input['password'] = <b>bcrypt($request->password)</b>; <br>
            $user = User::create($input); <br>
            $user['name'] = $request->name; <br>
            <br>
            $success['token'] = <b>$user->createToken('MyApps')->plainTextToken</b> ; <br>

            return ['success' => true , 'result' => $success , 'msg' => "User Register Successfully" ]; <br>
            } <br>
        </p>

        <h4>Router code -</h4>
        <p>
            Route::post('signup' , [ApiController::class , 'signup']);
        </p>
        <p>
            <b>Steps</b><br>
        <ul>
            <li>First import <b>HasApiTokens</b> class in the model in which we are going to store the data and perform
                the operation, without this we can't use <b>createToken()</b>function and create the token. </li>
            <li>
                Next, take the user data and from that all data will be stored normally except password , we have to
                store the password in encrypted form, for that we have one function name <b>bcrypt()</b> in that we have
                to pass the nornal user given password.
            </li>
            <li>
                After that we have to store all the data in the db.
            </li>
            <li>
                For creating the token inside createToken() we have to pass one name for the token and with the help of
                plainTextToken, we can get the token value.
                <br>
                <b>User->createToken('MyApps')->plainTextToken ;</b>
            </li>
        </ul>
        </p>
    </div>

    <!-- Login -->
    <div>
        <h2>
            <u>Login & Validating Using Api</u>
        </h2>

        <h4>Controller code-</h4>
        <p>
            function login(Request $request){ <br>
            $user = User::where('email', $request->email)->first(); <br>
            if($user){ <br>
            if(<b>Hash::check($request->password , $user->password )</b>){ <br>
            $success['token'] = <b>$user->createToken('MyApps')->plainTextToken</b>; <br>
            return ['success' => true , 'token' => $success , 'msg' => "User Login Successfully" ]; <br>
            }else{ <br>
            return ['success' => false , 'msg' => "Password Wrong" ]; <br>
            } <br>
            }else{ <br>
            return ['success' => false , 'msg' => "User Not Found" ]; <br>
            } <br>
            } <br>
        </p>
        <h4>Router code-</h4>
        <p>
            Route::post('login' , [ApiController::class , 'login']);
            <br><br>

            <b>Validation</b><br>
            // Route::group(['middleware' => 'auth:sanctum'], function(){   <br>
                <b>OR</b>   <br>
            Route::middleware('auth:sanctum')->group( function(){   <br>
                <br>
            Route::get('get-data', [ApiController::class , 'get_data']);    <br>
            }); <br>
        </p>
        <p>
            <b>Steps</b>
        <ul>
            <li>
                First take the user data with the help of Request class.From the user data check the credentials here we
                are taking email as login credential first check that email is present in db or not.
            </li>
            <li>
                After checking the email if it is valid next check the password is correct or not.For checking the
                password we have to import <b>Hash</b> class because within that we have <b>check()</b> without using
                that we can't verified the password.As the password in the db is in hash form so with the check() we
                have to pass 2 things - first user given password as it is next the password from the db.
            </li>
            <li>
                After successfull signup user will get one token we have to use this token in future operation where it
                is required. For testing phase suppose you are using the postman for checking these api you have to pass
                in the headers.
                <br>
                Header name will be <b>Authorization</b> and its value will be <b>Bearer token_data</b>.
            </li>
            <li>
                The token have to add to all the api's that are under <b>auth:sanctum</b> validation.
            </li>
        </ul>
        </p>
    </div>

</div>
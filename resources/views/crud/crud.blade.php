<div>
    <h2>CRUD Using Elequent Model</h2>

    <a href="crud/add-details">Add-Details</a>
    <a href="crud/show-details">Show-Details</a>
    <a href="crud/upload-image">Upload Image</a>
    <a href="crud/display-image">Display Image</a>

    <h3><u>Insertion</u></h3>
    <p>
        We can insert data in 2 ways- 
        <ul>
            <li>save()</li>
            <li>insert()</li>
        </ul>
        For Insertion of data in the db, first create one object of the model and store the data in that variable that are present in the db and used the function <b> save()</b> to upload the data in the db, if any other name is used other than the column name than it will throw errors.You can get the data from the form using the Request class object.
        <br>
        <strong>
            $student = new Student();<br>
            $student->name = $request->user ;<br>
            $student->contact = $request->contact ;<br>
            $student->save();
        </strong>
    </p>
    <p>
        Second, we can call the <b>insert()</b> function and pass the value in the function in the form of array.
        <br>
        <strong>
            $student = new Student();<br>
            $student::insert([
                'name' => $request->user,
                'contact' => $request->contact ,
                'email' => $request->email
                ]);
        </strong>
    </p>

    <hr>

    <h3><u>List View</u></h3>
    <p>
        For showing the data output it have two methods - 
        <ul>    
            <li>get()</li>
            <li>all()</li>
        </ul> 
        We can directly call the function using - <b>model_name::function_name()</b> or by creating an object of the model and call the function - <b>object_name->function_name()</b>
    </p>
    <p>
    <strong>
        $student = new Student();<br>
        $student->get();<br>
        <br>
        $data = Student::get();<br>
        $data = Student::all();<br>
    </strong>
    </p>

    <hr>

    <h3><u>Delete items</u></h3>
    <p>
        We can delete items from the db using 2 methods - 
        <ul>
            <li>destroy()</li>
            <li>delete()</li>
        </ul>
    </p>
    <p>
        For using <b>destroy()</b> function, we just have to pass the id value that we want to remove, by calling thr model_name.<br>
        <b>$delete = Student::destroy(ids: $id);</b>
        <br><br>
        For using the <b>delete()</b> function, we first call the find() function to find the data, then we can directly delete it.<br>
        <b>$delete = Student::find($id)->delete();</b>
    </p>

    <hr>

    <h3><u>Update items</u></h3>
    We can update items in 2 ways - 
    <ul>
        <li>First by finding the data using the <b>find()</b> in the model and then save the data in proper column and then used the <b> save()</b> function to save the data in the db.</li>
        <br>
        <strong>
            $student = Student::find($id); <br>
            $student->name = $request->user; <br>
            $student->contact = $request->contact; <br>
            $student->save();
        </strong>
        <br>
        <br>
        <li>
            Second, by finding the data using the <b> where()</b> using the id , then update the data using the <b>update()</b>function, inside these function we have to pass the value in the form of array.
        </li>
        <br>
        <b>
            $student = Student::where('id',$id)->update([
                'name' => $request->user,
                'contact' => $request->contact 
                ]);
        </b>
    </ul>

    <hr>

    <h3><u>Searching items</u></h3>
    <p>
        To search an value, we first get the value from the form using get method, then search the value using <b> where()</b> function and pass the values there - <br>
        1.In which column you are Searching. <br>
        2. Any operator suppose like for geting any matching values with it. <br>
        3. Search value. <br>
        <br>
        <b>$student = Student::where('name','like' ,"%$searchvalue%")->get();</b>
    </p>

    <hr>

    <h3><U>Pagiation</U></h3>
    <p>
        To use Pagiation we have 3 functions -
        <ul>
            <li>Paginate()</li>
            <li>simplePaginate()</li>
            <li>cursorPaginate()</li>
        </ul>
        These function will be add at the end of all function like where() and other. <br>
        <b> $student = Student::Paginate(perPage: 7);</b><br><br>
        In the frontend to display the pagination within double curly braces -  <br>
        <b>$student->link()</b>
    </p>

    <hr>
    <h3><u>Multiple Delete</u></h3>
    <p>
        To delete multiple items at a time, pass the value in the form of array . 
        <br>
        <b>$student = Student::destroy($request->check);</b>
    </p>
    
</div>

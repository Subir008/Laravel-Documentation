<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <h2>Elequent model Query Builder</h2>
    <p>
        For using the model query builder we have to first add the model file path to the controller.<br>
        Then using the class name we can call the query builder functions.<br><br>

        Student ->class Name <br>

        <b>Fetching all data</b><br>
        $response = Student::get();<br>
        $response =Student::all();<br>
        <br>
        <b>Fetch the first data based on condition</b><br>
        $response = Student::where('class','10')->first();<br>
        $response = [$response];<br>
        <br>
        <b>Fetch the first data</b><br>
        $response = Student::find(1);<br>
        $response = [$response];<br>
        <br>
        <b>Data Insertion</b><br>
        $response = Student::insert([  
                     'name' => 'tony',
                     'contact' => '134',
                     'class'=> '2',
                     'email' => 'tony@test.com'
                    ]);<br>
        <br>
        <b>Data Updation</b><br>
        $response = Student::where('id','16')->update([
            'name' => 'toby',
            'contact' => '1344',
            'class'=> '12',
            'email' => 'toby@test.com'
        ]);<br>
           <p>
            When using update query for updating data if the table is created manually there will be no timestamp so when updating data we should add 
            timestamps value as false in the model created, so it will not throw any error.
            <br>  public $timestamps = false ;
        </p>
        <b>Data Deletion</b><br>
        $response = Student::where('id','16')->delete();<br>
    </p>
     <h2>Data List</h2>

     <table border="2" cellspacing="0" cellpadding="15" >
           <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
        </tr> 
        @foreach ($data as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->contact}}</td>
                <td>{{$u->email}}</td>
            </tr>
        @endforeach
        
     </table>

</div>

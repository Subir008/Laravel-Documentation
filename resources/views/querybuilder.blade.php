<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
     <h2>Query Builder</h2>
     <p>
        For using the query builder we have to first add the DB path to the controller.<br>
        <b>"use Illuminate\Support\Facades\DB"</b><br>
        <br>
        
        <b>Fetching all data</b><br>
        $result = DB::table('students')->get();<br>
        <br>

        <b>Search the data</b><br>
        $result = DB::table('students')->where('contact','34443')->get();<br>
        $result = [$result];<br>
        <br>

        <b>Fetch the first data based on condition</b><br>
        $result = DB::table('students')->where('contact','34443')->first();<br>
        $result = [$result];<br>
        <br>

        <b>Fetch the first data</b><br>
        $response = Student::find(1);<br>
        $response = [$response];<br>
        <br>

        <b>Data Insertion</b><br>
        $result = DB::table('students')->insert([
            'name' => 'tom',
            'contact' => '1234',
            'class'=> '9',
            'email' => 'tom@test.com'
        ]);<br>
        <br>
        <b>Data Updation</b><br>
        $update = DB::table('students')->where('id','5')->update(
           [ 'name' => 'gary',
                    'contact' => '123456',
                    'class' => '6',
                    'email' => 'gary@test.com']
        );<br>
        <br>
        <b>Data Deletion</b><br>
        $delete = DB::table('students')->where('id','15')->delete();
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

<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
     <h2>User List</h2>

     <table border="2" cellspacing="0" cellpadding="15" >
           <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr> 
        @foreach ($user as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
            </tr>
        @endforeach
        
     </table>

</div>

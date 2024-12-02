<div>
    <h2>Update Details</h2>
    <form action="/crud/update-details/{{$data->id}}" method="post">
    @csrf
    @method('put')
        <input type="text" name="user" value="{{$data->name}}" placeholder="Enter your Name">
        <br><br>
        <input type="tel" name="contact" id="" value="{{$data->contact}}" placeholder="Enter your Contact">
        <br><br>
        <input type="email" name="email" id="" value="{{$data->email}}" placeholder="Enter your Email">
        <br><br>
        <button>Update</button>
        <a href="/crud/show-details">Cancel</a>
    </form>
   
</div>

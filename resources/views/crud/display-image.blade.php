<div>
    <h2>Display Image</h2>


    @foreach ($photo as $img )
        <img src="{{url('upload/'.$img->name)}}" width="250px" alt="">
    @endforeach
</div>

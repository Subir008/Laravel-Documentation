<div>
    <h2>Student Data List</h2>
    @if (session('added'))
        <span class="success">
            {{session('added')}}
        </span>
    @endif
    @if (session('success'))
        <span class="success">
            {{session('success')}}
        </span>
    @endif
    @if (session('fail'))
        <span class="fail">
            {{session('fail')}}
        </span>
    @endif

    <!-- Search -->
    <form action="search" method="get">
        <input type="text" name="search" value="{{@$searchvalue}}" placeholder="Search by Name Here" id="">
        <button>Search</button>
    </form>

    <form action="multi-delete" method="post">
        @csrf
        <button>Delete</button>
        <table border="2" cellspacing="0" cellpadding="15">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>

            @foreach ($studentdata as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->contact}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        <a href="delete-details/{{$data->id}}">Delete</a>
                        <a href="edit-details/{{$data->id}}">Update</a>
                    </td>
                    <td><input type="checkbox" name="check[]" value="{{$data->id}}" id=""></td>
                </tr>
            @endforeach
        </table>
    </form>
    <br>
    {{$studentdata->links()}}

</div>

<style>
    .success {
        background-color: lightgreen;
        padding: 11px 10px;
        width: 400px;
        display: inline-block;
        text-align: center;
        border-radius: 10px;
        margin: 17px 15px;
    }

    .fail {
        background-color: red;
        padding: 11px 10px;
        width: 400px;
        display: inline-block;
        text-align: center;
        border-radius: 10px;
        margin: 17px 15px;
    }

    .w-5.h-5 {
        height: 25px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$request['subject_mail']}}</title>
</head>
<body>
    <h3>Hello, Admin</h3>
    <p>Name: {{$request['name']}}</p>
    <p>Contact: {{$request['contact']}}</p>
    <p>Subject: {{$request['subject_mail']}}</p>
    <p>Comments: {{$request['comments']}}</p>
    <!-- <img src="{{$message->embed(public_path('/upload/'.$filename))}}" alt="" srcset=""> -->
</body>
</html>
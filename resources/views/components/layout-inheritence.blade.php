<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
</head>
<body>
    <h1>@yield('heading')</h1>
    <!-- @yield('main') -->
     @section('main')
     @show
    
</body>
</html>
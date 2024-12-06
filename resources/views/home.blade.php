@include('components.components')

<h1>Home</h1>
<br><br>
<a href="welcome">Welcome</a>
<a href="about">About</a>

<!-- Another way to create URL -->
<a href="{{URL::to('about')}}">About</a>

<!-- Another way to create URL with parameters-->
<a href="{{URL::to('about' , ['test'])}}">About with param</a>

<a href="{{route('nr')}}">Name route</a>
<a href="routegroup/group-route">Group routing</a>
<a href="middleware">Middleware</a>
<a href="query">Query Builder</a>
<a href="modelquery">Elequent Model Query Builder</a>
<a href="routemethod">Route Method</a>
<a href="request">Request Class</a>
<a href="session">Session</a>
<a href="localisation/localisation">Localisation</a>
<a href="layout/home">Layout</a>
<a href="stub">Stub</a>
<a href="seeders">Seeders</a>
<a href="maintenance">Maintenance</a>
<a href="accessors">Accessor</a>
<a href="mutator">Mutator</a>
<a href="relationship">Relationship</a>

<br><br>
<a href="mail">Mail</a>
<a href="crud">CRUD</a>

<br><br>
<!-- Fetching the current url -->
 <h3>
     Current Url - {{URL::current()}}
     <br>
     {{url()->current()}}
     <br>
 </h3>

 <!-- Fetching the full url -->
 <h3>
    Full Url - {{URL::full()}}
    <br>
    {{url()->full()}}
 </h3>




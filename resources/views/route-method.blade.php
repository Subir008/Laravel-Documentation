<div>
    <h2>Route Methods</h2>
    <p>
        The following methods are available on the route object:<br>
        Route::get($uri, $callback);<br>
        Route::post($uri, $callback);<br>
        Route::put($uri, $callback);- These method is used to insert the data.<br>
        Route::patch($uri, $callback); - These method is used for update the data.<br>
        Route::delete($uri, $callback);  - These method is used for delete the data.<br>
        Route::options($uri, $callback); - These method is used for api testing cases.<br>
        <br>
        Route::any($uri, $callback); - These method is work on every method.If the form method is get,post,put or others it will work on all of them.<br>
        Route::match($method, $uri, $callback); - These method is work on group of method, according to the method in the group it will work.<br>
    </p>
    <p>
        Html support only get and post method.<br>
        So to use the others method we have to use one hidden field and name it as '_method' and give its value accordingly like -
        put,patch or delete but in the form tag we have to kept the value of method as post otherwise it will work as get method.
        Or we can use the annotation `method(method_name)`<br>
        <b>input type="hidden" name="_method" value="PUT"</b><br>
       <b> @ method(method_name)</b>
        </p>

    <h2>Get Method</h2>
    <form action="form-submit" method="get">
        <input type="text" name="username" placeholder="Enter Name" id=""><br><br>
        <input type="password" name="password" placeholder="Enter Password" id=""><br><br>
        <button>Submit</button>
    </form>
    <h2>Post Method</h2>
    <form action="form-submit" method="post">
        @csrf
        <input type="text" name="username" placeholder="Enter Name" id=""><br><br>
        <input type="password" name="password" placeholder="Enter Password" id=""><br><br>
        <button>Submit</button>
    </form>
    <h2>Put Method</h2>
    <form action="form-submit" method="post">
        @csrf
        @method('PUT')
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <input type="text" name="username" placeholder="Enter Name" id=""><br><br>
        <input type="password" name="password" placeholder="Enter Password" id=""><br><br>
        <button>Submit</button>
    </form>
    <h2>Patch Method</h2>
    <form action="form-submit" method="post">
        @csrf
        @method('patch')
        <input type="text" name="username" placeholder="Enter Name" id=""><br><br>
        <input type="password" name="password" placeholder="Enter Password" id=""><br><br>
        <button>Submit</button>
    </form>
    <h2>Delete Method</h2>
    <form action="form-submit" method="post">
        @csrf
        @method('delete')
        <input type="text" name="username" placeholder="Enter Name" id=""><br><br>
        <input type="password" name="password" placeholder="Enter Password" id=""><br><br>
        <button>Submit</button>
    </form>
</div>
<div>
    <h2>Middleware</h2>
    <p>
        It is a layer between user and applicaltion.<br>
        When a user request for anything it will go to the middleware after fullfilling all the condition,it will give the response.<br>
        There are 3 types of middleware.<br>
        1. Global middleware. <br>
        2. Group middleware. <br>
        3. Route middleware. <br>
    </p>

    <h3>Global Middleware</h3>
    <p>
        To use Middleware first we have to declare the middleware in the "app.php" file present inside the bootstrap folder.
        <br>
        1. First import the middleware path there.<br>
        2. Append the middleware file name within the withMiddleware like these as below shown.<br>
        <span>
        <h5>Example</h5>
        ->withMiddleware(function (Middleware $middleware) {<br>
        $middleware->append(Agecheck::class); <br>
        })<br>
        </span>
        The global middleware is applied on each and every page .
    </p>

    <h3>Group Middleware</h3>
    <p>
    To use Middleware create the middleware and declare the middleware in the "app.php" file present inside the bootstrap folder.
        <br>
        1. First import the middleware path there.<br>
        2. Append the middleware file name within the withMiddleware like these as below shown.
        <h5>Example</h5>
        ->withMiddleware(function (Middleware $middleware) {<br>
            $middleware->appendToGroup('give_one_middleware_name',[<br>
                Agecheck::class,<br>
                Countrycheck::class <br>
            ]);<br>
        })<br>
        3. Add the middleware name in route in the "web.php" file , it can be done in 2 ways -- <br>
            i. For a single route it can be directly add to a single route.
            <h5>Example</h5>
            Route::view('middleware','middleware')->middleware('middleware_name_given');<br><br>
            ii. Create a group for applying it for multiple routes.
            <h5>Example</h5>
            Route::middleware('check')->group(function(){ <br>
            Route::view('middleware','middleware');<br>
            Route::view('ab','about');<br>
            });<br>
    </p>

    <h3>Route Middleware</h3>
    <p>
        To use the route middleware just have to create the middleware and then add the middleware in the "web.php" file and we can use it 
        directly.<br>
        It is mainly used for single route, we can apply single middleware as well as multiple middleware as well.
        <h5>Example</h5>
        Route::view('middleware','middleware')->middleware([Agecheck::class,Countrycheck::class]);<br>
        Route::view('ab','about')->middleware(Agecheck::class);

    </p>

</div>

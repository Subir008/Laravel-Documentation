<div>
    <h3>Group routing</h3>
    <br>
    <p>
        Group routing can be done in 3 ways -- <br>
            1. prefix route grouping. <br>
            2. controller route grouping
    </p>
    <h3>Prefix route grouping</h3>
    <p>
        To minimise the routing path prfix group routing is used, <br>
        For using prefix group route -><br>
        1. Use prefix function and give the common route path here ==> prefix('route-path')<br>
        2. Call the group function and inside that call annonymous function , using that call the rest view or other codes.<br>
    </p>

    <p>
    Example -- <br>
    Route::prefix('routegroup' )->group( function(){ <br>
    Route::view('/group-route','routegroup/group-route'); <br>
    Route::get('/show',[NewController::class , 'groupRouteShow']);<br>
    Route::get('groupRoutefunction',[NewController::class , 'groupRoutefunction']);<br>
    });
    </p>

    <h3>Controller route grouping</h3>
    <p>
        To minimize the controller path so not have to write the same thing muliple time and make the code small and easy to modify it is used.
        <br>
        Example -- <br>
        Route::controller(NewController::class)->group(function(){<br>
        Route::get('/show', 'groupRouteShow');<br>
        Route::get('/groupRoutefunction',[NewController::class , 'groupRoutefunction']);<br>
    });
    </p>
</div>

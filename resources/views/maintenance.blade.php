<div>
   <h2>Maintenance Mode</h2>
   <p>
    Sometime to update the system the developer had put the system on Maintenance mode, if the user try to access the site it will show a status code of 503, Service Unavailable. 
    <br><br>
    To enable maintenance mode, execute the down Artisan command: 
    <br>
    <b>php artisan down</b>
    <br>
    It will make the website on maintenance mode.
    <!-- <br><br> -->
   </p>
   <h3>
       <u>Bypassing Maintenance Mode</u>
   </h3>
   <p>
        To allow maintenance mode to be bypassed using a secret token, you may use the secret option to specify a maintenance mode bypass token:
        <br>
       <b> php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c43515"</b>
       <br><br>
       Maintenance mode secret should typically consist of alpha-numeric characters and, optionally, dashes.
       <br>
       After putting the site on the maintenance mode you can open the site by putting these secret code after the <b>/</b> , like -- 
       <br>
       <b>https://example.com/1630542a-246b-4b66-afa1-dd72a4c43515</b>
       <br><br>
       If you want to generate a random secret code you can run using <b>with-secret</b> option.
       <br>
       <b>php artisan down --with-secret</b>
   </p>

   <h3><u>Pre-Rendering the Maintenance Mode View</u></h3>
   <p>
    If you wamt to show a separete page rather than <b>Service Unavailable</b> you can create a separete page and pre-render it using <b>down</b>  command's <b>render</b> option.
    <br>
    <b>php artisan down --render="View_name / Page_name"</b>
   </p>

   <h3><u>Disabling Maintenance Mode</u></h3>
   <p>
        To disable maintenance mode, use the <b>up</b> command:
        <br>
        <b>php artisan up</b>
        <br>
        It will make the website live.
   </p>
</div>

<div>
    <h2>API Documents</h2>
    <p>
        For working on Laravel API we have to install the API Packages as it files are not loaded like previous version.
        <br>
        We have to run the code on the terminal to get access of the files - <b>php artisan install:api</b>
        <br>
        After running the command we can access the files in the <b>routes/api.php</b>
        <br>
        The routing path will be written in the <b>api.php</b> file of the routes folder.

        <br><br>

        <h3>Fetching all the data Using Api</h3>
        <h4>Controller code -</h4>
        function get_data(){    <br>
        $student = new Student();    <br>
        return $student->all(); <br>
        }   <br>

        Call the function in the api route path.

        <h3>Adding data</h3>
        

    </p>
</div>

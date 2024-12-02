<div>
    <h2>Seeders</h2>
    <p>
        When developer works on any project they need some demo data if the db is empty, so without adding any data manually in the db, seeders is used.
        <br><br>
        To create seeders -- <b>php artisan make:seeder Seeder_name</b>
        <br><br>
        The file have been created within the database folder inside seeders folder.
        <br><br>
        In the seeder file we have to include 2 things -- <br>
        1.DB file to perform db Operation.<br>
        2. Str file to generate random text. <br>
        <br>
        Last thing to create the data run the code in the terminal -- <b>php artisan db:seed --class=Seeder_Name</b>
    </p>
    <p>
        <h4>Example</h4>
        DB::table('students')->insert([ <br>
            'name' =>Str::random(10),   <br>
            'email' =>Str::random(10).'@gmail.com', <br>
            'contact' =>Str::random(10), <br>
        ]); <br>
    </p>
</div>

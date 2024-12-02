<h2><u>Uploading files in laravel</u></h2>

    <p>
        <b>First</b>, take the file name from the user with the help of file() function of request class.Here name will get passed that have been taken in the form. <br>
        <b>$image = $request->file('file');</b>
        <br><br>
        <b>Second</b>, Create a new name for the file by getting the uploaded file. <br>
        <b>
            $imageArray = explode('.' , $image->getClientOriginalName());<br>
            $imagename = $imageArray[0]  . time() . '.' . $image->getClientOriginalExtension();<br>
        </b>
        <br>
        <b>Third</b>, Create a location for uploadig the files. <br>
        <b>
        $destinationPath = public_path('/upload');
        </b>
        <br>    <br>
        <b>Final</b>, Upload the file to that folder with the help of move() function. <br>
        <b>
        $image->move($destinationPath , $imagename);
        </b>
        <br>
    </p>

    <hr>

    <h3><u>For displaying the image in the frontend</u></h3>

    In blade template inside src tag passed double curly braces and inside pass the url() function.
    In the function pass the path of the folder with the image name.<br>
   <b> src="url('upload/'.$imagename)"</b>

   <hr>

<div>
    <form action="fileupload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="">
        <button>Upload</button>
    </form>
</div>

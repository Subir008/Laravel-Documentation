<div>
    <h2>Upload Image</h2>

    <form action="upload-image" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="">
        <button>Upload</button>
    </form>

</div>

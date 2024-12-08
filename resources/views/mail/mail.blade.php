<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mail</title>
</head>

<body>
    <div>
        @if (session('success'))
            <span class="success">
                {{session('success')}}
            </span>
        @endif
        <h2 class="text-center">Send Mail</h2>
        <h3 class="px-4">Text Mail</h3>
        <form class="row g-3 p-4" action="mail" method="post">
            @csrf
            <div class="col-12">
                <div class="col-md-6">
                    <label for="to" class="form-label">Email</label>
                    <input type="email" class="form-control" id="to" name="to" placeholder="Enter Email Address">
                </div>
            </div>
            <div class="col-12">
                <div class="col-md-6">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject"
                        placeholder="Enter Email Subject">
                </div>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="1234 Main St"></textarea>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>

        <hr>

        <h2 class="px-4"><u>Steps For Sending Text Mail</u></h2>
        <p>
        <ol>
            <li>
                <b>First step</b>, for mail sending is to set the mail configuration in the <b>.env</b> file.
                <br>
                i.e., MAIL_MAILER , MAIL_HOST , MAIL_PORT , MAIL_USERNAME , MAIL_PASSWORD , MAIL_ENCRYPTION ,
                MAIL_FROM_ADDRESS , MAIL_FROM_NAME
                <br>
                If you are using <b>Gmail</b> for sending mail then the value of the field will be --
                <ul type="disc">
                    <li>MAIL_MAILER = smtp</li>
                    <li>MAIL_HOST= smtp.gmail.com</li>
                    <li>MAIL_PORT= 587</li>
                    <li>MAIL_USERNAME= Your mail address</li>
                    <li>MAIL_PASSWORD= Your mail app password</li>
                    <li>MAIL_ENCRYPTION= tls</li>
                    <li>MAIL_FROM_ADDRESS= Your mail address</li>
                    <li>MAIL_FROM_NAME="${APP_NAME}" -> It will be as it is if you want to show the project name
                        otherwise give the required name</li>
                </ul>
            </li>
            <br>

            <li>
                <b>Second step</b>, is to create one <b>Controller</b> file, one <b>Mailable</b> class and one
                <b>View</b>.
                <br>
                For creating mailable class - <b>php artisan make:mail Mail_File_Name</b>
                <br>
                Once after generating the mailable class the directory will get be visible if it is your first time mail
                configuration.
            </li>
            <br>

            <li>
                <b>Third step</b>, in the controller file where data from the form will be taken and have to add 2 file
                one Mail class and next Mailable class.
                <br>
                After getting all the data store the data in variables and pass the variables to the mailable class with
                the help of <b>send()</b> of <b>Mail class</b>.
                <br>
                <br>
                <b>Mail::to($to)->send(new FirstMail($subject , $comment))</b>
                <ul>
                    <li>
                        Within <b>to()</b> have to pass the <b>reciever mail address</b>.
                    </li>
                    <li>
                        Within <b>send()</b> we have to pass the <b>instance or object of the Mailable class</b> &
                        within that we have to pass the <b>information given by the user</b>.
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <b>Fourth step</b>, in the mailer class there are 4 function present.First create the variables that
                will be required to store the data that was passed from the controller.
                <ul type="square">
                    <li>
                        <b>__construct()</b> method is to initialize its value of the variables.
                    </li>
                    <li>
                        <b>envelope()</b> here the subject of the method have to give , you can give the subject as
                        required or from the user form data you can use here as well.
                    </li>
                    <li>
                        <b>content()</b> - These function will return the view that you have created where the data will
                        be shown in the mail.
                    </li>
                </ul>


            </li>
        </ol>
        </p>

        <hr>

        <h3 class="px-4">Attachment Mail</h3>

        <form class="row g-3 p-4" action="{{ route('mail_attach')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('send_success'))
                <div class="card">
                    <div class="alert alert-success m-2" role="alert">
                        {{session('send_success')}}
                    </div>
                </div>
                @elseif(session('send_fail'))
                    <div class="card">
                        <div class="alert alert-danger m-2" role="alert">
                            {{session('send_fail')}}
                        </div>
                    </div>
                @endif
            <div class="col-12">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="to" name="name" placeholder="Enter Your Name">
                </div>
            </div>
            <div class="col-12">
                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact"
                        placeholder="Enter Your Contact">
                </div>
            </div>
            <div class="col-12">
                <div class="col-md-6">
                    <label for="subject_mail" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject_mail"
                        placeholder="Enter Email Subject">
                </div>
            </div>
            <div class="col-12">    
                <div class="col-md-6">
                    <label for="contact" class="form-label">Choose File</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="file">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Comment</label>
                <textarea class="form-control" id="comments" name="comments" placeholder="Add Comment"></textarea>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>

        <hr>

        <h2 class="px-4">Steps For Sending Email With Attachment</h2>

        <p>
            <ol>
                <li><b>First step</b>, same as above.</li>
                <li><b>Second step</b>, same as above.</li>
                <li><b>Third step</b>, all are same as above, additional upload the file in the folder and create a name for the file and pass the name to the mailable class .</li>
                <li>
                    <b>Fourth step</b>, add data for all the function like previous and add the data for <b>attachment()</b>.
                    <br>
                    In these function will have to pass the data of the attachment file , we can send multiple file in it, so it will return an array.
                    <br>
                    We have to take <b>Attachment class</b> in these we have to use the <b>fromPath</b> method and pass the full path of the file.It will automatically add the file to the mail, we don't have to add it separetly to the view for the mail.
                </li>
            </ol>
        </p>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>


<style>
    .success {
        background-color: lightgreen;
        padding: 11px 10px;
        width: 400px;
        display: inline-block;
        text-align: center;
        border-radius: 10px;
        margin: 17px 15px;
    }
</style>
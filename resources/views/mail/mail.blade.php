<div>
    @if (session('success'))
        <span class="success">
            {{session('success')}}
        </span>
    @endif
    <h2>Send Mail</h2>
    <form action="mail" method="post">
        @csrf
        <label for="to">Email Address</label>
        <input type="text" name="to" id="" placeholder="Enter Email Address">
        <br><br>
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="" placeholder="Enter Email Subject">
        <br><br>
        <label for="comment">Comment</label>
        <textarea name="comment" id="" placeholder="Place Your Comment Here"></textarea>
        <br>
        <br>
        <button>Send</button>
    </form>

    <hr>

    <p>
        <ol>
            <li>
                First thing for mail sending is to set the mail configuration in the <b>.env</b> file.
                <br>
                i.e., MAIL_MAILER , MAIL_HOST , MAIL_PORT , MAIL_USERNAME , MAIL_PASSWORD , MAIL_ENCRYPTION , MAIL_FROM_ADDRESS , MAIL_FROM_NAME
            </li>
            
        </ol>
    </p>

</div>

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

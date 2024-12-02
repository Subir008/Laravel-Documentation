<div>
    <h2>Session</h2>
    <p>
        It is used to save user data in the machine. <br><br>
        
        <b>Commonly used methods of session </b>-- <br>
        put(), pull(),flash()
        <br><br>

        <b> put() - </b>  To store the session value, we used these method <br>
        <b>$request->session()->put(key: 'user', value: $request->input('username')); </b><br>
        $request = Object of Request class.<br>
        user = It is the name of the session, using these name we can use this session later.<br>
        username = Here data will get store that have been provided by the user.<br>
        <br>

        <b>pull() - </b>To destroy the session data we used these method <br>
        <b>$request->session()->pull(key: 'user');</b> <br>
        <br>

        <b>flash() - </b>To show some data after certain process is done, we use these method.
        Like some user have logged in so to show that user a successful or failure status in these case 
        we use these methods.It will stay for sometime after the page is reloaded again or any other 
        page is opened it will get erased. It will used same as session.<br>
        To create flash -
        <b>$request->session()->flash(key: 'status', value: 'Logout Successful');</b><br>
        To display flash - 
        session('status')
        <br><br>
        <b>keep() - </b> It will use to keep the flash data for an additional request.  

    </p>
    <hr>
    
    @if (session('status'))
    <span class="login-notify">{{session('status')}}</span>
    
    <br><br>
    @endif

    @if(session('user'))
        Login User is - {{session('user')}}
        <br>
        Click for <a href="logout">Logout </a>
    @endif
    <h2>Login Form</h2>
    <form action="session-response" method="post">
        @csrf
        <input type="text" name="username" placeholder="Enter Name" id="">
        <br><br>
        <input type="password" name="password" placeholder="Enter password">
        <br><br>
        <button>Submit</button>
    </form>
</div>


<style>
    .login-notify{
        background-color: lightgreen;
        padding: 5px 15px;
        border-radius: 5px;
        display: inline-block;
        width: 200px !important;
        text-align: center;
    }
</style>
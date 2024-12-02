<div>
    <form action="userdata" method="post">
        @csrf
        <!-- Have to add these as it will send one token for submitting form -->
        <div class="wrapper">
            <input type="text" name="username" placeholder="Enter Your Name" id="">
        </div>
        <div class="wrapper">
            <input type="text" name="city" placeholder="Enter Your Location" id="">
        </div>
        <div class="wrapper">
            <input type="tel" name="number" placeholder="Enter Your Number" id="">
        </div>
        <div class="wrapper">
            <button>Add User</button>
        </div>
    </form>
</div>


<style>
    input{
        padding: 10px;
        width: 500px;
    }
    .wrapper{
        margin-bottom: 10px ;
    }
    button{
        width: 500px;
        padding: 10px;
        background-color: #fff;
        cursor: pointer;
        color: chartreuse;
        border: 2px solid chartreuses;
    }
</style>
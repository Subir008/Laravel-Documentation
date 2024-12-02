<div>
    <form action="radioform" method="post">
        @csrf
        <div class="wrapper">
            <label for="">Gender</label><br>
            <input type="radio" name="gender" for="male" id="male" value="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" for="female" id="female" value="female">
            <label for="female">Female</label>

            <!-- To show the error validation -->
            <span style="color:red">
                @error('gender')
                    {{$message}} 
                @enderror
            </span>

        </div>
        <div class="wrapper">
            <label for="">Skill</label><br>
            <input type="checkbox" name="skill[]" for="php" id="php" value="php">
            <label for="php">PHP</label>
            <input type="checkbox" name="skill[]" for="java" id="java" value="java">
            <label for="java">JAVA</label>
            <input type="checkbox" name="skill[]" for="c" id="c" value="c"> 
            <label for="c">C++</label>
            <span style="color:red">
            @error('skill')
            {{$message}}
             @enderror
            </span>
        </div>
        <div class="wrapper">
            <label for="age">Age</label><br>
            <input type="range" name="age" min="15" max="50" id="">
        </div>
        <div class="wrapper">
            <input type="text" name="email" placeholder="Enter Your email" id=""> 
            <span style="color:red">
            @error('email')
            {{$message}}
             @enderror
            </span>
        </div>
        <div class="wrapper">
            <select name="city" id="city">
                <option value="kol">kolkata</option>
                <option value="goa">Goa</option>
            </select>
        </div>
        <div class="wrapper">
            <button>Add User</button>
        </div>
    </form>
</div>


<style>
    /* input{
        padding: 10px;
        width: 500px;
    } */
    .wrapper {
        margin-bottom: 10px;
    }

    button {
        width: 500px;
        padding: 10px;
        background-color: #fff;
        cursor: pointer;
        color: chartreuse;
        border: 2px solid chartreuses;
    }
</style>
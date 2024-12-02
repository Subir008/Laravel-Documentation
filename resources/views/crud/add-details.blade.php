<div>
    <h2>Add Details</h2>
    <form action="add-details" method="post">
        @csrf
        <input type="text" name="user" placeholder="Enter your Name">
        <br><br>
        <input type="tel" name="contact" id="" placeholder="Enter your Contact">
        <br><br>
        <input type="email" name="email" id="" placeholder="Enter your Email">
        <br><br>
        <button>Submit</button>
    </form>
</div>

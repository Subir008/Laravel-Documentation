<div>
<h2>Accessors</h2>
    <a href="accessor/accessor-list">Click here to see Updated List</a>
    <a href="accessor/list">Click here to see Old List</a>
    <p>
        When we are fetching data from the db to change the output result accessor is used.
        <br>
        It will not affect the data of the db.
        <br><br>
        For creating accessor in the model we have to create a function with name <b>- getColumn_nameAttribute</b> 
        
        <h4>Example</h4>
        function getNameAttribute ($var) { <br>
            return ucfirst($var);    <br>
        }
    </p>
</div>

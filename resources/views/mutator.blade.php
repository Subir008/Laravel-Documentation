<div>
<h2>Mutator</h2>
    <a href="mutator/accessor-list">Click here to see Updated List</a>
    <a href="accessor/list">Click here to see Old List</a>
    <p>
        When we are save data from into the db to change the input result into our desired way like add some data with it or other operation <b>mutator</b> is used.
        <br>
        It will update the data of the user and get saved in the db.
        <br><br>
        For creating mutator in the model we have to create a function with name <b>- setColumn_nameAttribute</b> 
        
        <h4>Example</h4>
        function getNameAttribute ($var) { <br>
            return ucfirst($var);    <br>
        }
    </p>
</div>

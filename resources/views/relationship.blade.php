<div>
    <h2>Relationship</h2>

    Database tables have often relation with each other.These relationship make the things easy in managing and getting
    data.
    There are varitety of relationship are there.
    <li>One to One</li>
    <li>One to Many</li>
    <li>Many to Many</li>
    <br>

    <h3><u>One to One</u></h3>
    <p>
        It is a basic type of relationship. One table record has relation with another table single record, if in the
        second table it have mutiple relation it will give the first matching one as the result.
        <br>
        For creating One to one relationship, in the 1st table model we have to create one method and have to call the
        method <b>hasOne()</b> and inside it pass the 2nd table model path or 2nd table class name as shown below and
        have to return the whole thing.
        <br>
        For calling these function in the controller we have to pass these name as a property not a function otherwise
        it will throw an error.
    </p>

    <p>
        <b>Model</b>
        <br>
        function <b>seller</b>(){
        <br>
        <b>return $this->hasOne( Product::class);</b>
        <br>
        // <b>return $this->hasOne('App\Models\Product');</b>
        <br>
        }
        <br>
        <br>
        <b>Controller</b>
        <br>
        function onetoone(){
        <br>
        return Seller::find(1)-><b>seller</b>;
        <br>
        }
    </p>

    <p>
        If the column name of the foreign key is not same as of the primary key you can specify it by passing 2nd parameter to the hasOne().
        <br>
        <b>return $this->hasOne(Product::class, 'foreign_key');</b> 
    </p>

    <a href="onetoone">One To One</a>
    <a href="onetooneinverse">One To One Inverse</a>
    <a href="onetomany">One To Many</a>
</div>
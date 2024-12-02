# Laravel Documentation

For using laravel we need 3 things -
1. xmapp
2. php
3. composer

After installing xmapp and composer run these command in the terminal to install the laravel in the machine.\
These is a global command so don't have to specify the directory. \
--> composer global require laravel/installer \
These code need to be run for the first time only not need to run again.

## First step to create a laravel app or project -
Use the command in the terminal --> **laravel new project_name**

After giving the project name it will asked some additional question to add to the project add accordingly.\
[Take the suggestion given, Internet should be on, It will take some time]

**Note -If sqllite is selected as the database if you want to change it to mysql then open the .env file in there change the DB_CONNECTION to mysql and uncomment all the codes for host, port and others.**

**Note- When we push file in git vendor file is not pushed as it is a large file, when other trying to clone the project they will update the composer and it will automatically update the dependencies.**

## How to create Controller ?

1. Using the command in the terminal -
php artisan make:controller Controller_name

2. Manually create the file in the folder.

## How to check view is present or not ?

 Add these file path - use Illuminate\Support\Facades\View;
 then check using if condition - if(View::exists('abouts')){}


----

### Model

It is used to perform the database operation.The model name and the table name should be same and table name should be proular. If the name is different we can specify the name in a variable within that model.

**Example**

If the table name is students the model name should be Student.

If the table name is suppose test and the model name is student, then specify the table name in a varible.

*protected $table = "test";* 

When using update query for updating data if the table is created manually there will be no timestamp so when updating data we should add 
timestamps value as false , so it will not throw any error.

*public $timestamps = false ;*

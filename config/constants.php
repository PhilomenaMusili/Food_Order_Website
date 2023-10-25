<?php
//contants to store none changing variables
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD',"");
define('DB_NAME','food_order');

/*
$localhost="localhost";
$username="root";
$password="";
$db="food_order";
*/
$conn =mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //db connection

$db_select =mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //selecting db


?>
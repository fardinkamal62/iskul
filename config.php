<?php
$host='localhost';
$username='';
$password='';
$dbname = "";
$con=mysqli_connect($host,$username,$password,"$dbname");
if(!$con)
    {
      die('Could not Connect MySql Server:' .mysqli_connect_error());
    }
?>

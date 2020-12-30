<?php
$host='localhost'; //hostname, most probably 'localhost'
// hope you'll understand
$username='';
$password='';
$dbname = '';

$con=mysqli_connect($host,$username,$password,"$dbname");
if(!$con)
    {
      die('Could not Connect MySql Server:' .mysql_error());
    }
?>

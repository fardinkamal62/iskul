<?php
$domain = $_SERVER['HTTP_HOST'] ;
setcookie("lin", "", time() - 10000000,"/iskul","$domain");
header("Location: index.html");
?>

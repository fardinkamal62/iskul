<?php
include("config.php");
date_default_timezone_set("Asia/Dhaka");
$t=time();
if(isset($_COOKIE['lin'])){
    $lin = $_COOKIE['lin'];
  
    $sql = "SELECT * FROM users WHERE lin = '$lin'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(empty($row['name'])){header("Location: logout.php");}; // auto logout if logged in from another device
    
    $name = $row['name'];

    echo "<a href='logout.php'>Logout</a>";
  }
else{
    echo "You're not signed in, please <a href='signin.php'> sign in </a></p>";
  }
  echo "<br>";
  echo("Current time: "); echo(date("h:i a",$t));
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="index.css">
<?php
if(isset($_COOKIE['lin'])){
  echo <<<EOL
  <h1>Hello $name</h1>
  <p>Hope you're doing well.</p>
  <a href='class.php'>Class</a>
  <br>
  <a href='exam.php'>Exam</a>
  </html>

EOL;

if ($row['desig'] == 'gteach' | $row['desig'] == 'princ') 
{
  $sroll = $row['sroll'];
  $eroll = $row['eroll'];
  $x = $sroll;
  echo "<hr><h2><u>Attendance</u></h2>";
  while ($x <= $eroll)
  {
    $present = "SELECT present,name FROM `users` WHERE roll = $x";
    $result = mysqli_query($con, $present);
    $prow = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $naem = $prow['name'];
    if ($prow['present'] == 0) 
    {
      echo "<p style='color: red;'>ID:$x $naem</p>";
    }
    else 
    {
      echo "<p style='color: green;'>ID: $x $naem</p>";
    }

    echo '<br>';
    $x++;
  }
}
}
?>
<?php
include("config.php");
if(isset($_COOKIE['lin'])){
    $pass = $_COOKIE['lin'];

    $sql = "SELECT * FROM users WHERE password = '$pass'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $name = $row['Name'];

    date_default_timezone_set("Asia/Dhaka");
    echo "<a href='logout.php'>Logout</a>";
  }
else{
    echo "You're not signed in, please <a href='signin.php'> sign in </a></p>";
  }
?>
<!DOCTYPE html>
<html>
<script>
function updateTime(){
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()
    var seconds = currentTime.getSeconds()
    if (minutes < 10){
        minutes = "0" + minutes
    }
    if (seconds < 10){
      seconds = "0" + seconds
    }
    var t_str = hours + ":" + minutes + ":" + seconds;
}
setInterval(updateTime, 1000);
</script>
<?php
if(isset($_COOKIE['lin'])){
  echo <<<EOL
  <h2>Current time <span id='time_span'></span></h2>
  <h1>Hello $name,</h1>
  <p>Hope you're doing well.</p>
  <p>Have a nice day😊</p>
  <a href='class.php'>Class</a>
  <hr>
  </html>

EOL;
if ($row['desig'] == 'stud') {
  echo "<a href='exam.php'>Exam</a>";
}

    if ($row['desig'] == 'gteach' | $row['desig'] == 'princ') {
    $sroll = $row['sroll'];
    $eroll = $row['eroll'];
    $x = $sroll;
    while ($x <= $eroll) {
      $present = "SELECT present,Name FROM `users` WHERE id = $x";
      $result = mysqli_query($con, $present);
      $prow = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $naem = $prow['Name'];
      if ($prow['present'] == 0) {
        echo "$naem | ID:$x is absent";
      }
      else {
        echo "$naem | ID:$x is present";
        echo "<br>";
      }
      echo '<br>';
      $x++;
    }
  }
}
?>

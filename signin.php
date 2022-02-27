<?php
session_start();
if (isset($_COOKIE['lin'])) {
  header("Location: dashboard.php");
  die();
}
else{
echo <<<EOL
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Sign in</title>
</head>
<body>
    <h2>Login</h2>
    <br>
      <form action="login.php" method="post">
    
        <div class="container">
          <label for="roll"><b></b></label>
          <input type="text" placeholder="Enter Your Roll" name="roll" required style="padding: 1ch;">
            <br>
          <label for="psw"><b></b></label>
          <input type="password" placeholder="Enter Your Password" name="psw" required style="padding: 1ch;">
            <br>
          <button type="submit" name="login" style="padding: 1ch;">Login</button>
        </div>
    
      </form>
</body>
</html>
EOL;
}
?>
<?php
include('config.php');
$username = $_POST['uname'];
$password = $_POST['psw'];
        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = MD5('$password')";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            setcookie('lin', md5($password), time() + (10 * 365 * 24 * 60 * 60), '/ish-cool; samesite=strict; secure=true; httponly=true'); // cookie securitites
           header("Location: dashboard.php");

        }
        else{
            echo "<h1> Login failed. Invalid username or password. Redirecting...</h1>";
            header("Location: signin.php");
        }
?>

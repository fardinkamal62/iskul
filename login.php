<?php
include('config.php');
$roll = $_POST['roll'];
$password = $_POST['psw'];
        //to prevent from mysqli injection
        $roll = stripcslashes($roll);
        $password = stripcslashes($password);
        $roll = mysqli_real_escape_string($con, $roll);
        $password = mysqli_real_escape_string($con, $password);
        //
        //MySQL
        $sql = "SELECT * FROM users WHERE roll = '$roll' AND password = MD5('$password')";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $t = time()+rand();
            $up = "UPDATE users SET lin=$t,present=1 WHERE roll=$roll";
            setcookie('lin', $t, time()+(10*365*24*60*60), '/iskul; samesite=strict; secure=true; httponly=true');
            mysqli_query($con,$up);
            header("Location: dashboard.php");

        }
        else{
            echo "<h1> Login failed. Invalid username or password. Redirecting...</h1>";
            header("Location: signin.php");
        }
?>

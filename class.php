<?php
include("config.php");

if (isset($_COOKIE['lin'])) {
    echo("<a href='dashboard.php'>Dashboard</a><br><br>");
    date_default_timezone_set("Asia/Dhaka");
    $t=time();
    echo("Current time: "); echo(date("h:i a",$t));

    $sql = "SELECT * FROM `sched` WHERE day = 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $first = $row['first'];
    $sec = $row['second'];
    $third = $row['third'];
}
else {
    header("Location: signin.php");
}

echo "<br>";

$day = 0;

switch (date("l")) {
    case 'Friday':
        $id = 0;
        break;
    case 'Saturday':
        $id = 1;
        break;
    case 'Sunday':
        $id = 2;
        break;
    case 'Monday':
        $id = 3;
        break;
    case 'Tuesday':
        $id = 4;
        break;
    case 'Wednesday':
        $id = 5;
        break;
    case 'Thursday':
        $id = 6;
        break;
}

if ($id = 0) {
    echo "No classes today";
}
else {
    echo <<<EOL
    <html>
        <!DOCTYPE html>
        <br>
        <body>
            <h3>Today's schedule:</h3>
                <table border = "1">
                <tr>
                    <th>8-8:40</th>
                    <th>8:50-9:30</th>
                    <th>9:40-10:20</th>
                </tr>
                <tr>
                    <td>$first </td>
                    <td>$sec </td>
                    <td>$third </td>
                </tr>
                </table>
    
        </body>
    </html>
EOL;
}

?>
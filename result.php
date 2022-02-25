<?php
setcookie("d","y",time() + 3600);
include("config.php");
$lin = $_COOKIE['lin'];
$sql = "SELECT * FROM users WHERE lin = '$lin'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if(empty($row['name'])){header("Location: logout.php");}; // auto logout if logged in from another device
$mark = $row['mark'];

$s1 = "C";
$s2 = "D";
$s3 = "A";
$s4 = "B";
$s5 = "D";
if ($row['mark'] > 0) {
	echo "Bruhhh, you got $mark out of 5. Congo..!";
}
else{
if (empty($_POST['q-1-a'])) {
	$ans1 = "O";
}
else{
	$ans1 = $_POST['q-1-a'];
}

if (empty($_POST['q-2-a'])) {
	$ans2 = "O";
}
else{
	$ans2 = $_POST['q-2-a'];
}

if (empty($_POST['q-3-a'])) {
	$ans3 = "O";
}
else{
	$ans3 = $_POST['q-3-a'];
}

if (empty($_POST['q-4-a'])) {
	$ans4 = "O";
}
else{
	$ans4 = $_POST['q-4-a'];
}

if (empty($_POST['q-5-a'])) {
	$ans5 = "O";
}
else{
	$ans5 = $_POST['q-5-a'];
}

            $totalCorrect = 0;

            if ($ans1 == $s1) { $totalCorrect++; }
            if ($ans2 == $s2) { $totalCorrect++; }
            if ($ans3 == $s3) { $totalCorrect++; }
            if ($ans4 == $s4) { $totalCorrect++; }
            if ($ans5 == $s5) { $totalCorrect++; }
$m_up = "UPDATE `users` SET `mark` = $totalCorrect WHERE `lin` = $lin";
if (mysqli_query($con, $m_up)) {
	echo "Thanks for participating in the exam";
}

?>
<?php
if (isset($_COOKIE['lin'])) {

echo <<<EOL


<!DOCTYPE html>
<html>

<head>
	<meta charset=UTF-8" />

	<title>PHP Quiz</title>

	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Result</h1>


            <div id='results'>$totalCorrect / 5 correct</div>


	</div>

</body>

</html>
EOL;
}
else {
	echo "<p>Please <a href='signin.php'>participate</a> to see your result";
}
}
echo "<a href='dashboard.php'>Dashboard</a>";
?>

<?php
session_start();
if (isset($_COOKIE['d'])) {
	echo "Bruh, you've already participated😑";
	echo "<br>";
	echo "<a href='dashboard.php'>Dashboard</a>";
}
else{
if(isset($_COOKIE['lin'])){
echo <<<EOL
<!DOCTYPE html>
<head>
	<meta charset=UTF-8" />

	<title>PHP QUIZ</title>

	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Simple Quiz Built On PHP</h1>

		<script>
		// Set the date we're counting down to
		var countDownDate = new Date("Dec 9, 2020 0:0:00").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

		  // If the count down is finished, write some text
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("demo").innerHTML = "EXPIRED";
				document.getElementById("submit").click();
		  }
		}, 1000);
		</script>
		<p>Time remaining: <p id="demo"></p></p>

		<form action="result.php" method="post" id="quiz">

            <ol>

                <li>

                    <h3>WordPress is a...</h3>

                    <div>
                        <input type="radio" name="q-1-a" id="q-1-a-A" value="A" />
                        <label for="q-1-a-A">A) Software </label>
                    </div>

                    <div>
                        <input type="radio" name="q-1-a" id="q-1-a-B" value="B" />
                        <label for="q-1-a-B">B) Web App</label>
                    </div>

                    <div>
                        <input type="radio" name="q-1-a" id="q-1-a-C" value="C" />
                        <label for="q-1-a-C">C) CMS</label>
                    </div>

                    <div>
                        <input type="radio" name="q-1-a" id="q-1-a-D" value="D" />
                        <label for="q-1-a-D">D) Other</label>
                    </div>

                </li>

                <li>

                    <h3>SEO is Part Of...</h3>

                    <div>
                        <input type="radio" name="q-2-a" id="q-2-a-A" value="A" />
                        <label for="q-2-a-A">A) Video Editing</label>
                    </div>

                    <div>
                        <input type="radio" name="q-2-a" id="q-2-a-B" value="B" />
                        <label for="q-2-a-B">B) Graphic Designing</label>
                    </div>

                    <div>
                        <input type="radio" name="q-2-a" id="q-2-a-C" value="C" />
                        <label for="q-2-a-C">C) Web Designing</label>
                    </div>

                    <div>
                        <input type="radio" name="q-2-a" id="q-2-a-D" value="D" />
                        <label for="q-2-a-D">D) Digital Marketing</label>
                    </div>

                </li>

                <li>

                    <h3>PHP is a....</h3>

                    <div>
                        <input type="radio" name="q-3-a" id="q-3-a-A" value="A" />
                        <label for="q-3-a-A">A) Server Side Script</label>
                    </div>

                    <div>
                        <input type="radio" name="q-3-a" id="q-3-a-B" value="B" />
                        <label for="q-3-a-B">B) Programming Language</label>
                    </div>

                    <div>
                        <input type="radio" name="q-3-a" id="q-3-a-C" value="C" />
                        <label for="q-3-a-C">C) Markup Language</label>
                    </div>

                    <div>
                        <input type="radio" name="q-3-a" id="q-3-a-D" value="D" />
                        <label for="q-3-a-D">D) None Of Above These</label>
                    </div>

                </li>

                <li>

                    <h3>Localhost IP is..</h3>

                    <div>
                        <input type="radio" name="q-4-a" id="q-4-a-A" value="A" />
                        <label for="q-4-a-A">A) 192.168.0.1</label>
                    </div>

                    <div>
                        <input type="radio" name="q-4-a" id="q-4-a-B" value="B" />
                        <label for="q-4-a-B">B) 127.0.0.0</label>
                    </div>

                    <div>
                        <input type="radio" name="q-4-a" id="q-4-a-C" value="C" />
                        <label for="q-4-a-C">C) 1080:80</label>
                    </div>

                    <div>
                        <input type="radio" name="q-4-a" id="q-4-a-D" value="D" />
                        <label for="q-4-a-D">D) Any Other</label>
                    </div>

                </li>

                <li>

                    <h3>Webdevtrick Is For</h3>

                    <div>
                        <input type="radio" name="q-5-a" id="q-5-a-A" value="A" />
                        <label for="q-5-a-A">A) Web Designer</label>
                    </div>

                    <div>
                        <input type="radio" name="q-5-a" id="q-5-a-B" value="B" />
                        <label for="q-5-a-B">B) Web Developer</label>
                    </div>

                    <div>
                        <input type="radio" name="q-5-a" id="q-5-a-C" value="C" />
                        <label for="q-5-a-C">C) Graphic Designer</label>
                    </div>

                    <div>
                        <input type="radio" name="q-5-a" id="q-5-a-D" value="D" />
                        <label for="q-5-a-D">D) All Above These</label>
                    </div>

                </li>

            </ol>

            <input type="submit" value="Submit" id="submit" class="submitbtn" />
		</form>

	</div>


</body>

</html>

EOL;
}
else{
    echo "You're not signed in, please <a href='signin.php'> sign in </a></p>";
  }
}
?>

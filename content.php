<?php
	session_start();
	//if user has not logged in, redirect to login page..
	if(!isset($_SESSION['lemail']) || !isset($_SESSION['lpassword'])){
	echo "<br><h3 style='text-align:center;color:#3ac162'>Please Login</h3>";
	header("Location: signin.php");
	}
	else{
		echo "<h3 style='text-align:center;color:#3ac162'>YOU ARE SUCCESSFULLY LOGGED IN!!</h3>";
	}

?>

<html>
<head>
	<title>Content Page</title>
	<link rel="stylesheet" href="mystyle.css">
</head>
<body>
	<ul>
		<li><a href="change_pswd.php">CHANGE PASSWORD</a></li>
		<li><a href="delete.php">DELETE USER</a></li>
		<li><a href="logout.php">LOGOUT</a></li>
	</ul>
</body>
</html>
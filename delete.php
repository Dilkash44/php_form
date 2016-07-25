<?php
	session_start();
	//if user has not logged in, redirect to login page..
	if(!isset($_SESSION['lemail']) || !isset($_SESSION['lpassword'])){
	header("Location: signin.php");
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include("connection.php");
		$lemail=$_POST['email'];
		if(empty($lemail)){
			echo "<h3 style='text-align:center;color:#3ac162'>PLEASE ENTER THE REQUIRED FIELD!!</h3>";
		}
		else{
			$query=mysqli_query($dbcn,"DELETE FROM info WHERE email='$lemail' ");
			echo "<h3 style='text-align:center;color:#3ac162'>SUCCESSFULLY DELETED!!</h3>";
		}
	}

?>

<html>
<head>
	<title>Delete User Page</title>
	<link rel="stylesheet" href="mystyle.css">
</head>
<body>
	<ul>
		<li><a href="change_pswd.php">CHANGE PASSWORD</a></li>
		<li><a href="delete.php">DELETE USER</a></li>
		<li><a href="logout.php">LOGOUT</a></li>
	</ul>
	<form action="delete.php" method="post">
		<fieldset>
			<p>Enter the email you want to delete : <input type="text" name="email"></p>
			<input type="submit" value="Delete">
		</fieldset>
	</form>
</body>
</html>
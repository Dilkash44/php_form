<?php
	error_reporting(0);
	//if the form is submiited..
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//includes the connection script..
		include('connection.php');
		//grabbing the values from the form..
		$fn=$_POST['fname'];
		$ln=$_POST['lname'];
		$gen=$_POST['gender'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		if(empty($fn) or empty($ln) or empty($gen) or empty($email) or empty($pass)){
			echo "<h3 style='text-align:center;color:#3ac162'>PLEASE FILL UP THE ENTIRE FORM!!</h3><br>";
		}
		else{
			//writing the query
			$query=mysqli_query($dbcn,"INSERT INTO info VALUES ('$fn','$ln','$gen','$email','$pass')");
			echo "<h3 style='text-align:center;color:#3ac162'>SIGN UP SUCCESSFUL!!</h3><br>";
			//to check how many rows has been affected in the database..
			$row=mysqli_affected_rows($dbcn);
			echo $row." row is affected";
		}
	}
?>


<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" href="mystyle.css">
</head>
<body>
	<form action="register.php" method="post">
		<fieldset>
			<h3 style="float:right;"><a href="signin.php">LOGIN</a></h3><br>
			<p>First Name : <input type="text" name="fname"></p>
			<p>Last Name : <input type="text" name="lname"></p>
			<p>Gender : <input type="radio" name="gender" value="M">Male
						<input type="radio" name="gender" value="F">Female</p>
			<p>Email id : <input type="text" name="email"></p>
			<p>Password : <input type="password" name="password"></p>
			<p><input type="submit" value="Sign Up" style="margin:auto;padding:6px 30px;"></p>
		</fieldset>
	</form>
</body>
</html>
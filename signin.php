<?php
	//if the form is submiited..
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include("connection.php");
		//grabbing the values from the form..
		$lemail=$_POST['lemail'];
		$lpassword=$_POST['lpassword'];
		
		if(empty($lemail) or empty($lpassword)){
			echo "<br><h3 style='text-align:center;color:#3ac162'>Please enter email and password to login!!</h3>";
		}
		else{
			//writing the query
			$query=mysqli_query($dbcn,"SELECT * FROM info WHERE email='$lemail' ");
			$numrows=mysqli_num_rows($query);
			if($numrows==1){
				//fetching each row..
				$row=mysqli_fetch_array($query);
				while($numrows--){
					//grabbing the database stored email and password..
					$dbemail=$row['email'];
					$dbpassword=$row['password'];
					if($dbemail==$lemail){
						if($dbpassword==$lpassword){
							session_start();
							$_SESSION['lemail']=$lemail;
							$_SESSION['lpassword']=$password;
							header("Location: content.php");
						}
						else{	echo "WRONG PASSWORD";
						}
					}
					else{	echo "WRONG EMAIL";
					}
				}
			}
			else{	echo "<h3 style='text-align:center;color:#3ac162;'>YOU ARE NOT REGISTERED</h3>";
			}
		}
	}
?>

<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="mystyle.css">
</head>
<body>
	<form action="signin.php" method="post">
		<fieldset>
		<h3 style="float:right;"><a href="register.php">SIGN UP</a></h3><br>
		<p>Email :<br> <input type="text" name="lemail"><br></p>
		<p>Password : <br><input type="password" name="lpassword"><br></p>
		<input type="submit" value="Login">
	</form>
</body>
</html>
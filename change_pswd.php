<?php
	session_start();
	//if user has not logged in, redirect to login page..
	if(!isset($_SESSION['lemail']) || !isset($_SESSION['lpassword'])){
	header("Location: signin.php");
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include("connection.php");
		$lemail=$_POST['email'];
		$cpass=$_POST['cpass'];
		$npass=$_POST['npass'];
		$ncpass=$_POST['ncpass'];
		if(empty($lemail) or empty($cpass) or empty($npass) or empty($ncpass)){
			echo "<h3 style='text-align:center;color:#3ac162;'>PLEASE FILL UP ALL THE FILEDS!!</h3>";
		}
		else{
			if($npass!=$ncpass){
				echo "<h3 style='text-align:center;color:#3ac162;'>YOUR NEW PASSWORD AND CONFIRM PASSWORD FIELDS DO NOT MATCH!!</h3>";
			}
			else{
				//selects the user whose email matches with the entered..
				$query=mysqli_query($dbcn,"SELECT * FROM info WHERE email='$lemail' ");
				if(mysqli_num_rows($query)==0){
					echo "<h3 style='text-align:center;color:#3ac162;'>YOU ARE NOT REGISTERED!!</h3>";
				}
				//below is the query for update..
				else{
				$query=mysqli_query($dbcn,"UPDATE info SET password='$npass' WHERE email='$lemail' ");
				echo "<h3 style='text-align:center;color:#3ac162;'>PASSWORD CHANGED SUCCESSFULLY!!</h3>";
				}
			}
		}
	}
?>

<html>
<head>
	<title>Change Password Page</title>
	<link rel="stylesheet" href="mystyle.css">
</head>
<body>
	<ul>
		<li><a href="change_pswd.php">CHANGE PASSWORD</a></li>
		<li><a href="delete.php">DELETE USER</a></li>
		<li><a href="logout.php">LOGOUT</a></li>
	</ul>
	<form action="change_pswd.php" method="post">
	<fieldset>
		<p>Email id : <input type="text" name="email"></p>
		<p>Current Password : <input type="password" name="cpass"></p>
		<p>New Password : <input type="password" name="npass"></p>
		<p>Confirm Password : <input type="password" name="ncpass"></p>
		<p><input type="submit" value="Submit"></p>
	</fieldset>
	</form>
</body>
</html>
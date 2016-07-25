<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="info_database";
	//establishing a connection
	$dbcn=mysqli_connect($hostname,$username,$password,$dbname) OR die("ERROR : ".mysqli_connect_error());
	
?>
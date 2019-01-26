<?php
	$hostname = "localhost";
	$username = "";
	$password = "";
	$databasename = "";
	
 	$connection = mysqli_connect($hostname, $username, $password, $databasename); 

 	if(!$connection) {
		die("Connection failed!");
	} else{
		// echo "Connected Successfully";
	}
?>
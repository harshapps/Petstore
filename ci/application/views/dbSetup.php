<?php
	$hostname = "localhost";
	$username = "phanisre_root";
	$password = "";
	$databasename = "phanisre_wdm";
	
 	$connection = mysqli_connect($hostname, $username, $password, $databasename); 

 	if(!$connection) {
		die("Connection failed!");
	} else{
		// echo "Connected Successfully";
	}
?>
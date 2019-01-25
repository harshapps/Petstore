<?php 
	if(isset($_POST['email']) and isset($_POST['password'])){

		$username = $_POST['email'];
		$password = $_POST['password'];

		$selectDb = mysqli_select_db($connection, 'phanisre_wdm');

		if(!selectDb){
			die('Unable to select the Database');			
		}

		$query = "Select * FROM users where username = '$username' AND password = '$password';";

		$query_execute = mysql_query($connection, $query);
		if($query_execute){
			$row = mysql_fetch_array($query_execute) or die(mysql_error());
			echo $row['username'];
		} else{
			echo "No data available";
		}
	}
?>
<?php 
    require("dbSetup.php"); 

	if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['comments'])){
		
		$selectDb = mysqli_select_db($connection, 'phanisre_wdm');
		  
		if (!$selectDb){
           die("Database Selection Failed" . mysqli_error($connection));
        } else {
            //echo "DB Selected";
        }
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $comments = $_POST['comments'];                                
                    
        $sqlQuery = "INSERT INTO contacts (firstname, lastname, email, phone, comments) VALUES ('".$firstname."', '".$lastname."', '".$email."', $phone, '".$comments."'); ";
        
        if(mysqli_query($connection, $sqlQuery)){
            echo "Data entered into Db";  
            // echo "<script type='text/javascript'>alert('Data entered into Db!');</script>";                      
            echo "<script>location.href = 'ContactUs.html';</script>";
        } else {
            echo "Error:" . mysqli_error($connection);
        }                        
	}	
?>
<?php 
    require("dbSetup.php"); 

    if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email'])){
        
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
        $password = "1234567";
        $roleId = 1;
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {     
            echo "<script type='text/javascript'>alert('Wrong email!');</script>";
            echo "<script>location.href = 'Client.php';</script>";       
            die("wrong email");
        }

        //Check if email is already registered
        $emailString = '"'.$email.'"';
        $sql = "SELECT email, password, roleId FROM users WHERE email = $emailString";
        // echo $sql;
        $result = mysqli_query($connection, $sql);
        
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if($row){
            echo "<script type='text/javascript'>alert('Email already registered!');</script>";
            echo "<script>location.href = 'Client.php';</script>";
        }else{
            
            $sqlQuery = "INSERT INTO clients (firstname, lastname, email, phone, password, roleId) VALUES ('".$firstname."', '".$lastname."', '".$email."', $phone, '".$password."', $roleId); ";
        
            if(mysqli_query($connection, $sqlQuery)){
                echo "Data entered into Db";
            
                $subject = "Pet Store Website Password"; 
                $header = "From: uta@cloud"; 
                $messageBody = "Your Client registration password is ".$password; 
            
                mail($email, $subject, $messageBody, $header);  
            
                //echo "<script>location.href = 'Client.php';</script>";
            } else {
                echo "Error:" . mysqli_error($connection);
            }
        
            $sqlQueryForUserTable = "INSERT INTO users (email, password, roleId) VALUES ('".$email."', '".$password."', $roleId); ";
        
            if(mysqli_query($connection, $sqlQueryForUserTable)){
                echo "Data entered into users Db";
            
                echo "<script>location.href = 'Client.php';</script>";
            } else {
                echo "Error:" . mysqli_error($connection);
            }
        }        
    }   
?>
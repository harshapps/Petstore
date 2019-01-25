<?php 
    require("dbSetup.php"); 

    if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email'])){
        
        $selectDb = mysqli_select_db($connection, 'phanisre_wdm');
        
        if (!$selectDb){
           die("Database Selection Failed" . mysqli_error($connection));
        } else {
            echo "DB Selected";
        }
        
        if(empty($_POST['businessname'])){
            $_POST['businessname'] = "";
        }
        if(empty($_POST['phone'])){
            $_POST['phone'] = 1234567891;
        }
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $businessname = $_POST['businessname'];
        $password = "1234567";
        $roleId = 2;
        
         
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {     
            echo "<script type='text/javascript'>alert('Wrong email please enter valid email address!');</script>";
            echo "<script>location.href = 'Service.html';</script>";       
            die("wrong email");
        }
        
        $sqlQuery = "INSERT INTO business (firstname, lastname, email, phone, buisnessname, password, roleId) VALUES ('".$firstname."', '".$lastname."', '".$email."', $phone, '".$businessname."', '".$password."', $roleId); ";
        
        if(mysqli_query($connection, $sqlQuery)){
            echo "Data entered into Db";
            
            $subject = "Pet Store Website Password"; 
            $header = "From: uta@cloud"; 
            $messageBody = "Your Service registration password is ".$password; 
            
            mail($email, $subject, $messageBody, $header);
            echo "<script>location.href = 'Service.html';</script>";
        } else {
            echo "Error:" . mysqli_error($connection);
        }
        
        $sqlQueryForUserTable = "INSERT INTO users (email, password, roleId) VALUES ('".$email."', '".$password."', $roleId); ";
        
        if(mysqli_query($connection, $sqlQueryForUserTable)){
            echo "Data entered into users Db";
            
            echo "<script>location.href = 'Service.html';</script>";
        } else {
            echo "Error:" . mysqli_error($connection);
        }
    }else{
        echo "<script type='text/javascript'>alert('No details entered!');</script>";
    }
?>
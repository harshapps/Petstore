<?php
require("dbSetup.php"); 

if(isset($_POST['email']) and isset($_POST['oldpassword']) and isset($_POST['newpassword']) and isset($_POST['confirmnewpassword'])){
    if(!empty(trim($_POST['email']))){
        $email = $_POST['email'];
    }
    $emailString = '"'.$email.'"';
    if(!empty(trim($_POST['oldpassword']))){
        $oldpassword = $_POST['oldpassword'];
    }
    if(!empty(trim($_POST['newpassword']))){
        $newpassword = $_POST['newpassword'];
    }        
    if(!empty(trim($_POST['confirmnewpassword']))){
        $confirmnewpassword = $_POST['confirmnewpassword'];
    }

    if(trim($_POST['newpassword']) != trim($_POST['confirmnewpassword'])){
        //alert("The new password and confirm new password do not match");
        //echo "The new password and confirm new password do not match";
        echo "<script type='text/javascript'>alert('The new password and confirm new password do not match');</script>";
        echo "<script>location.href = 'MyClientChangePassword.php';</script>";
        exit;
    }else{
        $sql = "SELECT email, password, roleId FROM users WHERE email = $emailString";

        $result = mysqli_query($connection, $sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($row && $row["email"] == $_POST['email'] && $row["password"] == $_POST["oldpassword"]){
            $updatesql = "UPDATE users SET password = $newpassword WHERE email = $emailString";
            // echo $updatesql;

            if(mysqli_query($connection, $updatesql)){
                echo "Updated the password!";
                echo "<script type='text/javascript'>alert('Updated the password!');</script>";
                if($row["roleId"] == 1){
                    echo "<script>location.href = 'MyClient.html';</script>";
                }else{
                    echo "<script>location.href = 'MyBusiness.html';</script>";
                }            
            }
        }else{
            //alert("The old password does not match");
            //echo "The old password does not match";
            echo "<script type='text/javascript'>alert('The old password does not match');</script>";
            echo "<script>location.href = 'MyClientChangePassword.php';</script>";
            exit;  
        }            
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/pet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>Client's Pet Store</h1>
        </header>

        <div id="leftVerticalPane" class="myClientChangePasswordNav">
            <nav>
                <ul>
                    <li><a href="#">Change Password</a></li>
                    <li><a href="index.html">Logout</a></li>                    
                </ul>
            </nav>
        </div>

        <div id="rightVerticalPane" class="myClientChangePasswordRightVerNav">
            <section>
                <article>
                    <img id="bannerImageHome" src="<?php echo base_url(); ?>assets/images/pet store banner 5 png (1).png" alt="Pet Banner Image">
                    <div id="centerBody">
                        <h2>My Pet</h2>

                        <p>Required information is marked with an asterix (*).</p>

                        <div id="contactUsForm">
                            <form id="serviceRegisterForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <table>
                                    <tr>
                                        <td>* Enter your email:</td>
                                        <td><input type="text" name="email" required></td>
                                    </tr>
                                    <tr>
                                        <td>* Old Password:</td>
                                        <td><input type="password" name="oldpassword" required></td>
                                    </tr>
                                    <tr>
                                        <td>* New Password:</td>
                                        <td><input type="password" name="newpassword" required></td>
                                    </tr>
                                    <tr>
                                        <td>* Confirm New Password:</td>
                                        <td><input type="password" name="confirmnewpassword" required></td>
                                    </tr>                                    
                                    <tr>
                                        <!-- <td><input type="submit" value="Submit" onclick=" return submitButtonClicked()"></td> -->
                                            <td><input type="submit" value="Submit"></td>                                    
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </article>
            </section>

            <footer>
                <p><i>Copyright &copy; 2018 Pet Store</i><br>
                    <i><a href="mailto:phanisreeharsha@pullabhatlapogada.com">phanisreeharsha@pullabhatlapogada.com</a></i></p>
                </footer>
            </div>
        </div>

        <script type="text/javascript">
            function submitButtonClicked(){
                var newpassword = document.getElementById("newpassword");
                var confirmnewpassword = document.getElementById("confirmnewpassword");            

                if(newpassword.value !== '' || confirmnewpassword.value !== ''){
                    newpassword.classList.add("addValueToElement");
                    confirmnewpassword.classList.add("addValueToElement");
                }else{
                    newpassword.classList.remove("addValueToElement");
                    confirmnewpassword.classList.remove("addValueToElement");                    
                }
            }    
        </script>    
    </body>

    </html>
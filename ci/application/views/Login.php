<?php 
    // require("dbSetup.php"); 

    // if(isset($_POST['email']) and isset($_POST['password'])){
    //     if(!empty(trim($_POST['email']))){
    //         $email = $_POST['email'];
    //     }
    //     $emailString = '"'.$email.'"';
    //     if(!empty(trim($_POST['password']))){
    //         $password = $_POST['email'];
    //     }

    //     $sql = "SELECT email, password, roleId FROM users WHERE email = $emailString";
    //     // echo $sql;
    //     $result = mysqli_query($connection, $sql);
        
    //     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //     if($row && $row["email"] == $_POST['email'] && $row["password"] == $_POST["password"]){
    //         session_start();
    //         $_SESSION["email"] = $row["email"];
    //         $_SESSION["password"] = $row["password"];
            
    //         if($row["roleId"] == 1){
    //             echo "<script>location.href = 'MyClient.html';</script>";
    //         }else{
    //             echo "<script>location.href = 'MyBusiness.html';</script>";
    //         }            
    //     }else{
    //         # echo "Username not found";
    //         echo "<script type='text/javascript'>alert('Username/Password not found!');</script>";
    //     }
    // }
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
            <h1>Pet Store</h1>
        </header>

        <div id="leftVerticalPane" class="loginPageNav">
            <nav>
                <ul>
                    <li><a href="<?php echo base_url(); ?>Welcome/index">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>Welcome/AboutUs">About Us</a></li>
                    <li><a href="<?php echo base_url(); ?>Welcome/ContactUs">Contact Us</a></li>
                    <li><a href="<?php echo base_url(); ?>Welcome/Client">Client</a></li>
                    <li><a href="<?php echo base_url(); ?>Welcome/Service">Service</a></li>
                    <li><a href="<?php echo base_url(); ?>Welcome/Login">Login</a></li>
                </ul>
            </nav>
        </div>

        <div id="rightVerticalPane">
            <section>
                <article>
                    <img id="bannerImageHome" src="<?php echo base_url(); ?>assets/images/pet store banner 5 png (1).png" alt="Pet Banner Image">
                    <div id="centerBody">
                        <h2>Login</h2>

                        <p>Required information is marked with an asterix (*).</p>                        

                        <div id="contactUsForm">
                            <?php $this->load->library('form_validation'); 
                                echo validation_errors(); 
                            ?>
                            <form id="loginForm" method="post" action="<?php echo base_url(); ?>Welcome/login_validation">
                                <table>
                                    <tr>
                                        <td>* E-mail:</td>
                                        <td><input type="text" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td>* Password:</td>
                                        <td><input type="password" name="password"></td>
                                    </tr>
                                    <tr>
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
    </body>

    </html>
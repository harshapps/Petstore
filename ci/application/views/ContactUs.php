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

        <div id="leftVerticalPane" class="contactUsNav">
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
                    <img id="bannerImageHome" src="<?php echo base_url(); ?>assets/images/pet store banner 7 png.png" alt="Pet Banner Image">
                    <div id="centerBody">
                        <h2>Contact Us</h2>

                        <p>Required information is marked with an asterix (*).</p>

                        <div id="contactUsForm">
                            <?php $this->load->library('form_validation'); 
                                echo validation_errors(); 
                            ?>
                            <form id="serviceRegisterForm" method="post" action="<?php echo base_url(); ?>Welcome/contactus_insert_data">
                                <table>
                                    <tr>
                                        <td>* First Name:</td>
                                        <td><input type="text" name="firstname" id="firstname" required></td>
                                    </tr>
                                    <tr>
                                        <td>* Last Name:</td>
                                        <td><input type="text" name="lastname" id="lastname" required></td>
                                    </tr>
                                    <tr>
                                        <td>* E-mail:</td>
                                        <td><input type="text" name="email" id="email"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input type="text" name="phone" id="phone"></td>
                                    </tr>
                                    <tr>
                                        <td>* Comments:</td>
                                        <td><textarea name="comments" rows="3" cols="25" id="comments"></textarea></td>
                                    </tr>
                                    <tr>
                                        <!-- <td><input type="submit" value="Submit" onclick="return submitButtonClicked()"></td>                                     -->
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
                var firstname = document.getElementById("firstname");
                var lastname = document.getElementById("lastname");
                var email = document.getElementById("email");
                var comments = document.getElementById("comments");
                var phone = document.getElementById("phone");

                if(firstname.value === '' && lastname.value === '' && email.value === '' && comments === ''){
                    firstname.classList.add("addValueToElement");
                    lastname.classList.add("addValueToElement");
                    email.classList.add("addValueToElement");
                    return false;
                } else if(firstname.value !== '' && lastname.value === '' && email.value === '' && comments === ''){
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.add("addValueToElement");
                    email.classList.add("addValueToElement");
                    return false;
                } else if(firstname.value !== '' && lastname.value !== '' && email.value === '') {
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.remove("addValueToElement");
                    email.classList.add("addValueToElement");
                    return false;
                } else if(firstname.value !== '' && lastname.value === '' && email.value !== '') {
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.add("addValueToElement");
                    email.classList.remove("addValueToElement");
                    return false;
                } else if(firstname.value === '') {
                    firstname.classList.add("addValueToElement");
                    return false;
                } else if(lastname.value === ''){
                    lastname.classList.add("addValueToElement");
                    return false;
                } else if(email.value === ''){
                    email.classList.add("addValueToElement");
                    return false;
                } else if(comments.value === ''){
                    comments.classList.add("addValueToElement");
                    return false;
                } else {
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.remove("addValueToElement");
                    email.classList.remove("addValueToElement");
                    comments.classList.remove("addValueToElement");
                    return true;
                }                            
            }    
        </script>
    </body>
    </html>
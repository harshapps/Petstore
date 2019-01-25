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

        <div id="leftVerticalPane"  class="servicePageNav">
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
                        <h2>Service</h2>

                        <p>Required information is marked with an asterix (*).</p>

                        <div id="contactUsForm">
                            <?php $this->load->library('form_validation'); 
                                echo validation_errors(); 
                            ?>
                            <form id="serviceRegisterForm" method="post" action="<?php echo base_url(); ?>Welcome/service_insert_data">
                                <table>
                                    <tr>
                                        <td>* First Name:</td>
                                        <td><input type="text" name="firstname"></td>
                                    </tr>
                                    <tr>
                                        <td>* Last Name:</td>
                                        <td><input type="text" name="lastname"></td>
                                    </tr>
                                    <tr>
                                        <td>* E-mail:</td>
                                        <td><input type="text" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input type="text" name="phone"></td>
                                    </tr>
                                    <tr>
                                        <td>Business Name:</td>
                                        <td><input type="text" name="businessname"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="Submit" onclick="submitButtonClicked()"></td>                                    
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
                var phone = document.getElementById("phone");
                var businessname = document.getElementById("businessname");

                if(firstname.value === '' && lastname.value === '' && email.value === ''){
                    firstname.classList.add("addValueToElement");
                    lastname.classList.add("addValueToElement");
                    email.classList.add("addValueToElement");
                } else if(firstname.value !== '' && lastname.value === '' && email.value === ''){
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.add("addValueToElement");
                    email.classList.add("addValueToElement");
                } else if(firstname.value !== '' && lastname.value !== '' && email.value === '') {
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.remove("addValueToElement");
                    email.classList.add("addValueToElement");
                } else if(firstname.value !== '' && lastname.value === '' && email.value !== '') {
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.add("addValueToElement");
                    email.classList.remove("addValueToElement");
                } else if(firstname.value === '') {
                    firstname.classList.add("addValueToElement");
                } else if(lastname.value === ''){
                    lastname.classList.add("addValueToElement");
                } else if(email.value === ''){
                    email.classList.add("addValueToElement");
                } else {
                    firstname.classList.remove("addValueToElement");
                    lastname.classList.remove("addValueToElement");
                    email.classList.remove("addValueToElement");
                }                            
            }    
        </script>    
    </body>

    </html>
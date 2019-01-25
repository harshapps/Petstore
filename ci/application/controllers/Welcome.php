<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//Default view
		$this->load->view('index.html');
	}
	
	public function AboutUs()
	{
		$this->load->view('AboutUs.html');
	}

	public function ContactUs()
	{
		$this->load->view('ContactUs');
	}

	public function Client()
	{
		$this->load->view('Client');
	}

	public function MyClient()
	{
		$this->load->view('MyClient.html');
	}

	public function MyBusiness()
	{
		$this->load->view('MyBusiness.html');
	}

	public function Service()
	{
		$this->load->view('Service');
	}

	public function Login()
	{
		$data['title'] = 'Login with Username and password';
		$this->load->view('Login');
	}

	public function MyClientChangePassword()
	{
		$this->load->view('MyClientChangePassword');
	}

	public function MyBusinessChangePassword()
	{
		$this->load->view('MyBusinessChangePassword');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');  
		//redirect(base_url() . 'main/login');  
		$this->load->view('logout');	
	}

	public function client_insert_data()
	{
		$this->load->library('form_validation');  
		$this->form_validation->set_rules("firstname", "First Name", 'trim|required');  
		$this->form_validation->set_rules("lastname", "Last Name", 'trim|required');  
		$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email');

		if($this->form_validation->run() == TRUE)
		{		    
		    $firstname = $this->input->post("firstname");
		    $lastname = $this->input->post("lastname");
		    $phone = $this->input->post("phone");
		    $email = $this->input->post("email");
		    $password = "1234567";
		    
			$this->load->model("RootModelFile");

			if($this->RootModelFile->check_if_email_exists($email)){
				echo "<script type='text/javascript'>alert('Client already registered!');</script>";
				echo "<script>location.href = 'Client';</script>"; 
			}else{
				$dataclient = array("firstname"=>$firstname,
						  "lastname"=>$lastname,
						  "phone"=>$phone,
						  "email"=>$email,
						  "password"=>$password,
						  "roleId"=>1
		                 );
		        
		        $datausers = array(
						  "email"=>$email,
						  "password"=>$password,
						  "roleId"=>1
		                 );

				$this->RootModelFile->client_model_insert_data($dataclient);
				$this->RootModelFile->user_model_insert_data($datausers);
                
                $subject = "Pet Store Website Password"; 
                $header = "From: uta@cloud"; 
                $messageBody = "Your Client registration password is 1234567"; 
            
                mail($email, $subject, $messageBody, $header);  
                
				//redirect(base_url() . '/Welcome/Client'); 
				echo "<script type='text/javascript'>alert('Successfully registered!');</script>";
				echo "<script>location.href = 'Client';</script>"; 		
			}			
		}else{
			$this->Client();
		}
	}

	public function service_insert_data()
	{
		$this->load->library('form_validation');  
		$this->form_validation->set_rules("firstname", "First Name", 'trim|required');  
		$this->form_validation->set_rules("lastname", "Last Name", 'trim|required');  
		$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email');  

		if($this->form_validation->run() == TRUE)
		{
		    
		    $firstname = $this->input->post("firstname");
		    $lastname = $this->input->post("lastname");
		    $phone = $this->input->post("phone");
		    $email = $this->input->post("email");
		    $businessname = $this->input->post("businessname");
		    $password = "1234567";
		    
			$this->load->model("RootModelFile");

			if($this->RootModelFile->check_if_email_exists($email)){
				echo "<script type='text/javascript'>alert('Service already registered!');</script>";
				echo "<script>location.href = 'Service';</script>"; 
			}else{
				$dataclient = array("firstname"=>$firstname,
						  "lastname"=>$lastname,
						  "phone"=>$phone,
						  "email"=>$email,
						  "password"=>$password,
						  "buisnessname"=>$businessname,
						  "roleId"=>2
		                 );
		        
		        $datausers = array(
						  "email"=>$email,
						  "password"=>$password,
						  "roleId"=>2
		                 );

				$this->RootModelFile->service_model_insert_data($dataclient);
				$this->RootModelFile->user_model_insert_data($datausers);
                
                $subject = "Pet Store Website Password"; 
                $header = "From: uta@cloud"; 
                $messageBody = "Your Client registration password is 1234567"; 
            
                mail($email, $subject, $messageBody, $header);  
                
				//redirect(base_url() . '/Welcome/Client'); 
				echo "<script type='text/javascript'>alert('Successfully registered!');</script>";
				echo "<script>location.href = 'Service';</script>"; 		
			}			
		}else{
			$this->Service();
		}
	}

	public function contactus_insert_data()
	{
		$this->load->library('form_validation');  
		$this->form_validation->set_rules("firstname", "First Name", 'trim|required');  
		$this->form_validation->set_rules("lastname", "Last Name", 'trim|required');  
		$this->form_validation->set_rules("email", "Email", 'trim|required|valid_email');  

		if($this->form_validation->run() == TRUE)
		{
		    
		    $firstname = $this->input->post("firstname");
		    $lastname = $this->input->post("lastname");
		    $phone = $this->input->post("phone");
		    $email = $this->input->post("email");
		    $comments = $this->input->post("comments");		    
		    
			$this->load->model("RootModelFile");
			
			$dataclient = array("firstname"=>$firstname,
					  "lastname"=>$lastname,
					  "phone"=>$phone,
					  "email"=>$email,					  
					  "comments"=>$comments				  
	                 );	  

			$this->RootModelFile->contactus_model_insert_data($dataclient);			
            
			//redirect(base_url() . '/Welcome/Client'); 
			echo "<script type='text/javascript'>alert('Thank you for the feedback!');</script>";
			echo "<script>location.href = 'ContactUs';</script>"; 								
		}
		else{
// 			echo "<script type='text/javascript'>alert('Check Validation errors');</script>";
// 			echo "<script>location.href = 'ContactUs';</script>";
            $this->ContactUs();
		}
	}

	function login_validation()  
	{  
		$this->load->library('form_validation');  
		$this->form_validation->set_rules('email', 'Email', 'required');  
		$this->form_validation->set_rules('password', 'Password', 'required');  

		if($this->form_validation->run() == TRUE)  
		{                 
			$email = $this->input->post('email');  
			$password = $this->input->post('password');  

			$this->load->model('RootModelFile');

			$check_login_get_roleId = $this->RootModelFile->check_login($email, $password);

			if($check_login_get_roleId != 0)  
			{  				
				echo "<script type='text/javascript'>alert('Welcome Back!');</script>";
				$session_data = array('email'=>$email);  
				$this->session->set_userdata($session_data);  

				if($check_login_get_roleId == 1){
					echo "<script>location.href = 'MyClient';</script>"; 
				}else{
					echo "<script>location.href = 'MyBusiness';</script>"; 
				}				
			}  
			else  
			{  
				$this->session->set_flashdata('error', 'Invalid Username and Password');  
				echo "<script type='text/javascript'>alert('Invalid Username/Password!');</script>";
				echo "<script>location.href = 'Login';</script>";
			}  
		}  
		else  
		{              
			$this->Login();    			
		}  
	}
}
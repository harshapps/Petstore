<?php  
class RootModelFile extends CI_Model  
{  
    function client_model_insert_data($data)  
    {  
        $this->db->insert("clients", $data);  
    } 

    function service_model_insert_data($data)  
    {  
        $this->db->insert("business", $data);  
    } 
    
    function contactus_model_insert_data($data)  
    {  
        $this->db->insert("contacts", $data);  
    }

    function user_model_insert_data($data)  
    {  
        $this->db->insert("users", $data);  
    }

    function check_login($email, $password)  
    {  
        $this->db->where('email', $email);  
        $this->db->where('password', $password);  

        //SELECT * FROM users WHERE email = '$email' AND password = '$password'  
        $query = $this->db->get('users');  

        if($query->num_rows() > 0)  
        {  
            $row = $query->row();
            return $row->roleId;            
        }  
        else  
        {  
            return 0;
        }  
    }

    function check_if_email_exists($email)
    {
        $this->db->where('email', $email);          

        //SELECT * FROM users WHERE email = '$email
        $query = $this->db->get('users');  

        if($query->num_rows() > 0)  
        {  
            return true;  
        }  
        else  
        {  
            return false;       
        }  
    }  
}  
?>
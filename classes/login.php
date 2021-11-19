<?php

class login
{
    private $error = "";
    
    public function evaluate($data)
    {

        $email = $data['email'];
        $password = $data['password'];

        $query = "select * from users where email = '$email' limit 1";
        
       
        $DB= new database();
        $result = $DB->read($query);

        if($result)
        {
    
            $row = $result[0];
            if ($row['password'] == $password)
            {

                $_SESSION['blog_userid'] = $row['userid'];
            
            }
            else
            {
                $this->error =$this->error."Wrong password <br>";
            }
        }
        else
        {
            $this->error =$this->error."No Such Email <br>";
        }
    
        return $this->error;
        
    }

    public function check_login($id)
    { 
        if ( is_numeric($id))
        {
            $query = "select * from users where userid = '$id' limit 1";
            
        
            $DB= new database();
            $result = $DB->read($query);

            if($result)
            {
                $user_data =$result[0];
                return $user_data;
            }
            else
            {
                header ("Location:login.php");
                die; 
            }        
        }
        else
        {
            header ("Location:login.php");
                die;
        }
    }

}

?>
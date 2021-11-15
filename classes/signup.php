<?php

class signup
{
    private $error = "";
    public function evaluate($data)
    {
        foreach ($data as $key => $value )
        {
            if (empty($value))
            {
                $this->error =$this->error. $key." is empty!<br>";

            }


            // to check if lname is not numeric
            if ($key == 'lname')
            {
                if (is_numeric($value) )
                {

                $this->error =$this->error." last name cant be number !<br>";
                }

                if (strstr($value, " ") )
                {

                $this->error =$this->error." last name cant have space!<br>";
                }

            }

            // to check if fname is not numeric
            if ($key == 'fname')
            {
                if (is_numeric($value))
                {

                $this->error =$this->error." first name cant be number !<br>";
                }

                if (strstr($value, " ") )
                {

                $this->error =$this->error." first name cant have space!<br>";
                }
            }
        }
        if ($this->error == "")
        {
            //NO ERROR
            $this->create_user($data);
        }
        else
        {
            return $this->error;
        }
    }

    public function create_user($data)
    {
        
        $fname =ucfirst( $data['fname']);
        $lname =ucfirst( $data['lname']);
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];

        $url =strtolower( $fname). ".".strtolower($lname);
        $userid = $this->create_userid();

        $query = "insert into users
        (userid,fname,lname,gender,email,password,url) 
        values 
        ('$userid','$fname','$lname','$gender','$email','$password','$url')";
        
       
         $DB= new database();
        $DB->save($query);

    }
   

    private function create_userid()
    {
       $length = rand (4,19);
       $number = "";
       for ($i = 0; $i < $length; $i++ )
       {
           $new_rand = rand(0,9);
           $number = $number . $new_rand;
       }

       return $number;
    }
}

?>
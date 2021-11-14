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
        
        $fname = $data['fname'];
        $lname = $data['lname'];
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];

        $url =strtolower( $fname). ".".strtolower($lname);
        $userid = this->create_userid();

        $query = "insert into users
        (userid,fname,lname,gender,email,password,url) 
        values 
        ('$userid','$fname','$lname','$gender','$email','$password','$url')";
        
        return $query;
        // $DB= new database();
        // $DB->save($query);

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
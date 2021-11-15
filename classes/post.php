<?php

class post
{
    private $error = "";
    public function create_post( $userid , $data )
    {
        if (!empty($data['post']))
        {
            $post = addslashes($data['post']);
            $postid = $this->create_postid();
        
            $query = "insert into posts (post,postid,userid) values ('$post','$postid','$userid')";
            $DB = new database();
            $DB->save($query);
            
        }
        else
        {
            $this->error = "POST CAN'T BE EMPTY";

        }
        return $this->error;
    }
    private function create_postid()
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
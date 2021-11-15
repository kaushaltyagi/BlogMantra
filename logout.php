<?php

session_start();
    if (isset($_SESSION['blog_userid']))
    {
        $_SESSION['blog_userid'] = NULL;
        unset ($_SESSION['blog_userid']);

    }
header ("Location:login.php");
die;
?>
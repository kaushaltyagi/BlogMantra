<?php
session_start();

include ("classes/connect.php");
include ("classes/login.php");
include ("classes/user.php");
include ("classes/post.php");



$login = new login();
$user_data = $login->check_login($_SESSION['blog_userid']);


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    print_r($_POST);
    print_r($_FILES);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Profile Image | Blog-Mantra</title>
    <link rel="stylesheet" href="./style/timeline.css">
</head>
    
<body style="font-family: Tahoma, Geneva, Verdana, sans-serif; background-color: #222831;">
    
    <!-- top bar -->
   
    <?php include("common/header.php");?>

    <!-- cover page -->

    <div id="cover_area" >

       


         <!-- content page  -->
        <div style="display: flex;">

          
            <!-- posts -->
               
            <div style="min-height: 400px; flex: 2.5;padding: 20px; padding-right: 0px;">
                <div style="background-color: white; border: solid 1px #aaa; padding: 10px;">
                   
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="file">

                        <input id="post_button" value="Post" type="submit" >
                        <br>
                    </form>
                </div>       
            </div>
        </div>
    </div>

</body>
</html>

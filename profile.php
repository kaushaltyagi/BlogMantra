<?php
session_start();

include ("classes/connect.php");
include ("classes/login.php");
include ("classes/user.php");
include ("classes/post.php");

if (isset($_SESSION['blog_userid']) && is_numeric($_SESSION['blog_userid']))
{
    $id = $_SESSION['blog_userid'];
    $login = new login();
    $result = $login->check_login($id);

    if ($result)
    {
        $user = new User();
        $user_data = $user -> get_data($id);

        if(!$user_data)
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
else
{
    header ("Location:login.php");
        die;
}



            // below this we have code for possting
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $post = new post();
        $id = $_SESSION['blog_userid'];

        $result = $post->create_post( $id , $_POST );

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile | Blog-Mantra</title>
</head>
    <link rel="stylesheet" href="./style/profile.css">
<body style="font-family: Tahoma, Geneva, Verdana, sans-serif; background-color: #d0d8e4;">
    
    <!-- top bar -->
   
    <div id="blue_bar">
        <div style="width: 800px;margin:auto; font-size:30px;">
            Blog-Mantra &nbsp; &nbsp; 
            <input type="text" id="search_box" placeholder="Search for Writers">
            
            <img src="./assets/kaushik.jpg" style="width: 50px;float: right; border-radius: 50px;">
            
            <a href ="logout.php">
                <span style="color:white; font-size:12px; float:right; margin:18px;">  Logout</span>
            </a>
        </div>
    </div>

    <!-- cover page -->

    <div id="cover_area" >

        <div style="background-color: white; text-align: center;color: #405d9b;">
            <img src="./assets/mountain.jpg" style="width: 100%; max-height: 290px;">
            <img src="./assets/kaushik.jpg" id="profile_pic">
            <br>
            <div style="font-size: 20px;"> <?php echo $user_data['fname']." ". $user_data['lname'];  ?></div>
           
            <br>
            <div id="menu_button">Timeline</div>
            <div id="menu_button">About</div>
            <div id="menu_button"> Friends</div>
            <div id="menu_button"> Photos</div>
            <div id="menu_button"> Settings</div>
                   
        </div>


         <!-- content page  -->
        <div style="display: flex;">

            <!-- freinds -->
            <div style="min-height: 400px; flex: 1;">
                
                <div id="friends_bar">
                    Friends<br>
                    
                    <div id="friends">
                        <img id="friends_img" src="./assets/user1.jpg">
                        <br>
                        Rishabh Pathak
                    </div>
                    
                    <div id="friends">
                        <img id="friends_img" src="./assets/user2.jpg">
                        <br>
                        Kaushal Tyagi
                    </div>

                    <div id="friends">
                        <img id="friends_img" src="./assets/user3.jpg">
                        <br>
                        Harsh
                    </div>

                    <div id="friends">
                        <img id="friends_img" src="./assets/user4.jpg">
                        <br>
                        Nitin
                    </div>
                </div>
            

                
            </div>
            
            <!-- posts -->
                <!-- write something here -->
            <div style="min-height: 400px; flex:2.5;padding: 20px; padding-right: 0px;">
                    <div style="background-color: white; border: solid 1px #aaa; padding: 10px;">
                        <form  method="post">
                            <textarea name = "post" placeholder = "Do You Wanna Share Something?"></textarea>
                            <input id="post_button" value="Post" type="submit" >
                            <br>
                        </form>
                    </div>
                    <a href target=""></a>
                    <!-- main post bar -->
                    <div id="post_bar" style="">
                
                       <!-- post--1 -->
                        <div id="post">
                            <div>
                               <img src="./assets/user2.jpg" style="width: 70px; margin-right: 8px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b;">Kaushal Tyagi</div>
                                An operating system, whether it's MacOS on your MacBook or Google's Wear OS on your smartwatch, gets better the more transparent it is to the user. And that user is you, sitting in front of a laptop keyboard or tapping on a phone screen. So sorry, no Spinal Tap "goes to 11" puns here. That's mostly because Windows 11 feels more like Windows 10.5 than a generational leap -- not that there's really anything wrong with that. 
                                <br><br>
                                <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;">September 11 2021</span>
                            </div>
                        </div>
                    
                    
                         <!-- post--2 -->
                         <div id="post">
                            <div>
                               <img src="./assets/user3.jpg" style="width: 70px; margin-right: 8px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b;">Harsh Srivastava</div>
                                Automobili Lamborghini S.p.A. is an Italian brand and manufacturer of luxury sports cars and SUVs based in Sant'Agata Bolognese. The company is owned by the Volkswagen Group through its subsidiary Audi.
                                <br><br>
                                <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;">April 20 2021</span>
                            </div>
                        </div>
                    
                    
                    </div>
            </div>
        </div>
   
   
    </div>

</body>
</html>

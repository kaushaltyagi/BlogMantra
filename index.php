<?php
session_start();

include ("classes/connect.php");
include ("classes/login.php");
include ("classes/user.php");
include ("classes/post.php");



$login = new login();
$user_data = $login->check_login($_SESSION['blog_userid']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Timeline | Blog-Mantra</title>
    <link rel="stylesheet" href="./style/timeline.css">
</head>
    
<body style="font-family: Tahoma, Geneva, Verdana, sans-serif; background-color: #222831;">
    
    <!-- top bar -->
   
    <?php include("common/header.php");?>

    <!-- cover page -->

    <div id="cover_area" >

       


         <!-- content page  -->
        <div style="display: flex;">

            <!-- freinds -->
            <div style="min-height: 400px; flex: 1;">
                
                <div id="friends_bar">
                  <img src="./assets/kaushik.jpg" id="profile_pic">
                   <a href="profile.php" style="text-decoration:none; color:white;"> <?php echo $user_data['fname']."<br> ".$user_data['lname']; ?> </a>
                </div>
            

                
            </div>
            
            <!-- posts -->
                <!-- write something here -->
            <div style="min-height: 400px; flex: 2.5;padding: 20px; padding-right: 0px;">
                    <div style="background-color: white; border: solid 1px #aaa; padding: 10px;">
                        <textarea placeholder = "Do You Wanna Share Something?"></textarea>
                        <input id="post_button" value="Post" type="submit" >
                        <br>
                    </div>
                
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

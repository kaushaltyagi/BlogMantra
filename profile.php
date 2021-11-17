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

        if($result == "")
        {
            header("Location:profile.php");
            die;
        }
        else
        {
            echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey'>";
            echo "FOLLOWING ERRORS OCURED <br>";
            echo $result;
            echo "</div>";
        }
    }

    // collect post

    $post = new post();
    $id = $_SESSION['blog_userid'];
    $posts = $post->get_post( $id  );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile | Blog-Mantra</title>
</head>
    <link rel="stylesheet" href="./style/profile.css">
<body style="font-family: Tahoma, Geneva, Verdana, sans-serif; background-color: #222831;">
    
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

        <div style="background-color: #395783; text-align: center;color: white;">
            <img src="./assets/treecover.jpg" style="width: 100%; max-height: 290px;">
            <img src="./assets/kaushik.jpg" id="profile_pic">
            <br>
            <div style="font-size: 20px;"> <?php echo $user_data['fname']." ". $user_data['lname'];  ?></div>
           
            <br>
            <div id="menu_button"><a href="timeline.php" style="text-decoration:none; color:white;">Timeline</a> </div>
            <div id="menu_button">About</div>
            <div id="menu_button"> Friends</div>
            <div id="menu_button"> Photos</div>
            <div id="menu_button"> Settings</div>   
       
        </div>


         <!-- content page  -->
        <div style="display: flex;">

            <!-- freinds -->
            <div style="min-height: 400px; flex: 1;">
                
                <div id="friends_bar" style="background-color: white";>
                    Friends<br>
                    
                    <div id="friends" >
                        <img id="friends_img" src="./assets/user_male.jpg">
                        <br>
                        Rishabh Pathak
                    </div>
                    
                    <div id="friends">
                        <img id="friends_img" src="./assets/user_female.jpg">
                        <br>
                        Kaushal Tyagi
                    </div>

                    <div id="friends">
                        <img id="friends_img" src="./assets/user_male.jpg">
                        <br>
                        Harsh
                    </div>

                    <div id="friends">
                        <img id="friends_img" src="./assets/user_female.jpg">
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
                    <div id="post_bar" style="background-color: white;">
                
                        <?php
                            
                           

                            if($posts)
                            {
                                foreach ($posts as $row)
                                {
                                    $user = new user();
                                    $row_user = $user->get_user($row['userid']);
                                    include("post.php");
                                }
                            }
                        
                        
                        ?>
                    
                    </div>
            
        </div>
   
   
    </div>

</body>
</html>

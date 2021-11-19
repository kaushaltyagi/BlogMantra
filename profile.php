<?php
session_start();

include ("classes/connect.php");
include ("classes/login.php");
include ("classes/user.php");
include ("classes/post.php");



$login = new login();
$user_data = $login->check_login($_SESSION['blog_userid']);

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

    // collect friends
    
    $user = new user();
    $id = $_SESSION['blog_userid'];
    $friends = $user->get_friends( $id  );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile | Blog-Mantra</title>
</head>
    <link rel="stylesheet" href="./style/profile.css">
<body style="font-family: Tahoma, Geneva, Verdana, sans-serif; background-color: #222831;">
    
    <!-- top bar -->
   
  <?php include("common/header.php");?>

    <!-- cover page -->

    <div id="cover_area" >

        <div style="background-color: #395783; text-align: center;color: white;">
            <img src="./assets/treecover.jpg" style="width: 100%; max-height: 290px;">
            <span style="font-size:12px">  

            <?php
            $image = "";
            if(file_exists($user_data['profile_image']))
            {
                $image = $user_data['profile_image'];
            }
            else
            {
                if($user_data['gender']=="male") 
                {
                    $image="./assets/user_male.jpg";
                } 
                else if($user_data['gender']=="female") 
                {
                    $image="./assets/user_female.jpg";
                }  
            }
            ?>



                <img src="<?php echo $image; ?>" id="profile_pic">
                <br>    
                <a href="change_pimage.php" style= "text-decoration:none; color:black;"> Change Image</a>
            </span>
            <br>
            <div style="font-size: 30px;"> <?php echo $user_data['fname']." ". $user_data['lname'];  ?></div>
           
            <br>
           <a href="index.php" style="text-decoration:none; color:white;"> <div id="menu_button">Timeline </div></a>
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

                    <?php
                        if($friends)
                            {
                                foreach ($friends as $friends_row)
                                {
                                    
                                    include("user.php");
                                }
                            }
                        
                        
                        ?>
                </div>
            

                
            </div>
            
            <!-- posts -->
                <!-- write something here -->
            <div style="min-height: 400px; flex:2.5;padding: 20px; padding-right: 0px;">
                    <div style=" ;background-color: white; border: solid 1px #aaa; padding: 10px;">
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

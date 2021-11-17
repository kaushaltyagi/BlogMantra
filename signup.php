<?php

    include ("classes/connect.php");
    include ("classes/signup.php");
    
    $fname = "" ;
    $lname = "" ;
    $gender = "" ;
    $email = "" ;

    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $signup = new signup();
        $result = $signup->evaluate($_POST);
        if ($result != "")
        {
            echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey'>";
            echo "FOLLOWING ERRORS OCURED <br>";
            echo $result;
            echo "</div>";
        }
        else
        {
            header("Location: login.php");
            die;
        }

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
    }
   
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog-Mantra | Sign-up</title>
        <link rel="stylesheet" href="./style/singnup.css">

</head>



<body style="background-color: #222831">
    <div id="top">
        <div  style="font-size: 40px;">Blog-Mantra</div>
        <a href="login.php"><div  id="signup" style="color:white";>Log-In</div></a>
    </div>


    <!-- Sign-up form -->
    <div class="center">
        <div id="singupname">
            <h3>Sign Up With Blog-Mantra</h3>
        </div>
        <form action="signup.php" method="post">
            <div class="fullname">
                <input name="fname" class="textbox1" type="text" value="<?php echo $fname ?>" placeholder=" First Name"> 
                <input name="lname" class="textbox1" type="text" value="<?php echo $lname ?>" placeholder=" Last Name"> <br>
           
            </div>
            <div class="gender"> 
                 Gender : <select class="textbox" value="<?php echo $gender ?>" name="gender">
                 <option value="nil"> </option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                
                </select> <br>
                
                </div>
            
                <input name="email"  class="textbox3" type="email" value="<?php echo $email ?>"  placeholder=" Email address or Phone number">   <br>
            
           
                <input name="password" class="textbox3" type="password" value="" placeholder=" Password"> <br>
            
            
                <input name="password2" class="textbox3" type="password" value="" placeholder=" Re-Enter Password"> <br>
            
            <input type="submit" value="Sign Up" id="submit">

            <br><br>
         
        </form>
    </div>
</body>
</html>

<?php

    
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
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
        <div  id="signup">Log-In</div>
    </div>


    <!-- Sign-up form -->
    <div class="center">
        <div id="singupname">
            <h3>Sign Up With Blog-Mantra</h3>
        </div>
        <form action="signup.php" method="post">
            <div class="fullname">
                <input name="fname" class="textbox1" type="text" value="" placeholder=" First Name"> 
                <input name="lname" class="textbox1" type="text" value="" placeholder=" Last Name"> <br>
           
            </div>
            <div class="gender"> 
                 Gender : <select class="textbox" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select> <br>
                
            
            
                <input name="email" class="textbox3" type="email" value="" placeholder=" Email address or Phone number">   <br>
            
           
                <input name="password" class="textbox3" type="password" value="" placeholder=" Password"> <br>
            
            
                <input name="password2" class="textbox3" type="password" value="" placeholder=" Re-Enter Password"> <br>
            
            <input type="submit" value="Sign Up" id="submit">

            <br><br>
         
        </form>
    </div>
</body>
</html>

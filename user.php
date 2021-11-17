<div id="friends" >
<?php 
        $image = "";
        if($friends_row['gender']=="male") 
        {
            $image="./assets/user_male.jpg";
        } 
        else if($friends_row['gender']=="female") 
        {
            $image="./assets/user_female.jpg";
        } 
?>
    <img id="friends_img" src="<?php echo $image; ?>">
    <br>
    <?php  echo $friends_row['fname']." ".$friends_row['lname'];  ?>
    </div>

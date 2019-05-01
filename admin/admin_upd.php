<?php
    //connect database & check session
    require("check_session.php");
 
    //capture user input
    $email      =   mysqli_real_escape_string($dbconnect,$_POST['email']);
    $password   =   mysqli_real_escape_string($dbconnect,$_POST['password']);

    //use user input as reference for sql 
    $sql        =   "UPDATE admin SET admin_email='$email', admin_pwd='$password'";
    $result     =   mysqli_query($dbconnect,$sql);
    
    //check status
    if($result){
        echo   "Your update is successful";
        header("refresh:2,url=admin_profile.php");
    }
    else {
        //send error message
        $msg    = "* Unable to update your profile.";
        header("location:admin_profile.php?msg=$msg");  
    }

    //close database conection
    mysqli_close($dbconnect);
?>
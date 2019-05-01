<?php
    //connect database & check session
    require("check_session.php");
            
    //capture user id
    $id     =   $_GET['id'];

    //capture user input
    $name       =   mysqli_real_escape_string($dbconnect,$_POST['name']);
    $email      =   mysqli_real_escape_string($dbconnect,$_POST['email']);
    $phone      =   mysqli_real_escape_string($dbconnect,$_POST['phone']);
    $password   =   mysqli_real_escape_string($dbconnect,$_POST['password']);

    //use user input as reference for sql equivalent to capture user id
    $sql        =   "UPDATE someone SET name=UPPER('$name'),email='$email',phone='$phone',password='$password' WHERE id='$id'";
    $result     =   mysqli_query($dbconnect,$sql);
    
    //check status
    if($result){
        echo   "Your update is successful";
        //using same capture user id to send data back to profile.php
        $id     =   $_GET['id'];
        header("refresh:2,url=profile.php?id=$id");
    }
    
    else {
        //send error message
        $msg    = "* Unable to update this profile.";
        //using same capture user id to send data back to profile.php
        $id     =  $_GET['id'];
        header("location:profile.php?msg=$msg&&id=$id");       
    }

    //close database conection
    mysqli_close($dbconnect);
?>
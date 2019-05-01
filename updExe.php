<?php
    //connect database & check session
    require("check_session.php");
    
    //using session to inialize new id
    $id  =   $_SESSION['user'];

    //capture user input
    $name       =   mysqli_real_escape_string($dbconnect,$_POST['name']);
    $email      =   mysqli_real_escape_string($dbconnect,$_POST['email']);
    $phone      =   mysqli_real_escape_string($dbconnect,$_POST['phone']);
    $password   =   mysqli_real_escape_string($dbconnect,$_POST['password']);

    //use id as reference for sql
    $sql        =   "UPDATE someone SET name=UPPER('$name'),email='$email',phone='$phone',password='$password' WHERE id='$id'";
    $result     =   mysqli_query($dbconnect,$sql);

    //check status
    if($result){
        echo   "Your update is successful";
        header("refresh:2,url=profile.php");
    }
    else {
        //send error message
        $msg    = "* Unable to update your profile";
        header("location:upd.php?msg=$msg");     
    }

    //close database conection
    mysqli_close($dbconnect);
?>
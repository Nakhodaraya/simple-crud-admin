<?php
    //connect database & check session
    require("check_session.php");
           
    //capture user id
    $id  =   $_GET['id'];

    //use id as reference for sql
    $sql        =   "DELETE FROM someone WHERE id='$id'";
    $result     =   mysqli_query($dbconnect,$sql);

    //check status
    if($result){
        echo   "You have delete this profile.";
        header("refresh:2,url=list.php");
    } 
    else {
        //send error message
        $msg    = "* Unable to delete this profile.";
        //using same capture user id to send data back to profile.php
        $id     =  $_GET['id'];
        header("location:profile.php?msg=$msg&&id=$id");
    }

    //close database conection
    mysqli_close($dbconnect);
?>
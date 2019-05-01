<?php
    //connect database & check session
    require("check_session.php");

    //using session to inialize new id
    $id  =   $_SESSION['user'];

    //use id as reference for sql
    $sql        =   "DELETE FROM someone WHERE id='$id'";
    $result     =   mysqli_query($dbconnect,$sql);
    
    //check status
    if($result){
        echo   "You have delete your profile.";
        header("refresh:2,url=index.php");
    }   
    else {
        //send error message
        $msg    = "* Unable to delete";
        header("location:profile.php?msg=$msg");      
    }
    //close database conection
    mysqli_close($dbconnect);
?>
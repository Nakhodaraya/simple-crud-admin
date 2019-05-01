<?php

    //connect database
    require("database/database.php");

    //capture user input
    $email      =   mysqli_real_escape_string($dbconnect,$_POST['email']);
    $password   =   mysqli_real_escape_string($dbconnect,$_POST['password']);

    //use capture user input as rule for sql
    $sql        =   "SELECT id FROM someone WHERE email = '$email' AND password = '$password'";
    $result     =   mysqli_query($dbconnect,$sql);
    $count      =   mysqli_num_rows($result);
 
    if($count   == 1){
        $row        =   mysqli_fetch_array($result);
        
        //start the session
        session_start();
    
        //we will use id as an access reference for session;
        $_SESSION['user']   =   $row['id'];
        header("location:profile.php");
    }

    //if no data inside table
    else{
        //send error message
        $msg    = "* Invalid email or password";
        header("location:index.php?msg=$msg");  
    }

    //close database conection
    mysqli_close($dbconnect);
?>
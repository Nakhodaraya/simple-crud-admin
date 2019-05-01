<?php

    //connect database
    require("../database/database.php");

    //capture user input
    $email      =   mysqli_real_escape_string($dbconnect,$_POST['email']);
    $password   =   mysqli_real_escape_string($dbconnect,$_POST['password']);

    //use capture user input as rule for sql
    $sql        =   "SELECT * FROM admin WHERE admin_email = '$email' AND admin_pwd = '$password'";
    $result     =   mysqli_query($dbconnect,$sql);
    $count      =   mysqli_num_rows($result);

    //the result should be one row
    if($count   == 1){
        $row        =   mysqli_fetch_array($result);
        
        //start the session
        session_start();
    
        //we will use this as an access reference;
        $_SESSION['admin']   =   $row['admin_email'];
        header("location:list.php");
    }
    //if no data inside table
    else {
        //send error message
        $msg    = "* Invalid email or password";
        header("location:index.php?msg=$msg");  
    }

    //close database conection
    mysqli_close($dbconnect);
?>
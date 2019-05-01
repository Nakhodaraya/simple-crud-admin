<?php
    //connect database
    require("database/database.php");
    
    //capture user input
    $name       =   mysqli_real_escape_string($dbconnect,$_POST['name']);
    $email      =   mysqli_real_escape_string($dbconnect,$_POST['email']);
    $phone      =   mysqli_real_escape_string($dbconnect,$_POST['phone']);
    $password   =   mysqli_real_escape_string($dbconnect,$_POST['password']);

    //use capture user input as rule for sql
    $sql        =   "INSERT INTO someone(id,name,email,phone,password) VALUES('',UPPER('$name'),'$email','$phone','$password')";
    $result     =   mysqli_query($dbconnect,$sql);
    

    //check status
    if($result){
        //use sql to get profile inside database 
        $sql        =   "SELECT * FROM someone WHERE email = '$email'";
        $result     =   mysqli_query($dbconnect,$sql);
        $row        =   mysqli_fetch_array($result);
        
        //start the session
        session_start();
    
        //we will use this as an access reference;
        $_SESSION['user']   =   $row['id'];
        echo   "Your registration is successful";
        header("refresh:2,url=profile.php");
    }
    else {
        //send error message
        $msg    = "* Unable to register. Invalid input or your input already use by other user";
        header("location:register.php?msg=$msg");     
    }

    //close database conection
    mysqli_close($dbconnect);
?>
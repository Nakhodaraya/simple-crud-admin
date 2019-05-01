<?php
    //connect database
    require("../database/database.php"); 

    //capture session
    session_start();  
           
    //check session
    if(!$_SESSION['admin']){          
        header("location:index.php");
    }
?>
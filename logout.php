<?php
    //connect database
    require("database/database.php");

    //start the session
    session_start();
    
    //destroy session
    session_destroy();
    header("location:index.php");

    //close database conection
    mysqli_close($dbconnect);
?>
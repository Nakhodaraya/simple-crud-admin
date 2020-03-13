<!DOCTYPE html>
<html>
    <head>
        <title>Simple CRUD Admin</title>
        <!-- adjust scaling for phone -->
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- css link -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    <head>
    <body>
        <?php
            //connect database & check session
            require("check_session.php");
                
            //use sql to get profile inside database 
            $sql        =   "SELECT * FROM admin";
            $result     =   mysqli_query($dbconnect,$sql);
            $row        =   mysqli_fetch_array($result);

        ?>

        <div class="wrapper">
            <h1>Your Profile:</h1>
            <p><span>Edit</span> your profile:</p>
            <form name="profile" action="admin_upd.php" method="POST">
                <label>Email:
                    <input type="email"     name="email"    value="<?php echo $row['admin_email']?>" ><br>
                </label>
                <label>Password:
                    <input type="password"  name="password" value="<?php echo $row['admin_pwd']?>" ><br>
                </label>
                <input type="submit"    name="submit"   value="Update">
                <hr>
                <input type="submit"    name="submit"   formaction="list.php"    value="Back" style="background-color:#696969">
                <p class="msg">
                    <?php 
                        //if update not succeed
                        //error message
                        if(isset($_GET['msg'])){
                            $msg    =   $_GET['msg'];
                            echo    $msg;   
                        }
                    ?>
                </p>
            </form>
        </div>

        <?php
            //close database
            mysqli_close($dbconnect);
        ?>
    </body>
</html>

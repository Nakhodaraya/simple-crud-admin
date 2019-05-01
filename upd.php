<!DOCTYPE html>
<html>
    <head>
        <title>Simple CRUD Admin</title>
        <!-- adjust scaling for phone -->
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- ccs link -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    <head>
    <body>
        <?php
            //connect database & check session
            require("check_session.php");

            //using session to inialize new id
            $id  =   $_SESSION['user'];

            //use id as reference for sql 
            $sql        =   "SELECT * FROM someone WHERE id = '$id'";
            $result     =   mysqli_query($dbconnect,$sql);
            $row        =   mysqli_fetch_array($result);
        ?>

        <div class="wrapper">
            <h1><span>UPDATE</span> FORM</h1>
            <p>Your Profile:</p>
            <form action="updExe.php" method="POST">
                <label>Name:
                    <input type="name"      name="name"     value="<?php echo $row['name']?>" required><br>
                </label>
                <label>Email:
                    <input type="email"     name="email"    value="<?php echo $row['email']?>" required><br>
                </label>
                <label>Phone:
                    <input type="tel"       name="phone"    value="<?php echo "0".$row['phone']?>" required><br>
                </label>
                <label>Password:
                    <input type="password"  name="password" value="<?php echo $row['password']?>" required><br>
                </label>
                <input type="submit"    name="submit"   value="Confirm">
                <input type="submit"    name="submit"   formaction="profile.php"   value="Cancel" style="background-color:#696969">
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
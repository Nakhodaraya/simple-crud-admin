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

            //use id as reference to get profile inside database 
            $sql        =   "SELECT * FROM someone WHERE id = '$id'";
            $result     =   mysqli_query($dbconnect,$sql);
            $row        =   mysqli_fetch_array($result);
        ?>

        <div class="wrapper">
            <h1>WELCOME<br>
            <span><?php echo$row['name']?></span></h1>
            <p>Your Profile:</p>
            <form action="logout.php" method="POST">
                <label>Name:
                    <input type="name"      name="name"     value="<?php echo $row['name']?>" readonly><br>
                </label>
                <label>Email:
                    <input type="email"     name="email"    value="<?php echo $row['email']?>" readonly><br>
                </label>
                <label>Phone:
                    <input type="tel"     name="phone"    value="<?php echo "0".$row['phone']?>" readonly><br>
                </label>
                <label>Password:
                    <input type="password"      name="password" value="<?php echo $row['password']?>" readonly><br>
                </label>
                <input type="submit"    name="submit"   formaction="upd.php"    value="Update"  style="background-color:orange">
                <input type="submit"    name="submit"   formaction="del.php"    value="Delete"  style="background-color:tomato">
                <hr>
                <input type="submit"    name="submit"   value="Logout">
            </form>
        </div>

        <?php
            //close database
            mysqli_close($dbconnect);
        ?>
    </body>
</html>
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

             //capture user id
            $id         =   $_GET['id'];

            //use sql to get profile inside database 
            $sql        =   "SELECT * FROM someone WHERE id = '$id'";
            $result     =   mysqli_query($dbconnect,$sql);
            $row        =   mysqli_fetch_array($result);
        ?>

            <div class="wrapper">
                <h1><span>EDIT</span> PROFILE:</h1>
                <form action="logout.php" method="POST">
                    <label>Name:
                        <input type="name"      name="name"     value="<?php echo $row['name']?>"><br>
                    </label>
                    <label>Email:
                        <input type="email"     name="email"    value="<?php echo $row['email']?>"><br>
                    </label>
                    <label>Phone:
                        <input type="tel"       name="phone"    value="<?php echo "0".$row['phone']?>"><br>
                    </label>
                    <label>Password:
                        <input type="password"      name="password" value="<?php echo $row['password']?>"><br>
                    </label>
                    <input type="submit"    name="submit"   formaction="upd.php?id=<?php echo $row['id'];?>"    value="Update"  style="background-color:orange">
                    <input type="submit"    name="submit"   formaction="del.php?id=<?php echo $row['id'];?>"    value="Delete"  style="background-color:tomato">
                    <input type="submit"    name="submit"   formaction="list.php"   value="Cancel"  style="background-color:#696969">
                    <p class="msg">
                        <?php 
                            //if changes not succeed
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

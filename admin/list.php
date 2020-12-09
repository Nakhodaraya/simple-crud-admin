<!DOCTYPE html>
<html>
    <head>
        <title>Simple CRUD Admin</title>
        <!-- adjust scaling for phone -->
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- css link -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>
        <?php 
            //connect database & check session
            require("check_session.php");
        ?>

        <div class="list">
                <h1>USER LIST :</h1>
                <a href="admin_profile.php"><button style="background-color:#696969">Your Profile</button></a>
                <a href="logout.php"><button style="background-color:tomato">Logout</button></a>
                <hr>
        <?php
                //get all data from database
                $sql    =   "SELECT * FROM someone";
                $result =   mysqli_query($dbconnect,$sql);
        ?>
            <table>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ACTION</th>
                </tr>

        <!-- table definition(td) will loop using while statement -->
        <?php
            //all user info will fecth row by row from  table
            while($row  =   mysqli_fetch_array($result)){
        ?>

                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo "0".$row['phone']?></td>
                    <!-- by doing below it will get to profile each row from the table of list -->
                    <td style="padding:2px;"><a href="profile.php?id=<?php echo $row['id']?>"><button style="background-color:dodgerblue;width:100%">Edit</button></td>
                </tr>

        <?php
            }
            //close database
            mysqli_close($dbconnect);
        ?>

            </table>
        </div>
    </body>
</html>
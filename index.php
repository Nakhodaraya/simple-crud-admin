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
        <div class="wrapper">
            <h1>Sign In</h1>
            <p>to continue</p>
            <form action="validation.php" method="POST">
                <input type="email"     name="email"    placeholder="Email"     required><br>
                <input type="password"  name="password" placeholder="Password"  required><br>
                <input type="submit"    name="submit"   value="Next">
                <p>Not register yet? <a href="register.php">Register now</a></p>
                <p>
                    <?php 
                        //if sign in not succeed
                        //error message
                        if(isset($_GET['msg'])){
                            $msg    =   $_GET['msg'];
                            echo    $msg;
                        }
                    ?>
                </p>
        </div>
    </body>
</html>
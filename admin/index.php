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
        <div class="wrapper">
            <h1>ADMIN</h1>
            <p>PANEL</p>
            <form name="signin" action="validation.php" method="POST">
                <input type="email"     name="email"    placeholder="Email"     value="admin@example.com"><br>
                <input type="password"  name="password" placeholder="Password"  value="admin"><br>
                <input type="submit"    name="submit"   value="Login">
                <p class="msg">
                    <?php 
                        //if sign in not succeed
                        //error message
                        if(isset($_GET['msg'])){
                            $msg    =   $_GET['msg'];
                            echo    $msg;   
                        }
                    ?>
                </p>
            </form>
        </div>
    </body>
</html>
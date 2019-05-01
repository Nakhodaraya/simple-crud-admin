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
            <h1>Register</h1>
            <p>to continue</p>
            <form action="registerExe.php" method="POST">
                <label>Name:
                    <input type="name"  name="name"         placeholder="JOHN DOE"          required><br>
                </label>
                <label>Email:
                    <input type="email" name="email"        placeholder="email@example.com" required><br>
                </label>
                <label>Phone:
                    <input type="tel" name="phone"          placeholder="012xxxxxxx"        required><br>
                </label>
                <label>Password:
                    <input type="password"  name="password" placeholder="***********"       required><br>
                </label>
                <input type="submit"    name="submit"   value="Next">
                <p>Already register? <a href="index.php">Sign in now</a></p>
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
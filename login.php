<?php
session_start();
require_once ('Config/connect.php');
if (isset($_POST) && !empty($_POST)){
     $username = $_POST['username'];
     $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $res = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($res);
    if ($count == 1){
        $_SESSION['username'] = $username;
        header("location: loginwelcome.php");
    }else{
        $fmsg = "Nope:User doesn't exists";
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>

        <link rel="stylesheet" href="Contents/style.css">

    </head>
    <body>
        <div class="login">
            <div class="login-screen">
                <div class="app-title">
                    <h1>Login</h1>
                </div>

                <?php if (isset($fmsg) && !empty($fmsg)) { ?><div class="fail-alert" role="alert"><?php echo $fmsg ;?></div><?php } ?>

                <form action="login.php" method="post">
                    <div class="login-form">
                        <div class="control-group">
                            <input type="text" class="login-field" value="" name="username" placeholder="username" id="login-name">
                            <label class="login-field-icon fui-user" for="login-name"></label>
                        </div>

                        <div class="control-group">
                            <input type="password" class="login-field" value="" name="password" placeholder="password" id="login-pass">
                            <label class="login-field-icon fui-lock" for="login-pass"></label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-large btn-block">Login</button>
                        <a class="login-link" href="register.php">Don't Register?</a>
                    </div>
                </form>


            </div>
        </div>
    </body>
</html>

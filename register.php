<?php
require_once ('Config/connect.php');
session_start();

if (isset($_POST) && !empty($_POST)){

    $fname=$_POST['first_name'];
    $lname=$_POST['last_name'];
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $cpass=$_POST['confirm_password'];
    $email=$_POST['email'];

    if ($pass == $cpass){
        $fmsg="";
        $usernamesql = "SELECT * FROM users WHERE username='$username'";
        $usernameres = mysqli_query($connection,$usernamesql);
        $count = mysqli_num_rows($usernameres);
        if ($count == 1){
            $fmsg = "This username already exists in our database! Please try different username!";
        }

        $sql="INSERT INTO users (first_name	, last_name, username, password, email) VALUES ('$fname', '$lname', '$username', '$pass', '$email')";
        //echo $sql;
        $result = mysqli_query($connection,$sql);
        if ($result){
            $_SESSION['fname']=$fname;
            $_SESSION['lname']=$lname;
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            header("location:welcome.php");

            $id=mysqli_insert_id($connection);

        }else{
            //echo "User registering failed!!!";
            $fmsg =  mysqli_error($connection);
        }
    }else{
        $fmsg = "Passwords are not matching!";
    }

}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" href="Contents/style.css">

</head>
<body>
<div class="login">
    <div class="login-screen">
        <div class="app-title">
            <h1>Register</h1>
        </div>

        <?php if (isset($smsg) && !empty($smsg)) { ?><div class="success-alert" role="alert"><?php echo $smsg ;?></div><?php } ?>
        <?php if (isset($fmsg) && !empty($fmsg)) { ?><div class="fail-alert" role="alert"><?php echo $fmsg ;?></div><?php } ?>


        <form action="register.php" method="post">
            <div class="login-form">
                <div class="control-group">
                    <input type="text" class="login-field" name="first_name" value="<?php if (isset($fname)){echo $fname;} ?>" placeholder="first name" id="login-name" required>
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <input type="text" class="login-field" name="last_name" value="<?php if (isset($lname)){echo $lname;} ?>" placeholder="last name" id="login-name" required>
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <input type="text" class="login-field" name="username" value="<?php if (isset($username)){echo $username;} ?>" placeholder="username" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" name="password" placeholder="password" id="login-pass" required>
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" name="confirm_password" placeholder="confirm password" id="login-pass">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <div class="control-group">
                    <input type="email" class="login-field" name="email" value="<?php if (isset($email)){echo $email;} ?>" placeholder="email" id="login-name" required>
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>
                <a class="login-link" href="login.php">Back To Login</a>
            </div>
        </form>

    </div>
</div>
</body>
</html>

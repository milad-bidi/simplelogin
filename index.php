<?php
session_start();
require_once ('Config/connect.php');
if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
    $username=$_SESSION['username'];
    $sql = "select * from users WHERE username='$username'";
    $res = mysqli_query($connection,$sql);
    $fres = mysqli_fetch_assoc($res);

    $fname=$fres['first_name'];
    $lname=$fres['last_name'];
    $email=$fres['email'];
}else{
    header("location:login.php");
}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="login-screen">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>E-mail Address</th>
                    </tr>
                    <tr>
                        <td><?php echo $fname ?></td>
                        <td><?php echo $lname ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $email ?></td>
                    </tr>
                </table>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    </body>
</html>

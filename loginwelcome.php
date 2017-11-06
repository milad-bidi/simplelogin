<?php
session_start();
require_once ('Config/connect.php');
$username = $_SESSION['username'];
$sql = "select * from users WHERE username='$username'";
$res = mysqli_query($connection,$sql);
$fres= mysqli_fetch_assoc($res);
$fname = $fres['first_name'];
$lname = $fres['last_name'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-body">
                       <h1> You Are Logged In Successfuly</h1><br>
                        <p>Hi <?php echo $fname . " " . $lname ?> .
                            Thank you for registration.
                        </p>
                        <a href="index.php">Information Summery</a> <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

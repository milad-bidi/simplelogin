<?php
session_start();
$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
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
                       <h1> Registration Successfuly Done!</h1><br>
                        <p>Hi <?php echo $fname . " " . $lname ?> .
                            Thank you for registration.
                        </p>
                        <a href="index.php">Information Summery</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

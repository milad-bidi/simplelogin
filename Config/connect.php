<?php
$connection = mysqli_connect("localhost","root","");
if (!$connection){
    echo "Failed To Connecting!" . die(mysqli_error($connection));
}
$dbselect = mysqli_select_db($connection,"simple_login");
if (!$dbselect){
    echo "Failed To Find DB!". die(mysqli_error($connection));
}
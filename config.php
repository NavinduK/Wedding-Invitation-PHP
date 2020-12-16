<?php
    $dbhost="";
    $username="";
    $password="";
    $dbname="";

    $con=mysqli_init();
    mysqli_real_connect($con,$dbhost,$username,$password,$dbname);

    if(mysqli_connect_errno()){
        die('Database connection failed'.mysqli_connect_error());
    }
?>
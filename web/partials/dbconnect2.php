<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blog";
    $conn=mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("unsuccessful connection with database" . mysqli_connect_error());
    }else{"database connected successfully";}
?>
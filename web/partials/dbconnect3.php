<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "comment";
    $connn=mysqli_connect($servername, $username, $password, $database);
    if(!$connn){
        die("unsuccessful connection with database" . mysqli_connect_error());
    }else{"database connected successfully";}
?>
<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    {
        header("location: login.php");
        
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Post</title>
</head>
<body>
<form action="commentpost.php" method="post">
      <div class="comment">
          <h6>Post your comments here: </h6>
          <textarea name="comment" id="comment" cols="80" rows="2"></textarea>
          <br>
          <div class="submit">
          <button type="submit">Post</button>
          </div>
          
      </div>
      </form>
      <?php
      $uname=$_SESSION['username'];
      $sno=$_GET['sno'];
     if($_SERVER["REQUEST_METHOD"] == "POST")
        {include 'partials/dbconnect3.php';
            $comment=$_POST['comment'];
          
           
               $sqlii="INSERT INTO `comment` (`c_id`, `username`, `comment`, `datestamp`) VALUES ('$sno', '$uname', '$comment', current_timestamp());";
                    $resultff=mysqli_query($conn, $sqlii);}
            
    ?>
</body>
</html>

   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogpost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<style>
    h5{
        Margin: 5px;
    }
    .abcd{
        padding: 20px;
        margin-left: 300px;
    }
    h2{
        text-align: center;
        font-family: cursive;
        border: 1px solid lightgray;
        padding: 5px;
    }
</style>
</head>
<body>
<h2>All the blogs you write, will appear here!</h2>
<?php
    include 'partials/dbconnect2.php';
    $sql = "SELECT * FROM `blog` ";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)){
      $sub =  $row["subject"];
       $un =  $row["urname"];
      $og =  $row["blog"];
      $datetime =  $row["date"];
        echo'<div class="abcd col-md-10">
        <div class="card" style="width: 50rem;">
        <img src="https://source.unsplash.com/500x300/?'.$sub.',dress" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Author Name: '.$un.'</h5>
        <br>
        <h5 class="card-title">Subject: '.$sub.'</h5>
        <p class="card-text">'.$og.'</p>
        <br>
        <p class="card-text">Posted on: '.$datetime.'</p>
        </div>

          
        </div>
      </div>';
    }
      ?>
</body>
</html>
        
    
        




        
        
        
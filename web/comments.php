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
    <title>Blogpost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<style>
    h5{
        Margin: 5px;
    }
    .abcd{
        padding: 20px;
        margin-left: 130px;
    }
    
    textarea{
        width: 800px;
        margin-left: 280px
    }
    h6{
        margin-left: 280px
    }
    button[type="submit"]{
    width: 150px;
    padding: 10px;
    background-color: aquamarine;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
margin-left: 934px;
  .image{
      width: 10px;
      flex-basis: 40%;
      padding: 20px;
      
    }
    .container{
      display: flex;
      width: 60%;
      text-align: left;
      align-items: center;
      justify-content: center;
      margin-left: 100px;
      
    }}
    
</style>

</head>
  <body>
<?php require 'partials/nav.php' ?>
<?php
    include 'partials/dbconnect2.php';
    $sno = $_GET['sno'];
    $sqli = "SELECT * FROM `blog` where sno = '$sno'";
    $resultF = mysqli_query($conn, $sqli);
    $rows = mysqli_fetch_array($resultF);
    $blog1 = $rows["blog"];
    $name1 = $rows["urname"];
    $sub1 = $rows["subject"];
    $datetime1 = $rows["dt"];

    

        echo'<div class="abcd col-md-10">
        <div class="card" style="width: 70rem;">
        <img src="https://source.unsplash.com/400x100/?'.$sub1.',dress" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Author Name: '.$name1.'</h5>
        <br>
        <h5 class="card-title">Subject: '.$sub1.'</h5>
        <p class="card-text">'.$blog1.'</p>
        <br>
        <p class="card-text">Posted on: '.$datetime1.'</p>
        </div>
        
        
        </div>
      </div>';
      ?>
      <form action="<?php $_SERVER['REQUEST_URI'] ?> " method="post">
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
    $comment=$_POST['comment'];
      if($_SERVER["REQUEST_METHOD"] == "POST")
        
            {include 'partials/dbconnect3.php';
            
           
               $sqlii="INSERT INTO `comment` (`c_id`, `username`, `comment`, `datestamp`) VALUES ('$sno', '$uname', '$comment', current_timestamp());";
                    $resultff=mysqli_query($connn, $sqlii);}
    ?>
        
     
      <hr>
      <div>

      </div>
    <?php
    include 'partials/dbconnect3.php';
    $sqlf = "SELECT * FROM `comment` where c_id = '$sno'";
    $resultG = mysqli_query($connn, $sqlf);
    while($rowsF = mysqli_fetch_assoc($resultG)){
        $userName = $rowsF["username"];
    $commentss = $rowsF["comment"];
    $dtime = $rowsF["datestamp"];
    echo '  <div class="container">
    <div class="image">
      <img src="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" alt="">
    </div>
    <div class="text">
      
      
      
      <p>Posted by: '.$userName.' </p>
      
      <p>'.$commentss.' </p>
      <p>Posted on: '.$dtime.' </p>
    
    </div>
      <hr>

  </div>';
    }
    ?>
</body>
</html>
    
      

  



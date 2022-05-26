<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    {
        header("location: login.php");
        
    }else
?>
<?php
     $showalert=false;
     $showerror=false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include 'partials/dbconnect2.php';
        $urname=$_POST['urname'];
        $subject=$_POST['subject'];
        $blog=$_POST['blog'];
       
     
            
           $sql="INSERT INTO `blog` (`urname`, `subject`, `blog`, `dt`) VALUES ('$urname', '$subject', '$blog', current_timestamp())";
                $resultf=mysqli_query($conn, $sql);
                if($resultf){
                    $showalert=true;
                  
                }
            else{
                $showerror=true;
            }
    }

   
?>   

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@700&family=Macondo&display=swap" rel="stylesheet">
</head>
<?php require 'partials/nav.php' ?>

<body>
<?php
        if($showalert){
            echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Post submitted successfully!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';}
          if($showerror){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>We are facing some technical issues, please try agaiin later</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';
          }
 ?>
    <div class="universal">
        <div class="container">
            <p class="heading">Hi!! <strong><?php echo $_SESSION['username']?></strong> , This is your presonal space. <br>
                Here you can share your presonal ideas!!</p>
            <form action="/web/blog.php" method="post">
                <div class="whole">
                    <br>
                    <p class="hh1">Name*: <br> </p>
                    <input type="text" name="urname" id="urname" required placeholder="Satyam Suman">
                    <p class="hh">Subject of blog*: <br> </p>
                    <input type="text" name="subject" id="subject" required placeholder="Ex. We wore what" >
                    <p class="hh">Write your blog here!*: <br></p>
                    <textarea name="blog" id="blog" cols="30" rows="10" placeholder="Write your blog here"></textarea>
                    
                     <br>
                    <input type="submit" value="Post">
                </div>
            </form>
        </div>
    </div>
</body>
</html>}
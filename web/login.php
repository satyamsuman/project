<?php
    $login = false;
    $showerror = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'partials/dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    
        $sql = "Select * from web where username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: blog.php");
        }else{
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
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>
<body>
<?php require 'partials/nav.php' ?>

    <?php
        if($login){
            echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>You are logged in</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';}
          if($showerror){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid credentials!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';
          }
    ?>
    <div class="container">
        <form action="/web/login.php" method="post">
            <h1>Login</h1>
            <hr>
            
            <p>Username*: </p><input type="text" name="username" id="username" required placeholder="the_satyam_suman">
                       <br>
           
            <br>
            <p>Password*: </p><input type="password" name="password" id="password" required placeholder="•••••••"><br>
            <br>
            <input type="submit" class="btn"></button>
        </form>
        <br>
        
        <a class="member" href="/web/signup.php">Register</a>
    </div>
    
    
    
</body>
</html>
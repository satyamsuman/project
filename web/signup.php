<?php
        $error_username=false;
        $showalert=false;
        $showerror=false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/dbconnect.php';
        $name=$_POST["name"];
        $username=$_POST["username"];
        $gender=$_POST["gender"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];

        $existdatasql="SELECT * FROM `web` WHERE username='$username'";
        $result=mysqli_query($conn, $existdatasql);
        $totalusername=mysqli_num_rows($result);
        if($totalusername>0){
            $error_username=true;
        }else{
            if($password==$cpassword){
                $sql="INSERT INTO `web` (`name`, `username`, `gender`, `email`, `password`, `date`) VALUES ('$name', '$username', '$gender', '$email', '$password', current_timestamp())";
                $resultf=mysqli_query($conn, $sql);
                if($resultf){
                    $showalert=true;
                }
            }else{
                $showerror=true;
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup_style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  

</head>
<body>
    <?php require 'partials/nav.php' ?>
    <?php
        if($showalert){
            echo  '<div class="success" role="alert">
            <strong>Sign Up successful! You can now login</strong> 
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>';}
          if($showerror){
            echo '<div class="alert" role="alert">
            <strong>Password donot match</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';
          }
          if($error_username){
            echo '<div class="alert username" role="alert">
            <strong>Username already taken</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';
          }
    ?>
    <div class="container">
        <form action="/web/signup.php" method="post">
            <h1>Signup! Here</h1>
            <hr>
            <p>Name*: <br><input type="text" name="name" id="name" required placeholder="Satyam Suman"></p>
           
            <p>Your unique username*: <input type="text" name="username" id="username" required placeholder="the_satyam_suman"></p>
            
            <p>Gender*: 
            <select name="gender" id="gender" required>
                <option value="">--Select your gender--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="not_to_say">Prefer not to say</option>
            </select>
            </p>
            
            <p>
            Email*: <input type="email" name="email" id="email" required placeholder="thesatyamsuman@gmail.com">
            </p>
            
            <p>Password* <input type="password" name="password" id="password" required placeholder="••••••••••••"><br></p>
            <p>Confirm Password* <input type="password" name="cpassword" id="cpassword" required placeholder="••••••••••••"><br></p>
            <button type="submit" >Signup</button>
        </form>
        <div class="member">Already a member/<a href="/web/login.php">Login</a></div>
        <br>
    </div>
    
</body>
</html>
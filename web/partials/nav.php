<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
}else{
  $loggedin=false;
}
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
<style>
    .navbar{
        background-color: rgb(0, 0, 0);
        border-radius: 30px;
        width: 100%;
        height: 72px;
    }
    .navbar ul{
        overflow: auto;
    }

    .left{ 
        float: left;
        list-style: none;
        margin: 13px 20px;
        padding-top: 3px;
    }
    .right{ 
        float: right;
        list-style: none;
        margin: 13px 0px;
        padding-top: 3px;
        padding: 0px 38px;
    }
    .navbar li a{
        padding: 3px 3px;
        text-decoration: none;
        color: white;
    }
    .navbar li a:hover{
       
        color: aqua;
    }
    .search{
        
        color: white;
        padding: 12px 75px;
        float: right;
        
    }
    .navbar input{
        border: 2px solid black;
        border-radius: 14px;
        padding: 0px 17px;
        width: 129px;
    }
</style>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul>
                <li class="left"><a href="/web/welcome.php">Home</a> </li>
                
               <li class="left"><a href="/web/blog.php">Blog</a> </li>';
                
               if($loggedin)
                  {echo  '<li class="right"><a href="/web/logout.php">Logout</a> </li>';}
                  if(!$loggedin)
                {echo '<li class="right"><a href="/web/login.php">Login</a> </li>
                <li class="right"><a href="/web/signup.php">Signup</a> </li>';}
                
                echo '<div class="search">
                    <input type="text" name="search" id="search" placeholder="Search">
                </div>
            </ul>
            
        </nav>
    </header>
</body>
</html>';
?>
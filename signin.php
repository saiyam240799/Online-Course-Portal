<?php
  session_start();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Campus Course Portal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="main">
      <img src="images.jpg" class="logo">

    <form class="" action="#" method="post">

      <h1 style="color:red;" > Online Campus Course Portal </h1>

      <label for="username">Username </label><br>
      <input type="text" id="username" name="username" placeholder="Enter UserName..." autocomplete="on" pattern="^[a-zA-Z0-9]{5,12}$" title="It must be alphanumeric of length 5-15" autofocus required>
      <br><br>

      <label for="password">Password </label><br>
      <input type="password" id="password" name="password" placeholder="********" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="It must contain 8 characters containing atleast one lowercase, one uppercase and one number" required>
      <br><br>

      <input type="submit" value="Sign In" name="submit">
    
	  <a href="login.php">Don't have an account?</a>

    </form>

    </div>
  </body>
</html>







<?php
        $user = 'root';
        $password = '';
        $db = 'online_portal';
        $host = 'localhost';
        $port = 3306;


        $success = mysqli_connect(

           $host,
           $user,
           $password,
           $db,
           $port
        );

    if(isset($_REQUEST["submit"]))
    {
      $username = $_REQUEST["username"];
      $password = $_REQUEST["password"];
      $sql = mysqli_query($success, "SELECT * FROM registration WHERE username = '".$_POST['username']."' and password = '".$_POST['password']."'");
      $row = mysqli_num_rows($sql);

      if($row==true)
      {
      echo " you are logged in successfully";
	  $_SESSION["username1"] = $_POST["username"];
	  header("Location: http://localhost/PHP/login-20190903T065319Z-001/login/home.php");
      }
      else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";

      }

    }
    ?>

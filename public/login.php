<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $entered_username = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT uid, username, password_hash, permissions_level FROM users WHERE username = '$entered_username'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         if(password_verify($mypassword , $row['password_hash'])) {
            $_SESSION['login_user'] = $row['uid'];
            $_SESSION['login_username'] = $row['username'];
            $_SESSION['login_permissions'] = $row['permissions_level'];
            header("location: php");
         } else {
            $error = "Your password was incorrect.";
         }
         
      }else {
         $error = "Your username is invalid.";
      }
   }
?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="decode.css">
    </head>
    <body>
        <h1> Puzzlers (we need a better name) </h1>
        <form action = "" method = "post"> 
            <h3> Login </h3>
            Username: <br>
            <input type="text" name="username"> <br> <br>
            Password: <br>
            <input type="password" name="password"> <br> <br>
            <input type="submit" value="Go"> <br> <br>
            <b> Not registered yet? </b> <br> <br>
            <a href="registration.html"><button type="button">Register</button></a>
        </form>

        <div><?php if(isset($error)) { echo $error; } ?></div>
    </body>
</html>
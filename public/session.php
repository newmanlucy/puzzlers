<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select uid from users where uid = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['uid'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   } else {
   	 if($_SESSION['login_permissions'] < $page_permissions) {
   	 	if(!($special_permissions && special_permissions_script($_SESSION['login_user']))) {
   	 		header("location:restricted.php");
   	 	}
   	 }
   }
?>
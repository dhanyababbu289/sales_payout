<?php
ob_start();
session_start();
//for db connection
  require("database_conn.php");
  
  $username=$_POST["txt_username"];
  $password1=$_POST["txt_password"];
  $check_password=md5($password1);
  //checking pb_user
 $query_new="SELECT user_id,user_name,password FROM tb_adminuser where user_name='$username' and password='$check_password'"; 
 $result_new=mysql_query($query_new);
 echo  $count=mysql_num_rows($result_new);
 if($count>0)
 {
	 $row=mysql_fetch_array($result_new);
 header('location:login_view.php');
 $_SESSION["username"]=$username;
 $_SESSION["userid"]=$row['user_id'];
 }
 else
 {
	$flag_value=0;
	$status=md5($flag_value);
	
header('location:index.php?status='.$status.''); 
	 
 }
 
?>
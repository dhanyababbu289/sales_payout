<?php
ob_start();
session_start();
//for db connection
  require("database_conn.php");
  
  $name=$_POST["txt_name"];
  $parent_id=$_POST["user_parent"];
  $address=$_POST["address"];
  $mobno=$_POST["txt_mobno"];
  
  //check already registered
  
   $query_username="SELECT name from tb_seller_users where name='$name' and mobile_number='$mobno'";
   $result_username=mysql_query($query_username);
   $count=mysql_num_rows($result_username);
   if($count>0)
   {
	$status='2';
	 
	   
   }
   if($count==0)
   {
  
$query_add="insert into tb_seller_users(name,address,mobile_number) values('$name','$address','$mobno')";
  $result=mysql_query($query_add);
  $user_id=mysql_insert_id();
  
  
$query_parentadd="insert into tb_user_hierarchy(user_id,parent_user_id) values('$user_id','$parent_id')";
  $result=mysql_query($query_parentadd);
  if($result)
  {
	 $status='1'; 
  }
  //echo $result;
   }
  $status=base64_encode($status);
 
  
 header('location:login_view.php?status='.$status.''); 
  
  
  
  ?>
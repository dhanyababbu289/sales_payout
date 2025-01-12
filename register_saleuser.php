<?php
ob_start();
session_start();
if(!isset($_SESSION["userid"]))
{
header('location:index.php');	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pareeksha Bhavan</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript">
function isnumeric(num)
{
var v=true;
var vchar="0123456789";
for(i=0;i<num.length;i++)
{
var c=num.charAt(i);
if(vchar.indexOf(c)==-1)
{
v=false;
break;
}
}
return v;
}
function validation()
{
var valid=true;
var phone_number=document.getElementById("txt_mobno").value;
if(document.getElementById("txt_name").value=="")
{
alert("Enter Name");
valid=false;	
}
/*else
if(document.getElementById("user_parent").value=="")
{
alert("Select Parent User");
valid=false;	
}
else
if(document.getElementById("address").value=="")
{
alert("Enter User Address");
valid=false;	
}	
else
if(document.getElementById("txt_mobno").value=="")
{
alert("Enter mobile number");
valid=false;	
}
else
if(!isnumeric(document.getElementById("txt_mobno").value))
{
alert("Enter a valid mobile number");
valid=false;	
}
else
if((phone_number.length<5) || (phone_number.length>12))
{
alert("Enter a valid mobile number");
valid=false;	
}	*/
return valid;	
	
}
function validation1()
{
var valid=true;
if(document.getElementById("txt_name").value=="")
{
alert("Enter name");
valid=false;	
}
else
if(document.getElementById("user_parent").value=="")
{
alert("Select Parent User");
valid=false;	
}
else
if(document.getElementById("address").value=="")
{
alert("Enter User Address");
valid=false;	
}
else
if(document.getElementById("txt_mobno").value=="")
{
alert("Enter mobile number");
valid=false;	
}
else
if(!isnumeric(document.getElementById("txt_mobno").value))
{
alert("Enter a valid mobile number");
valid=false;	
}
else
if((phone_number.length<5) || (phone_number.length>12))
{
alert("Enter a valid mobile number");
valid=false		

}
return valid;	
	
}

</script>

</head>
<div class="maindiv">
<div class="header">
<h1 align="center">
SALE PRODUCTS
</h1>
</div>
<div class="menubar">
<?php
require("menu.php");

?>

</div>
<?php
require("database_conn.php");
$query_selectusers="SELECT * from tb_seller_users order by user_id";
   $result_selectusers=mysql_query($query_selectusers);
   
   ?>
<div class="subdiv1">
<h4 align="center">ADD USERS</h4>
</br>
<!--<form method="post" action="add_users.php" onsubmit="return validation()">-->

<form method="post" action="add_users.php" onsubmit="return validation1()">
<table align="center" height="175">

<tr><td>Seller Name</td>
<td><input type="text" name="txt_name" id="txt_name" maxlength="50" /></td>
</tr>
<tr><td>Parent Seller</td>
<td>
<select name="user_parent" id="user_parent">
<option value="">Select Parent</option>
<option value="0">nill</option>
<?php
while($row_user=mysql_fetch_array($result_selectusers))
  {
	  ?>
	  
	  
	  <option value="<?php echo $row_user['user_id'];?>"><?php echo $row_user['name'];?> </option>
	  
	  
	  <?php
  }
  
  ?>
  


</td>
</tr>


<tr><td>Address</td>
<td>
<textarea name="address" style="resize:none" id="address">
</textarea>
</td>
</tr>
<tr><td>Mobile Number</td>
<td>
<input type="text" name="txt_mobno" id="txt_mobno" maxlength="12" />
</td>
</tr>

<tr><td></td>
<td><input type="submit"  value="ADD USERS" /></td>
</tr>
</table>
</br>
</br>
<?php

$query_user="SELECT * from tb_seller_users order by user_id";
   $result_user=mysql_query($query_user);
    $count_users=mysql_num_rows($result_user);
  // var_dump($result_user);
   if($count_users>0)
   {
  // var_dump($result_user);
   
   ?>
   
   <table align="center" border="1">
   <tr><td>Name</td><td>Parent</td>
   <td>Address</td>
   <td>Mobile Number</td>
   </tr>
   
   <?php
while($row_result=mysql_fetch_array($result_user))
  {
	  $user_id='';
	  $user_id=$row_result['user_id'];
	  
	$query_hierarchy="SELECT parent_user_id from tb_user_hierarchy where user_id='$user_id'";
	  $result_hierarchy=mysql_query($query_hierarchy);
	  $parent_row=mysql_fetch_assoc($result_hierarchy);
	  $parent_id=$parent_row['parent_user_id'];
	  
	  
	  $query_parentname="SELECT name from tb_seller_users where user_id='$parent_id'";
   $result_parentname=mysql_query($query_parentname);
   $parentname_row=mysql_fetch_assoc($result_parentname);
   $parent_name=$parentname_row['name'];
   if($parent_id<1)
	  {
		  $parent_name='Nill';
	  }
    echo '<tr><td>'.$row_result['name'].'</td>';
	  
	  echo '<td>'.$parent_name.'</td>';
	  echo '<td>'.$row_result['address'].'</td>';
	  echo '<td>'.$row_result['mobile_number'].'</td></tr>';?>
	  
	  
	  
	 <!-- <td><input type="button" value="Mark Sale" onclick="mark_sale(<?php // echo $user_id;?> )"><span id="marksale_input"></span>
	   </td></tr>-->
	  <?php
	
	  
  }
   }
?>  
   
   
   </tr>
   </table>
   
  </form>
<br />
<h3  align="center">
<?php
 if (isset($_GET["status"])) {
	 
	 $status = "";
	 $status = base64_decode($_GET["status"]);
	 
	  if ($status == 2) {
                                                               
 ?>
 <script type="text/javascript">
 alert("User Already Registered.");
 
  </script>
  <?php
  
	  }
	  
	    if ($status == 1) {
                                                               
 ?>
 <script type="text/javascript">
 alert(" Registered Successfully");
 
  </script>
  <?php
  
	  }
	  
	  
 }
 ?>
                                                           
 
                                                                    

                                                               
                                                           
														
                                                            
                                                            
</h3>

</div>
<br />
<!--<div class="bottamdiv">
</div>-->

</div>

<div class="bottamdiv">
<h4 align="center">sale products</h4>
</div>

</body>
</html>
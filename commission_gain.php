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

   
   ?>
<div class="subdiv1">
<h4 align="center">SHOW GAINED COMMISSION  EACH SELLER</h4>




<?php

$query_commission_gain="SELECT * from tb_commission_gain order by product_id";
   $result_user=mysql_query($query_commission_gain);
  // var_dump($result_user);
   
   ?>
   
   <table align="center" height="175" border="1">
   <tr><td>Name</td>
   <td>Parent Name</td>
   <td>Product</td>
   <td>Product Cost</td>
   <td>Gained Commission</td>
   </tr> 
   
   <?php
while($row_result=mysql_fetch_array($result_user))
  {
	  $product_id='';
	  $user_id='';
	  $name='';
	  $parent_name='';
	   $commission_gained='';
	   $cost='';
	$user_id=$row_result['user_id'];
	  $product_id=$row_result['product_id'];
	 $commission_gained=$row_result['commission_gained'];
	  $query_selectproduct="SELECT product_name,cost from tb_product where product_id='$product_id'";
   $result_selectproduct=mysql_query($query_selectproduct);
   $row_cost=mysql_fetch_assoc($result_selectproduct);
   $product_name=$row_cost['product_name'];
   $cost=$row_cost['cost'];
   
    $query_username="SELECT name from tb_seller_users where user_id='$user_id'";
   $result_username=mysql_query($query_username);
   $username_row=mysql_fetch_assoc($result_username);
   $name=$username_row['name'];
	  
	  
	$query_hierarchy="SELECT parent_user_id from tb_user_hierarchy where user_id='$user_id'";
	  $result_hierarchy=mysql_query($query_hierarchy);
	  $parent_row=mysql_fetch_assoc($result_hierarchy);
	  $parent_id=$parent_row['parent_user_id'];
	  
	  
	   $query_parent_name="SELECT name from tb_seller_users where user_id='$parent_id'";
   $result_parent_name=mysql_query($query_parent_name);
   $parent_row=mysql_fetch_assoc($result_parent_name);
   $parent_name=$parent_row['name'];
   if($parent_id<1)
	  {
		  $parent_name='Nill';
	  }
	  
	  
	
    echo '<tr><td>'.$name.'</td>';
	  
	  echo '<td>'.$parent_name.'</td>';
	   echo '<td>'.$product_name.'</td>';
	   echo '<td>'.$cost.'</td>';
	   echo '<td>'.$commission_gained.'</td></tr>';
	  ?>
	  
	  <?php
	  //echo '<td>'.$row_result['user_level'].'</td>';
	  
	  
	  
	  
	 
	  
	  
	  
   
	  
	  
	 
	  
  }
  
?>  
   
   
   </tr>
   </table>
   
   





</form>
<br />
<h3  align="center">
<?php
if(isset($_GET["status"]))
{
//echo "Invalid username or password.";	
	
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pareeksha Bhavan</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript">
function validation()
{
var valid=true;
if(document.getElementById("txt_username").value=="")
{
alert("Enter username");
valid=false;	
}
else
if(document.getElementById("txt_password").value=="")
{
alert("Enter username");
valid=false;	
}	
return valid;	
	
}
function mark_sale(userid)
{
	var valid1=true;
	//alert(userid);
	//var user_id=userid;
	var send_data1="userid="+userid;
	
	//document.getElementById("checkresult").innerHTML="";
		

//var send_data1="name1="+name+"&sslc_regno1="+sslc_regno+"&sslc_month1="+sslc_month+"&sslc_year1="+sslc_year+"&dob="+dob1;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var resultvalue1=xmlhttp.responseText;
	//document.getElementById("checkresult").innerHTML=resultvalue;	
	//alert(resultvalue1);
	
		//alert("Already Registered");
		//window.location="mark_sale.php";
		
		document.getElementById("marksale_input").innerHTML=resultvalue1
	//document.getElementById("checkresult").innerHTML="Already registered";
	//valid1=false;
	//return valid1;	
	//document.getElementById("address").value="";
	//document.getElementById("address").disabled=true;
		
	
	
    }
  }
xmlhttp.open("POST","mark_sale.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(send_data1);

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
<a href="mark_new_sale.php">MARK SALE </a>

<?php
echo "Welcome"." ".'<font class="font_style">'.$_SESSION['username'].'</font>';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



</div>
<?php
require("database_conn.php");
$query_selectusers="SELECT * from tb_seller_users order by user_id";
   $result_selectusers=mysql_query($query_selectusers);
   
   ?>
<div class="subdiv1">
<h4 align="center">MARK SALE</h4>
<form method="post" action="add_sale.php" onsubmit="return validation()">
<table align="center" height="175">


<tr><td height="51">Seller</td>
<td>
<select name="user_parent" id="user_parent">
<option value="">Select Parent</option>
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
<tr><td></td>
<td><input type="submit"  value="ADD USERS" /></td>
</tr>
</table>


<?php

$query_user="SELECT * from tb_seller_users order by user_id";
   $result_user=mysql_query($query_user);
  // var_dump($result_user);
   
   ?>
   
   <table align="center" height="175" border="1">
   <tr><td>Name</td><td>Parent</td>
   <td></td>
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
    echo '<tr><td>'.$row_result['name'].'</td>';
	  
	  echo '<td>'.$parent_name.'</td>';?>
	  <td><input type="button" value="Mark Sale" onclick="mark_sale(<?php echo $user_id;?> )"><span id="marksale_input">dd</span>
	   </td></tr>
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
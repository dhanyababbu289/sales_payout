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
function validation()
{
var valid=true;
if(document.getElementById("seller_id").value=="")
{
alert("Enter Seller User");
valid=false;	
}
else
if(document.getElementById("product_sold").value=="")
{
alert("Enter Product sold");
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
<?php
require("menu.php");

?>

</div>
<?php
require("database_conn.php");
$query_selectusers="SELECT * from tb_seller_users order by user_id";
   $result_selectusers=mysql_query($query_selectusers);
   //for product
   $query_selectproduct="SELECT * from tb_product order by product_id";
 $result_selectproduct=mysql_query($query_selectproduct);
 //var_dump($result_selectproduct);
   
   
   ?>
<div class="subdiv1">
<h4 align="center">MARK SALE</h4>
<form method="post" action="add_sale.php" onsubmit="return validation()">
<table align="center" height="175">


<tr><td height="51">Choose Seller</td>
<td>
<select name="seller_id" id="seller_id">
<option value="">Select seller</option>
<?php
while($row_user=mysql_fetch_array($result_selectusers))
  {
	  ?>
	  
	  
	  <option value="<?php echo $row_user['user_id'];?>"><?php echo $row_user['name'];?> </option>
	  
	  
	  <?php
  }
  
  
  echo '<tr><td height="51">Product sold</td>
<td>
<select name="product_sold" id="product_sold">
<option value="">select product</option>';
?>
   <?php
while($row_product=mysql_fetch_array($result_selectproduct))
  {
	 
	  
	  
	  echo '<option value="'.$row_product['product_id'].'">'.$row_product['product_name'].'</option>';
	  
	  
	  
  }
  echo '</select>';
  ?>

  


</td>
</tr>
<tr><td></td>
<td><input type="submit"  value="ADD SALE" /></td>
</tr>
</table>



   
   





</form>
<br />
<h3  align="center">
<?php
if(isset($_GET["status"]))
{
	$status = "";
	 $status = base64_decode($_GET["status"]);
    if ($status == 1) {
                                                               
 ?>
 <script type="text/javascript">
 alert(" Sale marked Successfully");
 
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
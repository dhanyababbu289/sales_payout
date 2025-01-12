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
alert("Enter password");
valid=false;	
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div class="subdiv1">
<h4 align="center">SUPER ADMIN LOGIN </h4>
<form method="post" action="login_check.php" onsubmit="return validation()">
<table align="center" height="175">

<tr><td width="83" height="35">Username</td>
<td width="185"><input type="text" name="txt_username" id="txt_username" maxlength="15" /></td>
</tr>
<tr><td height="51">Password</td>
<td><input type="password" name="txt_password" id="txt_password" maxlength="20" /></td>
</tr>
<tr><td></td>
<td><input type="submit"  value="Login" /></td>
</tr>
</table>
</form>
<br />
<h3  align="center">
<?php
if(isset($_GET["status"]))
{
echo "Invalid username or password.";	
	
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
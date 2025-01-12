<?php
//for db connection
  require("database_conn.php");
 $user_id1=$_REQUEST["userid"];


$query_selectproduct="SELECT * from tb_product order by product_id";
 $result_selectproduct=mysql_query($query_selectproduct);
 //var_dump($result_selectproduct);
   
  echo '<tr><td height="51">Product sold</td>
<td>
<select name="product_sold" id="product_sold">
<option value="">Product Sold</option>';
?>
   <?php
while($row_product=mysql_fetch_array($result_selectproduct))
  {
	 
	  
	  
	  echo '<option value="'.$row_product['product_id'].'">'.$row_product['product_name'].'</option>';
	  
	  
	  
  }
  echo '</select>';
  ?>



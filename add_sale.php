<?php
ob_start();
session_start();
//for db connection
  require("database_conn.php");
  
  $seller_id=$_POST["seller_id"];
  $product_sold=$_POST["product_sold"];
  
$query_add="insert into tb_seller(user_id ,product_id,sell_status) values('$seller_id','$product_sold','Y')";
  $result=mysql_query($query_add);
  //select cost of product
  
  $query_selectusers="SELECT cost from tb_product where product_id='$product_sold'";
   $result_selectusers=mysql_query($query_selectusers);
   $row_cost=mysql_fetch_assoc($result_selectusers);
   $product_cost=$row_cost['cost'];
  
  
  
  
  
  
  
 //calculate commission
 $query_commi_level="SELECT * from tb_commission order by level_id";
   $result_commi_level=mysql_query($query_commi_level);
   $level_allocation=0;
    $seller='';
   while($row_level=mysql_fetch_array($result_commi_level))
	   
	   {
		   $level_allocation++;
		 
		   $gain_commission='';
		   $commission='';
		   $commission=$row_level['commission'];
		   $gain_commission=($product_cost*$commission)/100;
		   
		   
		   if($level_allocation==1)
		   {
			    
  $seller=$seller_id;
 // commission allocation starts first to the seller direct parent so select seller parent id for first allocation
 $query_selecthierarchy="SELECT parent_user_id from tb_user_hierarchy where user_id='$seller_id'";
   $result_selecthierarchy=mysql_query($query_selecthierarchy);
   $row_hierarchy=mysql_fetch_assoc($result_selecthierarchy);
   
   $parent_id='';
   $parent_id=$row_hierarchy['parent_user_id'];
   
   $query_add="insert into tb_commission_gain(user_id,product_id,commission_gained) values('$parent_id','$product_sold','$gain_commission')";
  $result=mysql_query($query_add);
  $seller=$parent_id;
  
  }
  
  
 if(($level_allocation>1) &&($level_allocation<=6))
  {
	
	 $query_selecthierarchy2="SELECT parent_user_id from tb_user_hierarchy where user_id='$seller'";
   $result_selecthierarchy2=mysql_query($query_selecthierarchy2);
   $row_hierarchy2=mysql_fetch_assoc($result_selecthierarchy2);
   $parent_id='';
   $parent_id=$row_hierarchy2['parent_user_id'];
   
    $query_add="insert into tb_commission_gain(user_id,product_id,commission_gained) values('$parent_id','$product_sold','$gain_commission')";
  $result=mysql_query($query_add);
    $seller=$parent_id;
   if($result)
  {
	 $status='1'; 
  }
	  
  }
  
	  } 
	  $status=base64_encode($status);
   
   header('location:mark_new_sale.php?status='.$status.''); 
   
   
   
   
   
	   
   
  
  
	 
  
  
  
  
 
  
  
  
  ?>
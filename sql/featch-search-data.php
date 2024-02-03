<?php
include("db/config.php"); 
 echo $searchkeydatas = $_GET['searchkeydatas'];
 if( $searchkeydatas==""){}else{
 
   // search category wise
 $query = "select category_name,page_name from category where category_name like '$searchkeydatas%' ";
 $query_cat = mysqli_query($conn,$query);
   
                                    while($arr_catArr =  mysqli_fetch_array($query_cat)){
                                        $pgname= $arr_catArr['page_name'];                                    
                                     ?>
                                                                                                                       		   
		<div style="margin-top:10px;padding:7px;border-bottom:1px solid #fff;cursor: pointer;" onclick="fetch_clik_link_products('<?php echo $pgname;?>','cat')"><?php echo $arr_catArr['category_name'];?></div>
		
									<?php  } 
									
 // search product wise 
 $query_search = "select product_title,product_id from product where product_title like '$searchkeydatas%' ";
 $query_Products = mysqli_query($conn,$query_search);   
                                    while($arr_product =  mysqli_fetch_array($query_Products)){
                                        $catid= $arr_product['product_id'];                                     
                                     ?>                                                                                                                       		   
		<div style="margin-top:10px;padding:7px;border-bottom:1px solid #fff;cursor: pointer;" onclick="fetch_clik_link_products('<?php echo $catid;?>','prd')"><?php echo $arr_product['product_title'];?></div>
		
									<?php  }  
									
									
									
									
									
									 
									}
									 ?>
									
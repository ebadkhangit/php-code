<?php
include("db/config.php"); 
 $searchkeydatas = $_GET['searchkeydatas'];
 if( $searchkeydatas==""){}else{
 
 // category
 $query = "select category_name,category_id,page_name from category where category_name like '$searchkeydatas%' ";
 $query_cat = mysqli_query($conn,$query);
   
                                    while($arr_catArr =  mysqli_fetch_array($query_cat)){
                                        $pgname= $arr_catArr['page_name']; 
                                    
                                     ?>
                                                                                                                       		   
		<div style="margin-top:10px;padding:0px 5px;border-bottom:1px solid #4a4646;cursor: pointer;" onclick="fetch_clik_link_products('<?php echo $pgname;?>','cat')"><?php echo $arr_catArr['category_name'];?></div>
		
									<?php 
									
									 } 
// sub category

 $query_subcat= mysqli_query($conn,"select sub_category_name,category_id,sub_category_id from sub_category where sub_category_name like '$searchkeydatas%' ");
   
                                    while($arr_subcatArr =  mysqli_fetch_array($query_subcat)){
                                        $catid= $arr_subcatArr['category_id']; 
                                          $subcatid= $arr_subcatArr['sub_category_id']; 
                                   $url= "sub-category-products.php?sbcid=".$subcatid."&catid=".$catid;
                                     ?>
                                                                                                                       		   
		<div style="margin-top:10px;padding:0px 5px;border-bottom:1px solid #4a4646;cursor: pointer;" onclick="fetch_clik_link_products('<?php echo $url;?>','subcat')"><?php echo $arr_subcatArr['sub_category_name'];?></div>
		
									<?php 
									
									 } 
									
 // products
 $query_search = "select product_title,product_id from product where product_title like '$searchkeydatas%' ";
 $query_Products = mysqli_query($conn,$query_search);
   
                                    while($arr_product =  mysqli_fetch_array($query_Products)){
                                        $catid= $arr_product['product_id']; 
                                    
                                     ?>
                                                                                                                       		   
		<div style="margin-top:10px;padding:0px 5px;border-bottom:1px solid #4a4646 ;cursor: pointer;" onclick="fetch_clik_link_products('<?php echo $catid;?>','prdid')"><?php echo $arr_product['product_title'];?></div>
		
									<?php  }   
									}
									 ?>
									
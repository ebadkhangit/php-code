<?php
session_start();
if($_GET['pid']!="")
{
 $prid = $_GET['pid'];
<?php
 if(empty($_SESSION['session_pid']))
    {	
		$_SESSION['session_pid'] = array();	
		array_push($_SESSION['session_pid'],$prid);				
	}else{
			 if(in_array($prid, $_SESSION['session_pid']))
			  {
			  //echo "Match found";
			  	//$arr = array('red', 'green', 'blue', 'yellow');
				$key = array_search($prid, $_SESSION['session_pid']); 
				//array_splice($_SESSION['session_pid'], $key, 1);			
			  unset($_SESSION['session_pid'][$key]);		       
			  }
			else
			  {
			  //echo "Match not found";
			  array_push($_SESSION['session_pid'],$prid);
		          
			  }

		
	    }
}	

$uniqueSessionPidArr = array_filter(array_unique($_SESSION['session_pid']));
//print_r($uniqueSessionPidArr);

?>



<div class="main-content">
					
					
							
                 <?php  
                 if(mysqli_num_rows($query_result)>0){
                 while($arr_cat =  mysqli_fetch_array($query_result)){ 
                 
                 ?>				
<div class="col-sm-4 text-center" style="padding-bottom:12px;" onclick="storeidSession('<?php echo $arr_cat['product_id'];?>')">

<img src="<?php echo $arr_cat['img_1'];?>" style="height:250px;width:100%;padding-bottom:20px;" class="img-responsive img-thumbnail zoom image">
	<div style="margin-top:-20px;" class="row"> 
	<?php if(array_search($arr_cat['product_id'],$_SESSION['session_pid'])){ ?>
	<div class="col-sm-3" id="ch<?php echo $arr_cat['product_id'];?>" style="display:block;"><i class="fa fa-check-circle-o fa-1x text-success"></i> </div>
	<input type="hidden" id="hideshow<?php echo $arr_cat['product_id'];?>" value="S">
	<?php }else{	?>
	
	<div class="col-sm-3" id="ch<?php echo $arr_cat['product_id'];?>" style="display:none;"><i class="fa fa-check-circle-o fa-1x text-success" ></i> </div>
	<input type="hidden" id="hideshow<?php echo $arr_cat['product_id'];?>" value="H">
	<?php } ?>
	
	<div class="col-sm-5"><?php echo $arr_cat['product_item_code'];?>
	
	</div>
	</div>
</div>
										
                                                                              
									 <?php }}else{ ?>
									<div class="col-sm-12" style="padding-bottom:10px;"><h2 class="text-danger">Product not availabe!</h2></div> 
									 <?php }?>
									
								
						
				
				</div>
				
				ajax
				
				 // add pid in session >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		   function storeidSession(prid){	
			if(xobj)
			{
				
			var hdShow=document.getElementById('hideshow'+prid).value;
			//alert(hdShow);
			if(hdShow=='H'){
			document.getElementById('hideshow'+prid).value='S';
			document.getElementById('ch'+prid).style.display = "block";
			}else{
			document.getElementById('hideshow'+prid).value='H';
			document.getElementById('ch'+prid).style.display = "none";
			
			}			
			
			  xobj.open("GET","session-pid.php?pid="+prid);	
			  	
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                                alert(xobj.responseText);
	    //document.getElementById('displaySupplierBycustName').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
		  }
		  // --------------------------------------------------------------------------------
		  $product = array();
$product['id'] = $id;
$product['type'] = $type;
$product['quantity'] = $quantity;
		  
		  array_push($_SESSION['cart'], $product); 
		  
		  foreach($_SESSION['cart'] as $product){

    if($id == $product['id']){
        $quantity = $product['quantity'];
        $quantity += 1;
        $product['quantity'] = $quantity;       
    }

}
		  // -----------------------------------------------
		  $_SESSION['cart'] = array();
$_SESSION['cart'][$id] = array('type' => 'foo', 'quantity' => 42);

$_SESSION['cart'][$id]['quantity']++; // another of this item to the cart
unset($_SESSION['cart'][$id]); //remove the item from the cart
		  
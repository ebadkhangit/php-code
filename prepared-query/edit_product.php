<!DOCTYPE html>
<html lang="en">
 <?php include_once "head.php"; ?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
 <?php include_once "header.php"; ?>
      <!-- Sidebar menu-->
 <?php include_once "menu.php"; ?>
      <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-plus"></i> Update Product</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Update Product</li>
          <li class="breadcrumb-item"><a href="#">Update Product</a></li>
        </ul>
      </div>
	               <?php
	  $msg="";
//error_reporting(0);
if(isset($_POST['update']))
{	
extract($_POST);	
	$fileName = $_FILES['fileName']['name'];
    
$catid =trim( $_POST['catid']);
$producttitle =trim($_POST['producttitle']);
 // $productprice = trim($_POST['productprice']);
 //  $unittype =trim($_POST['unittype']);

 $desc =trim($_POST['productdesc']);

if($fileName==""){
	$file_path1 = $hidden_img_1;
	 $stmt1 = $conn->prepare("update product set category_id=?,product_title=?, product_desc=? where product_id=? ");
	 $stmt1->bind_param('ssss',$catid,$producttitle,$desc,$pid);
	 $returnn = $stmt1->execute();
	 if ($returnn>0){   
	   $msg="<div class='alert alert-success'/>Data Updataed Successfully</div>";
	  
	}else
    {
		$msg="<div class='alert alert-danger'/>Not Updataed!</div>";
	  
	
    }
	 
}else{
	$file_ext=strtolower(pathinfo($_FILES["fileName"]["name"], PATHINFO_EXTENSION)); 
    $hashfilename=sha1($fileName).'.'.$file_ext;
    $file_path1 = "assets/product/".$login_user_id.'_'.$hashfilename;


$expensions= array("jpeg","jpg","png");      
      if(in_array($file_ext,$expensions)=== false){
         
		 $msg="<div class='alert alert-danger'/>extension not allowed, please choose a JPEG or PNG file.</div>";
		 //echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.')</script>";
      }else if($_FILES["fileName"]["size"] > 800000 ) 
                           {
                   $msg="<div class='alert alert-danger'/>Sorry, your file is larger them 1 MB.</div>";
				 //echo "<script>alert('')</script>";    				  
                          }else
                         {			 
	     			 $result = move_uploaded_file($_FILES["fileName"]["tmp_name"], $file_path1);
					 
					 
                                    if($result){


$stmt_img = $conn->prepare("update product set category_id=?, product_title=?,product_desc=?,img_1=? where product_id=? ");
	 $stmt_img->bind_param('sssss',$catid,$producttitle,$desc,$file_path1,$pid);
	$returnn = $stmt_img->execute();
	 if ($returnn>0){   
	   $msg="<div class='alert alert-success'/>Data Updataed Successfully</div>";
	  // echo "<script>alert('Data Updataed Successfully')</script>";
	}else
    {
		$msg="<div class='alert alert-danger'/>Not Updataed!</div>";
	  // echo "<script>alert('Not Updataed')</script>";
	
    }
}
}
}
}
?>
<?php echo $msg; ?>

 <?php 
			                   $pid= $_GET['pid'];

			                           
										$stmt = $conn->prepare("select * from product where product_id = ? ");
											$stmt->bind_param('s',$pid);
											$stmt->execute();
											$result = $stmt->get_result();    
											if ($result->num_rows>0) {
											$arr_cat1  = $result->fetch_assoc();					
											}                    
                                            ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="view_product.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Product</b></a>
                  </div>
                  <div class="col-md-6"><h4>Update Product</h4></div>
              </div>
              <hr>
             	  <?php 
			$pid= $_GET['pid'];

			                           
										$stmt_sel = $conn->prepare("select a.*, b.* from category as a ,product as b where a.category_id = b.category_id and product_id = ?; ");
											$stmt_sel->bind_param('s',$pid);
											$stmt_sel->execute();
											$result = $stmt_sel->get_result();   
											//$arr_cat_sel  = $result->fetch_assoc();	
											//echo $result->num_rows;
											// print_r ($arr_cat_sel);  //die();
											if ($result->num_rows>0) {
											$arr_cat_sel  = $result->fetch_assoc();	

                
                                            ?>
											
                <form method="post" enctype="multipart/form-data">
				 <input type="hidden" name="pid" value="<?php echo $arr_cat_sel['product_id'];?>"  />
					<input type="hidden" name="hidden_img_1" value="<?php echo $arr_cat_sel['img_1'];?>"  />
                    <div class="form-group row">                 
                      <div class="col-md-4">
                        <label for="">Select Category*</label>
                        <select name="catid" id="cat_id" class="form-control" required/>
                          <option value="<?php echo $arr_cat_sel['category_id'];?>"><?php echo $arr_cat_sel['category_name'];?></option>
                          <?php 
										$stmt = $conn->prepare("select category_id,category_name from category");
											//$stmt->bind_param('s',$ststus);
											$stmt->execute();
											$result = $stmt->get_result();    
											if ($result->num_rows>0) {
											while ($arr_cat_sel  = $result->fetch_assoc()){	
											
											
                                                                                        
                                       ?>	
						<option value="<?php echo $arr_cat_sel['category_id'];?>"><?php echo $arr_cat_sel['category_name'];?></option>
										
											<?php }} ?>                   
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="">Product  Name *</label>
                        <input name="producttitle" id="producttitle" class="form-control" value="<?php echo $arr_cat1['product_title'];?>"  placeholder="Product Name"  required/>
                      </div>

                       <div class="col-md-4">
                        <label for="">Product Image</label>
                        <input type="file" name="fileName" id="fileName" class="form-control" accept="image/x-png,image/gif,image/jpeg"   placeholder="Select Image">
                   <br>
           <img src="<?php echo $arr_cat1['img_1'];?>" style="height:100px;width:180px;border:2px solid #ddd;padding:10px;">

            </div>
                      <!--   <div class="col-md-4">
                        <label>Product Price *</label>
                        <input  name="productprice" id="productprice" class="form-control"  value="<?php echo $arr_cat1['product_price'];?>"   placeholder="Product Amount"  required/>
                      </div> -->
                    </div>
					 <div class="form-group row">
					 <!--  <div class="col-md-4 form-group">
					     <label for="">Select Unit(Volume)*</label>
					  <select name="unittype" id="unittype" class="form-control" required/>
                        <option value="<?php echo $arr_cat1['product_id'];?>"><?php echo $arr_cat1['product_unit'];?></option>
                         
						<option value="Kg">Kg</option>
						<option value="Gram">Gram</option>
						<option value="Per Bottle">Per Bottle</option>
						<option value="Liter">Liter</option>
						<option value="Per Packet">Per Packet</option>
										
											                
                        </select>
                    </div> -->
               
                  
                 </div>
                   
                  <div class="col-md-12 form-group">
                    <label for="">Product Description *</label>
                    <textarea name="productdesc" id="exampleTextarea" rows="3" class="form-control" required/> <?php echo $arr_cat1['product_desc'];?> </textarea>
                  </div>
                <div class="row mb-10">
                    <div class="col-md-12">
                      <button type="submit" name="update" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              
              	<?php } ?>
               <div id="sample">
                                        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                                        //<![CDATA[
                                                     bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                                                    //]]>
                                                  </script>
									
												
								
								</div>
          
          </div>
        </div>
      </div>
    </main>
        <!-- footer-->
    <?php include_once "footer.php"; ?>
  </body>
</html>
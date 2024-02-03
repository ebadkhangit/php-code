<!DOCTYPE html>
<html lang="en">
 <?php include_once "head.php"; ?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
 <?php include_once "header.php"; ?>
      <!-- Sidebar menu-->
 <?php include_once "menu.php"; ?>
 <script src="js/ajaxPage.js" type="text/javascript"></script>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-plus"></i> Products</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item"><a href="#">Create Products</a></li>
        </ul>
      </div>
  
  <?php
 	  $msg="";
//error_reporting(0);
if(isset($_POST['submit']))
{
	extract($_POST);	
	$fileName = $_FILES['fileName']['name'];
    $file_ext=strtolower(pathinfo($_FILES["fileName"]["name"], PATHINFO_EXTENSION)); 
    $hashfilename=sha1($fileName).'.'.$file_ext;
    $file_path = "assets/product/".$login_user_id.'_'.$hashfilename;
	
	
$categoryId=$_POST['categoryId'];
$subCategoryId=$_POST['subcategoryId'];
 $producttitle =trim($_POST['producttitle']);
// $productprice = trim($_POST['productprice']);
  //$unittype = trim($_POST['unittype']);
 $desc =trim($_POST['productdesc']);
 
 
$lowerPageTitle = strtolower($producttitle);
 $removePageTitleSpace= str_replace(" ","-",$lowerPageTitle);  
 $pageName=$removePageTitleSpace.".php"; 
 $newTitlefileName="../".$removePageTitleSpace.".php"; 
   
 $openNewfileName = fopen($newTitlefileName, "w") or die("Unable to open file!");
 $writeNewFileName = "<?php include_once('productcategory.php');?>";
 fwrite($openNewfileName, $writeNewFileName);
 fclose($openNewfileName);


      $expensions= array("jpeg","jpg","png");      
      if(in_array($file_ext,$expensions)=== false){
         
		 $msg="<div class='alert alert-danger'/>extension not allowed, please choose a JPEG or PNG file.</div>";
		 //echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.')</script>";
      }else if($_FILES["fileName"]["size"] > 600000) 
                           {
                   $msg="<div class='alert alert-danger'/>Sorry, your file is larger them 2 MB.</div>";
				   				  
                          }else
                         {			 
	     			 $result1 = move_uploaded_file($_FILES["fileName"]["tmp_name"], $file_path);
					          
                                    if($result1){


     $stmt_ord = $conn->prepare("INSERT INTO product(category_id,sub_category_id,product_title,page_name,img_1,product_desc,created_date) VALUES (?,?,?,?,?,?,?)");
	$stmt_ord->bind_param('sssssss',$categoryId,$subCategoryId,$producttitle,$pageName,$file_path,$desc,$crdate);
	 $returnn= $stmt_ord->execute();
     if($returnn>0){  
	 
	 $msg="<div class='alert alert-success'/>Product  Successfully Created</div>";
	 
   }else{ 
   
   $msg="<div class='alert alert-danger'/>Product is already exists!</div>";
	  
	
}
	}
	
}

}

?>

<?php echo $msg; ?>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="view_product.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Products</b></a>
                  </div>
                  <div class="col-md-6"><h4>Create Products</h4></div>
              </div>
 

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group row">                 
                      <div class="col-md-4">
                        <label for="">Select Category*</label>
                        <select id="categoryId" name="categoryId"  class="form-control" onchange="getsubcat(this.value)" required/>
                          <option value="">Select Category</option>
                          <?php 
										$stmt = $conn->prepare("select category_id,category_name from category");
											//$stmt->bind_param('s',$ststus);
											$stmt->execute();
											$result = $stmt->get_result();    
											if ($result->num_rows>0) {
											while ($arr_cat  = $result->fetch_assoc()){	                                             
                                                                                        
                                       ?>	
						<option value="<?php echo $arr_cat['category_id'];?>"><?php echo $arr_cat['category_name'];?></option>
										
											<?php }} ?>                   
                        </select>
                      </div>
					 <div class="col-sm-4">
												<label>Sub Product Category <span class="text-danger"></span></label>
											
												<select id="subcategoryId" name="subcategoryId" class="form-control" required>
												<option value="">Select Sub Product Category</option>
													
												</select>
											</div>
											
                      <div class="col-md-4">
                        <label for="">Product  Name *</label>
                        <input name="producttitle" id="producttitle" class="form-control"  placeholder="Product Name"  required/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Product Image</label>
                        <input type="file" name="fileName" id="fileName" class="form-control" accept="image/x-png,image/gif,image/jpeg"   placeholder="Select Image"  required/>
                      </div>
                    
					</div>
					
					 <div class="form-group row">
				
					
                 
				   
                 </div>
                   <div class="col-md-12 form-group">
                    <label for="">Product Description *</label>
                    <textarea name="productdesc" id="exampleTextarea" rows="3" class="form-control" rewuired></textarea>
                  </div>
				 
                <div class="row mb-10">
                    <div class="col-md-12">
                      <button type="submit" name="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              
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
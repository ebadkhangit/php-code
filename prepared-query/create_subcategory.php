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
          <h1><i class="fa fa-plus"></i>Sub-Category</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Sub-Category</li>
          <li class="breadcrumb-item"><a href="#">Create Sub-Category</a></li>
        </ul>
      </div>
	
	    <?php
	  $msg="";
error_reporting(0);
if(isset($_POST['submit']))
{
	extract($_POST);	
	$fileName = $_FILES['fileName']['name'];
    $file_ext=strtolower(pathinfo($_FILES["fileName"]["name"], PATHINFO_EXTENSION)); 
    $hashfilename=sha1($fileName).'.'.$file_ext;
    $file_path = "assets/sub-category/".$login_user_id.'_'.$hashfilename;
	
 $categoryId=trim($_POST['categoryId']);

    $subCategoryName =trim( $_POST['subCategoryName']);
   // $desc =trim( $_POST['desc']);




$lowerPageTitle = strtolower($subCategoryName);
 $removePageTitleSpace= str_replace(" ","-",$lowerPageTitle);  
 $newpageName=$removePageTitleSpace.".php"; 
 $newTitlefileName="../".$removePageTitleSpace.".php"; 
   
 $openNewfileName = fopen($newTitlefileName, "w") or die("Unable to open file!");
 $writeNewFileName = "<?php include_once('subcategory.php');?>";
 fwrite($openNewfileName, $writeNewFileName);
 fclose($openNewfileName);




$expensions= array("jpeg","jpg","png");      
      if(in_array($file_ext,$expensions)=== false){
         
		 $msg="<div class='alert alert-danger'/>extension not allowed, please choose a JPEG or PNG file.</div>";
		 //echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.')</script>";
      }else if($_FILES["fileName"]["size"] > 200000 ) 
                           {
                   $msg="<div class='alert alert-danger'/>Sorry, your file is larger them 2 MB.</div>";
				 //echo "<script>alert('')</script>";    				  
                          }else
                         {			 
	     			 $result = move_uploaded_file($_FILES["fileName"]["tmp_name"], $file_path);
					 
                                    if($result){


  
$stmt_ord = $conn->prepare("INSERT INTO sub_category(category_id,sub_category_name,page_name,sub_category_image,created_date) VALUES (?,?,?,?,?)");
	 $stmt_ord->bind_param('sssss',$categoryId,$subCategoryName,$newpageName,$file_path,$crdate);
	$returnn= $stmt_ord->execute();
     if ($returnn>0){   
	 $msg="<div class='alert alert-success'/>Category Successfully Created</div>";
   //echo "<script>alert('Customer Successfully Created')</script>";
  
   }else{ 
   $msg="<div class='alert alert-danger'/>Category is already exists!</div>";
	  
	
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
                      <a href="view_subcategory.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Sub-Category</b></a>
                  </div>
                  <div class="col-md-6"><h5><i class="fa fa-user"></i>&nbsp;View Sub-Category</h5></div>
              </div>
              <hr>
             
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group row"> 
					
                       		   <div class="col-md-4">
                        <label for="">Select Category*</label>
                        <select name="categoryId" id="categoryId" class="form-control" required/>
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
                       <div class="col-md-4">
                        <label for="">Sub-Category Name*</label>
                        <input type="text" name="subCategoryName" id="nme" class="form-control"  placeholder="Enter Name"  required/>
                      </div>
					  <div class="col-md-4">
                        <label for="">Image</label>
                        <input type="file" name="fileName" id="nme" class="form-control"  placeholder="Select Image"  required/>
                      </div>
					  <!--<div class="col-md-4">
                       <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" id="exampleTextarea" rows="3" class="form-control" placeholder="Enter Descriptions"></textarea>
                  </div>
				  </div>-->
                    </div>
                  
                    
                
                 
                <div class="row mb-10">
                    <div class="col-md-12">
                      <button type="submit" name="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              
              
            
          
          </div>
        </div>
      </div>
    </main>
        <!-- footer-->
    <?php include_once "footer.php"; ?>
  </body>
</html>
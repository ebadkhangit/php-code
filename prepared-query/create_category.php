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
          <h1><i class="fa fa-plus"></i> Product Category</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item"><a href="#"> Add Category</a></li>
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
    $file_path = "assets/category/".$login_user_id.'_'.$hashfilename;
    $cat_name =trim( $_POST['catname']);
    $desc =trim( $_POST['desc']);




$lowerPageTitle = strtolower($cat_name);
 $removePageTitleSpace= str_replace(" ","-",$lowerPageTitle);  
 $newpageName=$removePageTitleSpace.".php"; 
 $newTitlefileName="../".$removePageTitleSpace.".php"; 
   
 $openNewfileName = fopen($newTitlefileName, "w") or die("Unable to open file!");
 $writeNewFileName = "<?php include_once('products.php');?>";
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



$stmt_ord = $conn->prepare("INSERT INTO category(category_name,page_name,category_image,created_date) VALUES (?,?,?,?)");
	 $stmt_ord->bind_param('ssss',$cat_name,$newpageName,$file_path,$crdate);
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

	  
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="view_category.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Category</b></a>
                  </div>
                  <div class="col-md-6"><h5><i class="fa fa-user"></i>&nbsp;Create Category</h5></div>
              </div>
			  <?php echo $msg; ?>
              <hr>
             
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group row"> 
                     					
                       <div class="col-md-6">
                        <label for=""> Product Category Name*</label>
                        <input type="text" name="catname" id="nme" class="form-control"  placeholder="Enter Category Name"  required/>
                      </div>
					  <div class="col-md-6">
                        <label for="">Category Image</label>
                        <input type="file" name="fileName" id="fileName" class="form-control" accept="image/x-png,image/gif,image/jpeg"  placeholder="Select Image"  required/>
                      </div>
					<!--   <div class="col-md-12">
                       <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" id="exampleTextarea" rows="3" class="form-control" placeholder="Enter Descriptions"></textarea>
                  </div>
				  </div> -->
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
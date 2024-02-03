<!DOCTYPE html>
<html lang="en">
 <?php include_once "head.php"; ?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
 <?php include_once "header.php"; ?>
      <!-- Sidebar menu-->
 <?php include_once "menu.php"; ?>
            <?php
		 $getsubCatid=$_GET['subcatid'];

 $strquery= "select a.category_name,b.category_id,b.sub_category_id,b.sub_category_name,b.sub_category_image "
                                   . "from category As a, sub_category As b "
                                    . "where b.sub_category_id='$getsubCatid' and a.category_id=b.category_id ";

 																			$query_result = mysqli_query($conn,$strquery);
                                                                            $arr_cat =  mysqli_fetch_array($query_result);
                                                                             $subcategory_id = $arr_cat['sub_category_id'];
                                                                            $category_name = $arr_cat['category_name'];
                                                                            $categoryName = $arr_cat['sub_category_name'];
                                                                             $subcatimage = $arr_cat['sub_category_image'];																				
											
	  $msg="";
//error_reporting(0);
if(isset($_POST['update']))
{	
extract($_POST);	
	$fileName = $_FILES['fileName']['name'];
    
$categoryId=$_POST['categoryId'];	
$subCategoryName=trim($_POST['subCategoryName']);
//$desc =trim( $_POST['desc']);

if($fileName==""){
	$file_path1 = $hidden_img_1;
	 $stmt = $conn->prepare("update sub_category set category_id=?,  sub_category_name=?  where sub_category_id=? ");
	 $stmt->bind_param('sss',$categoryId,$subCategoryName,$getsubCatid);
	$returnn = $stmt->execute();
	 if ($returnn>0){   
	   $msg="<div class='alert alert-success'/>Data Updataed Successfully</div>";
	  // echo "<script>alert('Data Updataed Successfully')</script>";
	}else
    {
		$msg="<div class='alert alert-danger'/>Not Updataed!</div>";
	  // echo "<script>alert('Not Updataed')</script>";
	
    }
	 
}else{
	$file_ext=strtolower(pathinfo($_FILES["fileName"]["name"], PATHINFO_EXTENSION)); 
    $hashfilename=sha1($fileName).'.'.$file_ext;
    $file_path1 = "assets/sub-category/".$login_user_id.'_'.$hashfilename;


$expensions= array("jpeg","jpg","png");      
      if(in_array($file_ext,$expensions)=== false){
         
		 $msg="<div class='alert alert-danger'/>extension not allowed, please choose a JPEG or PNG file.</div>";
		 //echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.')</script>";
      }else if($_FILES["fileName"]["size"] > 200000 ) 
                           {
                   $msg="<div class='alert alert-danger'/>Sorry, your file is larger them 1 MB.</div>";
				 //echo "<script>alert('')</script>";    				  
                          }else
                         {			 
	     			 $result = move_uploaded_file($_FILES["fileName"]["tmp_name"], $file_path1);
					 
					 
                                    if($result){


$stmt_img = $conn->prepare("update sub_category set category_id=?, sub_category_name=?,sub_category_image=? where sub_category_id=? ");
	 $stmt_img->bind_param('ssss',$categoryId,$subCategoryName,$file_path1,$getsubCatid);
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
      <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-plus"></i> Update Sub-Category</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Update Sub-Category</li>
          <li class="breadcrumb-item"><a href="#">Update Sub-Category</a></li>
        </ul>
      </div>
	    <?php echo $msg; ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="view_subcategory.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Sub-Category</b></a>
                  </div>
                  <div class="col-md-6"><h5>Update Sub-Category</h5></div>
              </div>
              <hr>
             
                <form  method="post" enctype="multipart/form-data">
				<input type="hidden" name="subcatid" value="<?php echo $arr_cat['sub_category_id'];?>">
				<input type="hidden" name="hidden_img_1" value="<?php echo $arr_cat['sub_category_image'];?>">
                         <div class="row">        
                  	   <div class="col-md-4">
                        <label for="">Select Category*</label>
                        <select name="categoryId" id="categoryId" class="form-control" required/>
                     <option value="<?php echo  $arr_cat['category_id']; ?>"><?php echo  $arr_cat['category_name']; ?></option>

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
                        <label for=""> Sub-Category Name*</label>
                        <input type="text"name="subCategoryName"  value="<?php echo $categoryName;?>" id="subCategoryName" class="form-control"  placeholder="Enter Name"  required/>
                      </div>
					  <div class="col-md-4">
                        <label for=""> Image</label>
                        <input type="file" name="fileName" id="nme" class="form-control"  placeholder="Select Image"  required/>
						<img src="<?php echo $subcatimage;?>" style="height:80px;">
                      </div>
					  
					  </div>
				
                  
                  
                  
                   <div class="row mb-10">
                    <div class="col-md-12">
                      <button type="submit" name="update" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
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
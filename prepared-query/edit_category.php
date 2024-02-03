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
          <h1><i class="fa fa-plus"></i> Update Category</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Update Category</li>
          <li class="breadcrumb-item"><a href="#">Update Category</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="view_category.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Category</b></a>
                  </div>
                  <div class="col-md-6"><h5>Update Category</h5></div>
              </div>
              <hr>
               <?php
	  $msg="";
//error_reporting(0);
if(isset($_POST['update']))
{	
extract($_POST);	
	$fileName = $_FILES['fileName']['name'];
    
$cid =trim( $_POST['cid']);	
$cat_name =trim( $_POST['catname']);
$desc =trim( $_POST['desc']);

if($fileName==""){
	$file_path1 = $hidden_img_1;
	 $stmt = $conn->prepare("update category set  category_name=?  where category_id=? ");
	 $stmt->bind_param('ss',$cat_name,$cid);
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
    $file_path1 = "assets/category/".$login_user_id.'_'.$hashfilename;


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


$stmt_img = $conn->prepare("update category set category_name=?,category_image=? where category_id=? ");
	 $stmt_img->bind_param('sss',$cat_name,$file_path1,$cid);
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
			$cid= $_GET['cid'];

			                           
										$stmt = $conn->prepare("select * from category where category_id = ? ");
											$stmt->bind_param('s',$cid);
											$stmt->execute();
											$result = $stmt->get_result();    
											if ($result->num_rows>0) {
											$arr_cat  = $result->fetch_assoc();					
											}                    
                                            ?>
                <form method="post" enctype="multipart/form-data">
				 <input type="hidden" name="cid" value="<?php echo $arr_cat['category_id'];?>"  />
				<input type="hidden" name="hidden_img_1" value="<?php echo $arr_cat['category_image'];?>"  />
                                 
                      <div class="form-group row"> 
                     					
                       <div class="col-md-6">
                        <label for=""> Product Category Name*</label>
                        <input type="text" name="catname" id="nme" class="form-control" value="<?php echo $arr_cat['category_name'];?>"  placeholder="Enter Name">
                      </div>
					  <div class="col-md-6">
                        <label for="">Category Image</label>
                        <input type="file" name="fileName" id="nme" class="form-control"  placeholder="Select Image">
						<br>
                      <img src="<?php echo $arr_cat['category_image'];?>" style="height:100px;width:180px;border:2px solid #ddd;padding:10px;">
					 </div>
					 </div>
				<!-- 	  <div class="form-group row"> 
					  <div class="col-md-12">
                       <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" id="exampleTextarea" rows="3" class="form-control" placeholder="Enter Descriptions"><?php echo $arr_cat['category_desc'];?></textarea>
                  </div>
				  </div>
                    </div> -->
                  
                  
                  
                   <div class="row mb-10">
                    <div class="col-md-12">
                      <button type="submit" name="update" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
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
    </main>
        <!-- footer-->
    <?php include_once "footer.php"; ?>
  </body>
</html>
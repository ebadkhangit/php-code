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
          <h1><i class="fa fa-plus"></i>Slider</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Slider</li>
          <li class="breadcrumb-item"><a href="#"> Add Slider</a></li>
        </ul>
      </div>
	  
	  
<?php
$error=''; // Variable To Store Error Message
$sucessMessage=''; // Variable To Store Success Message
$filesizeError="";
if (isset($_POST['submit'])) {
     //$discount= $_POST['discount'];
      // $ftitle= $_POST['ftitle'];
        //  $stitle= $_POST['stitle'];
            // $ttitle= $_POST['ttitle'];
         

    $fileName = $_FILES['fileName']['name'];
    $file_path = "assets/slider/".$login_user_id.uniqid ().$fileName;          
                         if($_FILES["fileName"]["size"] > 10000000 or $_FILES["fileName"]["error"]=="1" ) 
                           {
  				  $error =  "Sorry, your file is larger them 10 MB.";  				
    				$filesizeError = "Slider Image greater than 10 MB!";
                          }else{		 
	     			 $result = move_uploaded_file($_FILES["fileName"]["tmp_name"], $file_path);
                                    if($result){
                     $query_result= mysqli_query($conn,"insert into slider(slider_path)values('$file_path')");
                                     $sucessMessage = "Slider Image has been uploaded.";

                                    }else{
                                        $error = "file not uploaded.";

                                    }     			
                                
                                }
                                
 
mysqli_close($conn); // Closing Connection

}
?>

	  
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="view_slider.php" class="btn btn-primary"><i class="fa fa-eye"></i><b> View Slider</b></a>
                  </div>
                  <div class="col-md-6"><h5><i class="fa fa-user"></i>&nbsp;Create Slider</h5></div>
              </div>
			
              <hr>
             
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group row"> 
                     					
                      
					  <div class="col-md-6">
                        <label for="">Upload Image</label>
                        <input type="file" name="fileName" id="fileName" class="form-control" accept="image/x-png,image/gif,image/jpeg"  placeholder="Select Image"  required/>
                      </div>
					  
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
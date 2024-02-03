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
          <h1><i class="fa fa-th-list"></i>Slider</h1>
      
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Slider</li>
          <li class="breadcrumb-item active"><a href="#">View Slider</a></li>
        </ul>
      </div>
     	<?php
            
	if(isset($_GET['delid'])){
		     $delid = $_GET['delid']; 
             $pth = $_GET['$pth'];			 
         // start deactive category
        $delsuccess = mysqli_query($conn,"delete from slider where slider_id='$delid'") or die(mysqli_error($conn));
        
        if($delsuccess){
unlink($pth);			
               
			echo "<script>alert('Slider has been deleted!')</script>";
			echo "<script>window.location.href='view_slider.php'</script>";
			}else{
			echo "<script>alert('Error! Please try again')</script>";
			}
     
		}
	   
		?>
		
      
       
        
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
              <div class="row form-group">
                  <div class="col-md-5" >
                      <a href="create_slider.php" class="btn btn-primary"><i class="fa fa-plus"></i><b>Create Slider</b></a>
                  </div>
                  <div class="col-md-6"><h5><b>Slider</b></h5></div>                 
              </div>
            
            <div class="table-responsive">
              <table class="table">
                <thead>
									<tr>
										<th>Sr.No.</th>										
										<th>Slider</th>
                                        <th>Operation</th>
																		
										
									</tr>
								</thead>
             <tbody>
									    <?php 
                                                                                    $sr=1;
                                                                                     $query_result = mysqli_query($conn,"select slider_id,slider_path from slider where is_delete='0'");
                                                                                     while($arr_cat =  mysqli_fetch_array($query_result)){
                                                                                              
                                                                                               ?>
                                                                                    
									<tr>
													
										<td><img src="<?php echo $arr_cat['slider_path'];?>" style="height:250px;width:70%"></td>
                                        
                                        <td><a href="?delid=<?php echo $arr_cat['slider_id'];?>&pth=<?php echo $arr_cat['slider_path'];?>"  class="btn btn-danger btn-xs" data-toggle="tooltip-delete" title="Delete Slider" onclick="return confirm('Are you sure you want to Remove?');"><i class="fa fa-trash"></i>
                                            </td>
																		
										
										
									</tr>
                                                                         <?php }
                                                                                      mysqli_free_result($query_result);
                                                                                      mysqli_close($conn); 
                                                                                     ?>
									
									
								</tbody>
							</table>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
      <!-- footer-->
    
	<?php include_once "footer.php"; ?>

  </body>
</html>   
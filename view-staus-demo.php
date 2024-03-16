<!DOCTYPE html>
<html lang="en">
<?php include('head.php');?>
    <body>
	            <?php
		$msg="";
	    
		if(isset($_GET['delid'])!=""){
		     $delid = $_GET['delid']; 
      $pth = $_GET['pth']; 
	 //  $pgnamepth = '../'.$_GET['pagename']; 
	  
		$delsuccess = mysqli_query($conn,"delete from category where category_id='$delid'") or die(mysqli_error($conn));
		
			if($delsuccess){
				// unlink($pgnamepth);	
				unlink($pth);
              			
             $msg="<div class='alert alert-success'/>Category has been deleted!</div>";
			 //echo "<script>window.location.href='view_machine-group.php'</script>";
	  
		}else
		{
		$msg="<div class='alert alert-danger'/>Error! Please try again</div>";				
			
			
			}
			
		}
	   
		?> 
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                 <?php include('side-bar.php');?>
			</div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
           <?php include('nav-bar.php');?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Export</li>
                </ul>
               
                <div class="page-content-wrap">
               
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                  <div class="row well">
                  <div class="col-md-4" >
                      <a href="create-category.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b>Create Category</b></a>
                  </div>
				  <center><?php echo $msg; ?></center>
                  <div class="col-md-4"><h2><b>Create Details</b></h2></div>
                      <div class="pull-right">
                                       <button class="btn btn-danger btn-sm toggle" data-toggle="exportTable"><i class="fa fa-bars"></i> Export Data</button>
                                    </div>				  
                   </div>
                            
                                 
                                </div>
								   <div class="row"  id="exportTable" style="display: none;">
                                  
                                        <div class="col-md-6">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
												 <th>Sr No.</th>
                                                    <th>Category Name</th>
                                                  <!--  <th>Image</th> -->
                                                    <th>Date</th>
                                                   <th>Status</th>
													 <th>Edit</th>
													 
													 <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											 <?php 
										$sr=1;										
										$stmt = $conn->prepare("select category_id,category_name,status,category_image,created_date from category order by category_id desc");
											//$stmt->bind_param('s',$ststus);
											$stmt->execute();
											$result = $stmt->get_result();    
											if ($result->num_rows>0) {
											while ($arr_cat  = $result->fetch_assoc()){	
											 $status2= $arr_cat['status'];  
                                                                                        
                                       ?>
                                                <tr>
												<td><?php echo $sr++;?></td>
                                                       <td><?php echo $arr_cat['category_name'];?></td>
                                                  <!--  <td><img src="<?php echo $arr_cat['category_image'];?>" style="height:60px; width:60px;"></td>-->
                                                    <td><?php echo $arr_cat['created_date'];?></td>
                                                    <td>
                                                       														<?php
														if($arr_cat['status'] == 'active'){ $classcolor = "success"; $font = "fa fa-check";}
													    if($arr_cat['status'] == 'inactive'){ $classcolor = "danger"; $font = "fa fa-close";}
												
														?>
														 <button data-toggle="modal" data-target="#s<?= $arr_cat['a_id'];?>" class="btn btn-<?= $classcolor;?> btn-sm"><i class="<?= $font;?>"></i></button>
													
                                                     
                                                        </td>
                                             
                              <td><a href="edit-category.php?cid=<?php echo $arr_cat['category_id'];?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="View/ Update"> <i class="fa fa-pencil"></i></a>
                      </td>
					                        <td><a href="?delid=<?php echo $arr_cat['category_id'];?>&pth=<?php echo $arr_cat['category_image'];?>" class="btn btn-xs btn-danger btn-xs" data-toggle="tooltip" title="Delete"onclick="return confirm('Are you sure you want to Remove?');" ><i class="fa fa-trash"></i> </a></td>

                                                </tr>
                                               <?php } } ?>	
                                            </tbody>
                                        
										
										</table>                                    
                                    </div>
                                </div>
                            
							
							</div>
                          
                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php include('footer.php');?>                
    </body>

</html>







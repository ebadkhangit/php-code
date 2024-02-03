<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- HEAD BAR -->
<?php include_once('head.php');?>
<!-- END HEAD BAR -->
<body class="sidebar-fixed topnav-fixed ">
<!-- WRAPPER -->
<div id="wrapper" class="wrapper">
<!-- TOP BAR -->
<?php include_once('top_header.php');?>

<!-- END TOP BAR -->
<!-- LEFT SIDEBAR -->
<?php include_once('left_menu.php');?>
<!-- END LEFT SIDEBAR -->
<div id="main-content-wrapper" class="content-wrapper ">
    <!--<div class="col-md-12">			
				<ul class="breadcrumb">
				<li><i class="fa fa-home"></i>
			    <a href="dashboard.php">Home</a></li>							
				<li class="active"> View Patient Detail</li>
			  </ul>
			 </div>-->
	

<!-- main -->
<div class="content">
<div class="main-content">

<div class="col-sm-12 well">

  				           <form method="post" >   
                                   <div class="form-group col-sm-3"> <label>From Date</label>                                    
                                        <input type="date" class="form-control" name="dtFrom" required />                                       
                                    </div>
                                                   
                                     <div class="form-group col-sm-3"> <label>To Date</label>                                    
                                        <input type="date" class="form-control" name="dtTo" required />                                       
                                    </div>
                                    
                                     <div class="form-group col-sm-1" style="margin-top:5px;"><br>                               
                                      <button type="submit" name="search" class="btn btn-effect-ripple btn-primary">Submit</button>
                                    </div>                                  
                                      
                           </form>   
                           
                            <form method="post" >   
                                   <div class="form-group col-sm-4"> <label>Search By Name</label>                                    
                                        <input type="text" class="form-control" name="searchPname" placeholder="Enter: Patient Id, Patien Name, Dr Name" required />                                       
                                    </div>
                                                   
                                  
                                     <div class="form-group col-sm-1" style="margin-top:5px;"><br>                               
                                      <button type="submit" name="searchByName" class="btn btn-effect-ripple btn-primary"><i class="fa fa-search"></i></button>
                                    </div>                                  
                                      
                           </form>          
                                    
                                 
</div> 


         <div class="col-md-12">
         <center><?php echo $message; ?></center>
        			  


<!-- FEATURED DATA TABLE -->
<div class="widget widget-table">						
<div class="widget-header">
									    <div class="row">
										<div class="col-sm-4"><h3><a href="add-patient-detail.php" class="btn btn-primary btn-xs"> <i class="fa fa-plus-circle"></i>Add New Case</a></h3> </div>
										</div>
								        </div>
								
							<div class="widget-content" style="overflow:auto;">
							<table id="ticket-table2" class="table table-sorting table-striped table-hover table-responsive" >
								<thead>
									<tr>
										<th>Sr.No.</th>
										
										<th>Patient Id</th>
										<th>Name</th>										
										
										<th>Doctor</th>
										<!--<th>Gender</th>
										<th>Treatment For</th>
										<th>City</th>
										<th>Status</th>	-->
										<th>Case Date</th>									
										<th>Review</th>
										<th>Reply</th>
										<th>Upload</th>
										<th>Treatment Status</th>
										<th colspan="3"><center>All Files </center></th>
									
										
																					
                                     </tr>
								</thead>
								<tbody>
<?php
$search="";
$searchByName="";
										if(isset($_POST['search'])){
										        extract($_POST); 
										     $search = 1;
										    
$qry = mysqli_query($conn, "select patient_id,patient_createid,patient_name,patient_age,patient_gender,treatment_for,patient_city,case_status,doctor_name,case_submit_dt from patient_detail where  case_submit_dt BETWEEN '$dtFrom' AND '$dtTo' and case_status !='3' order by patient_id desc");						
											 }
											 
											 	if(isset($_POST['searchByName'])){
										        extract($_POST); 
										     $searchByName = 1;
										   $searchPname = trim(ucwords(strtolower($searchPname)));
$qry = mysqli_query($conn, "select patient_id,patient_createid,patient_name,patient_age,patient_gender,treatment_for,patient_city,case_status,doctor_name,case_submit_dt from patient_detail where patient_name like '$searchPname%' or patient_createid like '%$searchPname%' or doctor_name like '%$searchPname%' ") or die(mysqli_error($conn));						
											 }
											
											
if($search =="" and $searchByName==""){					            
 							              
$qry = mysqli_query($conn, "select patient_id,patient_createid,patient_name,patient_age,patient_gender,treatment_for,patient_city,case_status,doctor_name,case_submit_dt from patient_detail where case_status !='3'  order by patient_id desc limit 0,25");
}

$sr=1;	
								
while($ary = mysqli_fetch_array($qry)){

$qry_file = mysqli_query($conn, "select * from patient_files  where patient_id='".$ary['patient_id']."' and file_type='Video' order by doc_id desc limit 1");									
$ary_file = mysqli_fetch_array($qry_file );
?>
	
	<tr>
	<td><?php echo $sr++; ?></td>
	
	<td><?php echo $ary['patient_createid']; ?></td> 
	<td><?php echo $ary['patient_name']; ?></td> 
	<!--<td><?php echo $ary['patient_age']; ?></td>-->
	<td><?php echo $ary['doctor_name']; ?></td>
	<!--<td><?php echo $ary['patient_gender']; ?></td>
	<td><?php echo $ary['treatment_for']; ?></td>
	<td><?php echo $ary['patient_city']; ?></td>  -->
	<td><?php echo $ary['case_submit_dt']; ?></td> 
	<!--<td>
<?php if($ary['case_status']==1){ ?>
<a href="#" class="btn btn-success btn-xs" data-toggle="tooltip-case-uncomp" title="Case complete"></i> <i class="fa fa-check "></i></a>
<?php }else{?>
<a href="#" class="btn btn-info btn-xs" data-toggle="tooltip-case-comp" title="Case in process"><i class="fa fa-spinner"></i> </a>
<?php } ?>
</td>-->

	
	
	<td><div class="col-md-2"><a href="preview.php?id=<?php echo base64_encode($ary['patient_id']); ?>" class="btn btn-warning btn-xs" data-toggle="tooltip-edit" title="View / Update Case"><i class="fa fa-eye"></i> <i class="fa fa-pencil"></i></a></div></td>
	
	<td><a href="add-comment.php?pid=<?php echo base64_encode($ary['patient_id']); ?>&pnm=<?php echo base64_encode($ary['patient_name']); ?>" class="btn btn-primary btn-xs" data-toggle="tooltip-edit" title="Comment"> Comment</a>
	</td>
	
	<td>	
	<a href="upload-doc.php?ptid=<?php echo base64_encode($ary['patient_id']); ?>" class="btn btn-info btn-xs" data-toggle="tooltip-edit" title="uplode Video,Files"><i class="fa fa-file"></i> Upload </a>	
	</td>
	
	<!-- Uplode file operation-->
	
	
	<td>
	<?php if($ary_file['file_path']!="" and $ary_file['created_byid'] == $login_user_id){ ?>
<?php if($ary_file['doc_status']==1 ){ ?>
<a href="#" class="btn btn-success btn-xs" data-toggle="tooltip-case-uncomp" title="Video Approved"></i> <i class="fa fa-check "></i></a>
<?php }else if($ary_file['doc_status']==2){ ?>
<a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip-case-uncomp" title="Video Disapproved"></i> <i class="fa fa-close"></i></a>
<?php }else{?>
<a href="#" class="btn btn-info btn-xs" data-toggle="tooltip-case-comp" title="Video in process"><i class="fa fa-spinner"></i> </a>
<?php } ?>

<?php } ?>

</td>




<td>
<?php
$qry_doc = mysqli_query($conn, "select file_path from patient_files  where patient_id='".$ary['patient_id']."' ");									
$ary_doc = mysqli_fetch_array($qry_doc);
?>
<?php if($ary_doc['file_path']!=""){ ?>
<a href="view-files.php?ptid=<?php echo base64_encode($ary['patient_id']); ?>" class="btn btn-success btn-xs" data-toggle="tooltip-edit" title="uplode Video,Files">View All <i class="fa fa-file"></i></a>
<?php } ?>
 </td>	
 
	
	
	
	
	
	</tr>
	<?php
}
?>                                                
								</tbody>
							</table>
						</div>
					</div>
					<!-- END FEATURED DATA TABLE -->
				
				</div>
			</div>
			<!-- /main -->
			<!-- FOOTER -->
		
			<!-- END FOOTER -->
		</div>
		<!-- END CONTENT WRAPPER -->
	</div>
	<!-- END WRAPPER -->

	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.js"></script>
	<script src="assets/js/plugins/modernizr/modernizr.js"></script>
	<script src="assets/js/plugins/bootstrap-tour/bootstrap-tour.custom.js"></script>
	<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/king-common.js"></script>
	<script src="demo-style-switcher/assets/js/deliswitch.js"></script>
	<script src="assets/js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="assets/js/plugins/datatable/exts/dataTables.colVis.bootstrap.js"></script>
	<script src="assets/js/plugins/datatable/exts/dataTables.colReorder.min.js"></script>
	<script src="assets/js/plugins/datatable/exts/dataTables.tableTools.min.js"></script>
	<script src="assets/js/plugins/datatable/dataTables.bootstrap.js"></script>
	<script src="assets/js/plugins/jqgrid/jquery.jqGrid.min.js"></script>
	<script src="assets/js/plugins/jqgrid/i18n/grid.locale-en.js"></script>
	<script src="assets/js/plugins/jqgrid/jquery.jqGrid.fluid.js"></script>
	<script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/js/king-table.js"></script>
</body>
</html>

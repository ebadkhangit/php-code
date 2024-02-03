<?php 
include('db/config.php');
				  $getloc= $_GET['mailid'];
				
			
				if($getloc!=""){
					$run= mysqli_query($conn,"insert into popup_mail (mailid) values('$getloc')");
					 } 
					// echo "success";
					 ?>
					
					

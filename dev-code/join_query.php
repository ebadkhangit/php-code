		<?php include("../db/connection.php"); ?>
			<?php
			// assign tasl mail shoot at completion date ----------------------------------------------------------------------------------------
			$hostname = $_SERVER['HTTP_HOST'];
        	$to = "tsc2001@gmail.com";	
        	$sub="Assign Task";		
	
			$cleanedFrom="$hostname";			
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: tsc2001@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$messageinfo="welcome $hostname";			
			$headersinfo ="From: " . $cleanedFrom . "\r\n";
			
								$sr = 1;
								$currentdt = date('Y-m-d');
								$qry = "select a.assign_title,a.assign_detail,a.assign_complition_dt,b.display_name as qc_name,b.user_email as qc_mail,c.company_name as supp_name,c.email as supp_email 
								from assign_task as a,user_login as b,company_master as c
								where a.qc=b.user_id and a.supplier=c.company_id and a.assign_complition_dt='$currentdt'
								";
								$run = mysqli_query($con,$qry);
								while($data=mysqli_fetch_array($run))
										{ 
        									    $qcmail=$data['qc_mail'];
        										$suppliermail= $data['supp_email'];
                                                									
        				                        // qc mail
        										if($qcmail!="")
        										{
    $message = "<table width='100%'  style='background-color:#eee;'><tr><td><center><table border='1px' width='60%' style='border 1px solid red; background-color:#fff;'><tr style=' background:#822032;width:100%;'><td style='color:#fff;padding:5px;'><center><img src='http://sunerp.net/img/logo.png' class='img-responsive' style='height:40px;'></center></td></tr><tr style='background-color:#fff;'><td style='padding-left:15px;'>
	 <p>Dear: <strong>:
	".$data['qc_name']." , </strong></p><p>  Assign Task Title: ".$data['assign_title']." </p><p> Assign Task detail: ".$data['assign_detail']." </p><p> Completed date: ".$data['assign_complition_dt']." </p>
	</p><p>For any queries, please have a look at our Login dashboard of $hostname .</p><p><br>Best Regards,</p><p>Team $hostname</p></td></tr>
	<tr style='background-color:#fff;'><td><hr><center><i>Copyright© 2018 ".$hostname." All rights reserved</i></center><hr></td></tr>
	</table></td></tr></table>
	" ;	
	mail($qcmail,$sub,$message,$headers);      				  
        										}
                        				        // qc supplier
                        					    if($suppliermail!="")
                        					    {
    $message = "<table width='100%'  style='background-color:#eee;'><tr><td><center><table border='1px' width='60%' style='border 1px solid red; background-color:#fff;'><tr style=' background:#822032;width:100%;'><td style='color:#fff;padding:5px;'><center><img src='http://sunerp.net/img/logo.png' class='img-responsive' style='height:40px;'></center></td></tr><tr style='background-color:#fff;'><td style='padding-left:15px;'>
	 <p>Dear: <strong>:
	".$data['supp_name']." , </strong></p><p>  Assign Task Title: ".$data['assign_title']." </p><p> Assign Task detail: ".$data['assign_detail']." </p><p> Completed date: ".$data['assign_complition_dt']." </p>
	</p><p>For any queries, please have a look at our Login dashboard of $hostname .</p><p><br>Best Regards,</p><p>Team $hostname</p></td></tr>
	<tr style='background-color:#fff;'><td><hr><center><i>Copyright© 2018 ".$hostname." All rights reserved</i></center><hr></td></tr>
	</table></td></tr></table>
	" ;	
	mail($suppliermail,$sub,$message,$headers);
                                                }

									   }
									
										?>	
<?php
    $hostname = $_SERVER['HTTP_HOST'];
	$to = "tsc2001@gmail.com";	
	$sub="production approval inspection date";		
	
			$cleanedFrom="$hostname";			
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: tsc2001@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$messageinfo="welcome $hostname";			
			$headersinfo ="From: " . $cleanedFrom . "\r\n";
			
		$message = "<table width='100%'  style='background-color:#eee;'><tr><td><center><table border='1px' width='60%' style='border 1px solid red; background-color:#fff;'><tr style=' background:#822032;width:100%;'><td style='color:#fff;padding:5px;'><center><img src='http://sunerp.net/img/logo.png' class='img-responsive' style='height:40px;'></center></td></tr><tr style='background-color:#fff;'><td style='padding-left:15px;'>
	 <p>Dear: <strong>:
	Pushkar , </strong></p><p>  Customer: ".$ary['company_name']." </p><p> PO/PI: ".$ary['po_number']." </p><p> Supplier: ".$ary['supplier_name']." </p><p> Planned MID Line Inspection Date  is Due on: ".$ary['plan_product_approval_insp_dt']."
	</p><p>For any queries, please have a look at our Login dashboard of $hostname .</p><p><br>Best Regards,</p><p>Team $hostname</p></td></tr>
	<tr style='background-color:#fff;'><td><hr><center><i>Copyright© 2018 ".$hostname." All rights reserved</i></center><hr></td></tr>
	</table></td></tr></table>
	" ;	
	mail($to,$sub,$message,$headers);
?>
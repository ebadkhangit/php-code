<?php
$hostname= $_SERVER['HTTP_HOST'];
		$pass = base64_decode($arrlogin['user_password']);	
		$display_name = $arrlogin['display_name'];
		//$userEmail=$arrlogin['user_emailid'];			
		$headers = "From: $display_name<$username>";
		
		$subject ="Forget Password";
			$cleanedFrom="$hostname";			
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: info@$hostname\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$messageinfo="welcome $hostname";			
			$headersinfo ="From: " . $cleanedFrom . "\r\n";	
			
			$message = "<p>Dear <strong> $display_name </strong>,</p> <p>Thanks for contacting us .</p> <p>Your password is :$pass.</p> \n\n \n\n \n\n \n\n <p><strong>Please do not reply to this email.</strong></p>\n\n $hostname";
			
	        if(mail($username, $subject, $message, $headers)){	   
	        $error = "Thank You, check your email address.";	    
	        
	        }


			$subject ="Your login detail";
			$cleanedFrom="$hostname";			
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: info@$hostname\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$messageinfo="welcome $hostname";			
			$headersinfo ="From: " . $cleanedFrom . "\r\n";		
                 
          		$message = "Dear $displayName, \n\n Username.: $userName \n\n Password: $password \n\n Date: $dates \n\n $hostname";
	
    	mail($email, $subject, $message, $headers);
    	echo "<script>alert('Your login detail has been send your mail address.')</script>";
		
		
		
		// mail formate in table data
			  $message ="";						
			$message .= "<center><table width='90%' border='1px' style=' background:#fff;margin-top:5px;'><tr><td><center>  
  
<table style='width:95%'>
<tr><td style='width:40%'><img src='http://$hostname/im/veggietub.png' alt='$hostname' id='logo' style='height:100px;width:100px;'></td>
<td style='color:#0cb7c1;text-align:right;width:60%;padding-top:40px;'>Your Orders | $hostname</td></tr>

<tr style='background-color:#f2f2f2;'>
<td style='font-size:14px;text-align:left;'>

		 ".$street.", ".$city.",<br>
		 (" . $state. "), $country<br>
		 Pin Code:  ".$postCode." <br>
		 Email:  ".$email." <br>Mobile No.:  ".$mobile."		
</td>
<td style='text-align:right;'><b>Shipment Tracking &nbsp;&nbsp;</b><br>Order id: <span style='color:#0cb7c1'>".$orderno." &nbsp;&nbsp;</span></td>
</tr>

</table>

<table style='width:95%'>
<tr><td id='username'><b><br><br>Hello ".$fName.' '.$lName.",</b></td></tr>
<tr><td style='color:#a50598;padding-top:4px;font-size:14px;'> Thanks for order, our sales team will get back to you. <br></td></tr>

</table></table>"; 
		
		   $message .= "<br><table width='95%;'>   
    <tbody>
		  		
    		   		
    		<tr><td><br><b>With Sincere Regards,</b></tr>
    		<tr><td> info@$hostname</tr> 
        	<td>We hope to see you again soon!</td>
		<tr><td style='color:#000; font-weight:600;'>www.$hostname</td></tr> 	  
    </tbody>
  </table><br><br>
 
</div>";
		
		?>
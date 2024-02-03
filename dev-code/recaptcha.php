
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

		// recaptcha code
		$secret="6LdYL4QUAAAAAMCjMF2JLLpCLYfl_WjG7ifberkc";
		$ip=$_SERVER['REMOTE_ADDR'];
		$captcha=$_POST['g-recaptcha-response'];
		$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
		$arrdata=json_decode($rsp,TRUE);
		//print_r($arrdata);
		//print_r($_POST);
		if($arrdata['Success']){
		echo "done";
		}else{
		echo "error";
		}
		    		<?php
if(isset($_POST['submit'])){
    
 $secretkey ="6LfQLo8UAAAAAD4zL2vmh46hrRuac1rOGdhQR9kl";
 $captcha = $_POST['g-recaptcha-response'];
 $userIP = $_SERVER['REMOTE_ADDR'];  
$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$userIP");

    $response = file_get_contents($url);
    $response = json_decode($rsp,true);
    
print_r($response);
 //die();
    
    if($response['success']==1){
        
    // header("location:index.php?msg=suc");
    } else {
      
    //header("location:index.php?msg=err");

    }
}

?>
		
	
	<form method="post">
	<div class="g-recaptcha" data-sitekey="6LdYL4QUAAAAAJ8jdtsPVJ_nz2Vc7CVV-xmXUPpp"></div>
	 <button id="Submit" type="submit" name="submit" class="btn btn-info">Submit</button>
	</form>
	
		
	
	
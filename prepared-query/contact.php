<!DOCTYPE html>
<html lang="en">
<?php
session_start();
	//$_SESSION['login_user_id']; // Initializing Session

 include_once('db/config.php'); 
  date_default_timezone_set('Asia/Kolkata');
     $currentDateTime = date( 'd-m-Y h:i:s A', time () );
	 ?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  
      <!-- page title -->
      <title>Best Attar,Perfume,Oil,Candle Manufactrurer and Supplier In india</title>
        <meta name="author" content=" Shifaindia Laboratories Pvt.Ltd">
      <meta name="description" content="Best Perfume Seller in India,Best Aattar Manufacturer and Supplier in India ">
      <meta name="keywords" content="Perfume,Attar,Oil,Candle,Synthetic Attar">
	  <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
      <meta property="og:image:type" content="image/webp">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<link rel="canonical" href="http://naturalfragrance.in/index.php">
<meta property="og:url" content="http://naturalfragrance.in/index.php">
<meta property="og:site_name" content="Natural Fragrance">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="400">
      <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
      <![endif]-->
      <!-- Font files -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i%7CMuli:400,700%7C&display=swap" rel="stylesheet">
      <link href="fonts/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- style CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- plugins CSS -->
      <link href="css/plugins.css" rel="stylesheet">
      <!-- Colors CSS -->
      <link href="styles/maincolors.css" rel="stylesheet">
      <!-- Prefix free -->
      <script src="js/prefixfree.min.js"></script>
	   <!-- Switcher Only -->
     <!-- <link rel="stylesheet" id="switcher-css" type="text/css" href="switcher/css/switcher.css" media="all" >-->
      <!-- END Switcher Styles -->
     <script src='https://www.google.com/recaptcha/api.js'></script>

   </head>
   <!-- ==== body starts ==== -->
   <body id="top">
    <!-- Start Switcher -->
   
      <!-- end demo_changer -->
      <!-- Preloader -->
     
      <!-- ===== Page Content ===== -->
      <div class="container-fluid">
         <!-- ===== Sidebar starts ===== -->
       <?php include('side-bar.php');?>
         <!-- ===== / sidebar ends ===== -->
        <!-- ===== / sidebar ends ===== -->
<div id="content" class="col-lg-10 split">
    <?php include('top-bar.php');?>


<!-- =====  page starts  ===== -->
<div class="content-wrapper">
<!-- page header -->
<div class="bg-overlay1 container-fluid border-bottom" >
   <div class="col-xl-6 offset-xl-3">
      <h1>Contact</h1>
      <!-- /breadcrumb -->
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
     
         </ol>
      </nav>
      <!-- /breadcrumb -->
   </div>
   <!-- /col-xl -->
</div>
<!-- /page-header ends -->
<div class="content-box container">
<!-- section -->
<?php
$msg="";										  
											  
if(isset($_POST['submit'])){
    
   
       
    $secretkey ="6Lc38TMoAAAAABCCRAawwCeGz0bihaKtO7UpE9-C";
 $captcha = $_POST['g-recaptcha-response'];
 $userIP = $_SERVER['REMOTE_ADDR'];  
$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$userIP");

    $response = file_get_contents($url);
    $response = json_decode($rsp,true);
    
// print_r($response);
 //die();
    
    if($response['success']){ 
    
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$subject = $_POST['subject'];
	$email = $_POST['email'];
	$mobile = $_POST['phone'];
	$message = $_POST['message'];

$headers = "From: $name<$user>";
       $sql="INSERT INTO contact_enquiry(first_name,last_name,email,mobile,subject,message,created_date) VALUES('$fname','$lname','$email','$mobile','$subject','$message','$currentDateTime')";  
       $result=mysqli_query($conn,$sql); 
	   
     $hostname = $_SERVER['HTTP_HOST'];
	$to = "ebadullah76@gmail.com";	
	$sub="User Contact Information";	
		
	

	
			$cleanedFrom="$hostname";			
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: . $email .\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$messageinfo="welcome $hostname";			
			$headersinfo ="From: " . $cleanedFrom . "\r\n";
		   $referer = $_SERVER['HTTP_REFERER'];
			
		$message = "<table width='100%'  style='background-color:#eee;'><tr><td><center><table border='1px' width='60%' style='border 1px solid red; background-color:#fff;'><tr style=' background:#822032;width:100%;'><td style='color:#fff;padding:5px;'><center><img src='https://naturalfragrance.in/img/logo.png class='img-responsive' style='height:40px;'></center></td></tr><tr style='background-color:#fff;'><td style='padding-left:15px;'>
	 <p>User Name: <strong>:
	".$fname.''.$lname."  , </strong></p><p>  User Email: ".$email." </p><p> User Mobile: ".$mobile." </p><p> Message: ".$message." </p><p> Message: ".$subject." </p><p><br>Best Regards,</p><p>Team $hostname</p></td></tr>
	<tr style='background-color:#fff;'><td><hr><center><i>Copyright© 2018 ".$hostname." All rights reserved</i></center><hr></td></tr>
	</table></td></tr></table>
	" ;	
	$message1 = "<table width='100%'  style='background-color:#eee;'>
	<tr>
	<td><center><table border='1px' width='60%' style='border 1px solid red; background-color:#fff;'>
	<tr style=' background:#fff;width:100%;'><td style='color:#fff;padding:5px;'><center><img src=https://naturalfragrance.in/img/logo.png' class='img-responsive' style='height:40px;'></center>
	</td>
	</tr>
	<tr style='background-color:#fff;'><td style='padding-left:15px;'>
	 <p>Dear: <strong>:
	".$fname.''.$fname.", </strong>
	</p><p>Thanks for Contacting Us:</p>
	<p>Our Team Will Contact You Shortly</p>
	<p><br>Best Regards,</p><p>Team $hostname</p>
	
	</td>
	</tr>
	<tr style='background-color:#fff;'><td><hr><center><i>Copyright© 2018 ".$hostname." All rights reserved</i></center><hr>
	</td>
	</tr>
	</table></td></tr></table>
	" ;
	   mail($email,$sub,$message1,$headers);
	
	
		if(mail($to,$sub,$message,$headers)){
		echo "<script>alert('Your Message has been successfully Send')</script>";
		
	}
	else{
			echo "<script>alert('Mail Failed')</script>";
	}
			$msg = "<div class='alert alert-success'>Your contact enquiry has been sent!</div>";
		} else {
			$msg =  "<div class='alert alert-danger'>Please select captcha!</div>";
		}

}

?>
<section class="inside-wrapper container">
   <div class="row h-10">
      <div class="col-xl-6">
              <center><?php echo $msg;?></center>
         <span class="sub-header">contact</span>
          
         <h2>Get in Touch
         </h2>
         <p class="mb-5">We pay attention to every little detail to make your visit comfortable, so please get in touch to Order the Products that feel right for you.</p>
         <div class="col-md-12 text-lg-start text-center">
            <div class="contact-icon my-auto">
               <div class="contact-icon-info">
                  <!---icon-->
                  <div class="top-icon">
                     <i class="fa fa- fa-envelope"></i>
                  </div>
                  <h6 class="mb-0">Email</h6>
                  <p class="mb-0">Email address: <a href="mailto:info@naturalfragrance.in">info@naturalfragrance.in</a></p>
               </div>
            </div>
            <!-- /contact-icon-->
         </div>
         <!-- /col-md-->
         <div class="col-md-12 mt-4 my-auto text-lg-start text-center">
            <div class="contact-icon my-auto">
               <div class="contact-icon-info">
                  <!---icon-->
                  <div class="top-icon">
                     <i class="fa fa-phone"></i>
                  </div>
                  <h6 class="mb-0">Phone</h6>
                  <p class="mb-0">Number: <a href="tel:+91-9999693322">+91-9999693322</a></p>
               </div>
            </div>
            <!-- /contact-icon-->
         </div>
         <!-- /col-md-->
         <div class="col-md-12 mt-4 my-auto text-lg-start text-center">
            <div class="contact-icon my-auto">
               <div class="contact-icon-info ">
                  <!---icon-->
                  <div class="top-icon">
                     <i class="fa fa-map-marker"></i>
                  </div>
                  <h6 class="mb-0">Address</h6>
                  <p class="mb-0">B-44,Sector-4 Noida U.P</p>
               </div>
            </div>
            <!-- /contact-icon-->
         </div>
         <!-- /col-md-->
      </div>
      <!-- /col-xl-->
      <div class="offset-xl-1 col-xl-5 res-mt-5 my-auto">
         <h4 class="mb-5">Send us a Message</h4>
         <!-- contact info -->
         <div class="contact-info">
            <div id="error-message"></div>
            <!-- Form Starts -->
            <form method="post">
            <div id="contact_form">
               <div class="form-group">
                  <!-- row -->
                  <div class="col-md-12">
                     <div class="col-md-12 mt-4">
                        <input type="text" name="fname" class="form-control input-field" onkeypress="return checkNum(event)" placeholder="First Name*" required=""> 
                     </div>
                       <div class="col-md-12 mt-4">
                        <input type="text" name="lname" class="form-control input-field" onkeypress="return checkNum(event)" placeholder="Last Name*" required=""> 
                     </div>
                     <div class="col-md-12 mt-4">
                        <input type="email" name="email" class="form-control input-field" pattern="[^@\s]+@[^@\s]+" title="Invalid email address is valid@email.com" placeholder="Email*" required=""> 
                     </div>
                     <div class="col-md-12 mt-4">
                        <input type="tel" name="phone" class="form-control input-field" onkeypress="return isNumber()" maxlength="10" placeholder="Phone"> 
                     </div>
                     <div class="col-md-12 mt-4">
                        <input type="text" name="subject" class="form-control input-field" placeholder="Subject"> 
                     </div>
                     <div class="col-md-12 mt-4">
                        <textarea name="message" id="message" placeholder="Your Message*" class="textarea-field form-control" rows="3"  required=""></textarea>
                     </div>
                  </div>
                  <!-- /row -->
                 <div class="g-recaptcha" data-sitekey="6Lc38TMoAAAAADZz8Mmn2xcFIEu65-JqaSbFyt6P"></div>

                  <button type="submit" name="submit" id="submit_btn" value="Submit" class="btn btn-primary mt-4">Send message</button>
               </div>
               <!-- Contact results -->
               <div id="contact_results"></div>
            </div>
            </form>
            <!-- /contact-form -->
         </div>
         <!-- /contact-info -->
      </div>
      <!-- /offset-col-->
   </div>
   <!-- /row-->
   <div class="col-xl-12">
         <!-- map-->
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.5580705888665!2d77.32232937540988!3d28.583030386327067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce554e8b2f6cb%3A0x915f57c697c179b1!2sNatural%20Fragrance.in!5e0!3m2!1sen!2sin!4v1706336951172!5m2!1sen!2sin" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
</section>
   <div class="sect-2" style="padding:20px; border:2px solid #4e4949; border-radius:10px;">
<div class='sk-ww-google-reviews' data-embed-id='25354256'></div><script src='https://widgets.sociablekit.com/google-reviews/widget.js' async defer></script>
       
   </div>
   

<!-- /section ends -->
<!-- map -->
<?php include('footer.php');?>

<!-- /col-md --><!-- Credits -->
<div class="credits text-center p-3 pt-0">
   <!-- Logo -->
   <div class="brand">
      <a href="index.php">
      <img src="img/logo.png" alt="" class="img-fluid center-block" >
      </a>
   </div>
   <!-- /logo -->
  <p class="mt-3">All Rights reserved / Natural Fragrance - Owned by <a href="http://shifaindia.com/">Shifa Laboratories Pvt.Ltd.</a></p>  
               </div>
               <!-- /credits -->
            </div>
            <!-- /content-box -->
			</div>
            <!-- /content-wrapper -->
         </div>
         <!-- / content -->
 
     </div>

<div class="d-none d-lg-block d-xl-block">
   <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Bootstrap core & Jquery -->
<script  defer src="vendor/jquery/jquery.min.js"></script>
<script defer src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom Js -->
<script defer src="js/custom.js"></script>	  
<script defer src="js/plugins.js"></script>
<script defer src="js/animations.js"></script>	  

<!-- Bootstrap Select Tool (For Module #4) -->
<!--<script src="switcher/js/bootstrap-select.js"></script>-->
<!-- All Scripts & Plugins -->
<!--<script src="switcher/js/dmss.js"></script>-->
<script  defer src="preview/prevjs.js"></script><!-- Open Street maps -->
<!--<script src="js/map.js"></script>-->

        <script>
   // only accept number
      function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        alert("Please enter only 10 digit number");
        return false;
    }
    return true;
}

  
      // only accept char
      function checkNum()
{
var ch = String.fromCharCode(event.keyCode);
     var filter = /[a-zA-Z ]/   ;
     if(!filter.test(ch)){
         alert("Please enter only char");
          event.returnValue = false;
     }
    


}


 function phoneno(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
    </script>
</body>
</html>
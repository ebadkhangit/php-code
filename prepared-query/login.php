<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include_once('db/config.php'); 
$currentDate = date('d-m-Y');
?>
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i%7CMuli:400,700%7C&display=swap" rel="stylesheet">
      <link href="fonts/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- style CSS -->
      <link href="css/style.css" rel="stylesheet">
    
      <!-- Colors CSS -->
      <link href="styles/maincolors.css" rel="stylesheet">
      <!-- Prefix free -->
   
<!------ Include the above in your HEAD tag ---------->
	
<title> Home</title>

 <style>
 .divcenter {

  position: absolute;
top: 50%;
    width: 300px;
    height: 300px;
    left: 50%;
    margin-top: 0px;
    margin-left: 0px;

   height:auto;
  transform: translate(-50%, -50%);
  padding:20px 20px;
  background-color:#403d3d;
  border:2px solid #eeee;
 }
position: absolute;

    width: 300px;
    height: 300px;

    /* Center form on page horizontally & vertically */
    top: 50%;
    left: 50%;
    margin-top: -150px;
    margin-left: -150px;

</style>
</head>
<body>


<div class="container">

    	<div class="divcenter row">
	
<h4>Login</h4>
 <?php

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=stripslashes(trim($_POST['username']));
$password=stripslashes(trim($_POST['password']));
$hasPass = base64_encode(stripslashes($password));
 //$hasPass = sha1($password);
//$input = base64_decode('cHJlcm5hQDEyMw==');
//$input_encoding = 'iso-2022-jp';
//echo iconv($input_encoding, 'UTF-8', $input);
//die();
$stmt = $conn->prepare("SELECT * FROM user_login WHERE user_password = ? AND user_name = ? ");
$stmt->bind_param("ss", $hasPass,$username);
 $stmt->execute();
$result = $stmt->get_result();
 //print_r($result); 
//die(); 

if ($result->num_rows > 0) {
$arrlogin = $result->fetch_assoc();
$_SESSION['login_userid']=$arrlogin['user_id']; // Initializing Session
$_SESSION['login_user_name']=$arrlogin['user_name'];
$_SESSION['login_display_name']=$arrlogin['display_name'];
$_SESSION['user_emailid']=$arrlogin['user_emailid'];
$_SESSION['user_type']=$arrlogin['user_type'];

if($arrlogin['user_type']=='0'){
$url = "index.php";
 echo "<script>window.location.href='".$url."'</script>"; // Redirecting To Other Page
 }else if($arrlogin['user_type']=='1'){
 $url = "login.php";
 echo "<script>window.location.href='".$url."'</script>";
 }
 
 
} else {
$error = "Username or Password is invalid";
}
  // Free result set
  $stmt->close();

}
}
//mysqli_close($conn); // Closing Connection
    $conn->close();
?>


                <div class="col-lg-12">
                    
                        <form method ="post">
									<div class="form-group">
										<input class="form-control" type="text" name="username" id="username" placeholder="User Name" onkeypress="return checkNum(event)" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password"  id="password" placeholder="Password" required>
									</div>
									<div class="form-group">
										<button name ="submit" class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
									</div>
								</form> 
										           	<div class="row">
						<p>Don't have an account? <a href="register.php">Register Here</a></p>
						<a href="index.php" class="btn btn-primary">Back</a>
					</div>
                   
                    </div>
              
       
            
      
	</div>
		</div>
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
         alert("Please enter only character");
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
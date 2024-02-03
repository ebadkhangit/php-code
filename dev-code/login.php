<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

	<!-- HEAD BAR -->
	<?php include_once('admin/head.php');?>
		<!-- END HEAD BAR -->
<body>
<script></script>
    <?php include_once 'db/config.php';?>
     <?php include_once 'fblogin/fbconfig.php';?>
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=trim($_POST['username']);
$password=trim($_POST['password']);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = base64_encode(stripslashes($password));
$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

// Selecting Database
//$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query_login = mysqli_query($conn,"select * from user_login where user_password='$password' AND user_name='$username'");
$rows = mysqli_num_rows($query_login);
$arrlogin = mysqli_fetch_array($query_login);
$user_type = $arrlogin['user_type'];
if ($rows == 1) {
	if($user_type=='1'){
		$_SESSION['login_user_id']=$arrlogin['user_id']; // Initializing Session
	$_SESSION['login_user_name']=$arrlogin['user_name'];
	$_SESSION['login_user_displauname']=$arrlogin['display_name'];
	$url = "admin/dashboard.php";
	 echo "<script>window.location.href='".$url."'</script>"; // Redirecting To Other Page
	 }else if($user_type=='2'){
		$_SESSION['login_user_id']=$arrlogin['user_id']; // Initializing Session
	$_SESSION['login_user_name']=$arrlogin['user_name'];
	$_SESSION['login_user_displauname']=$arrlogin['display_name'];
	$url = "subadmin/dashboard.php";
	 echo "<script>window.location.href='".$url."'</script>"; // Redirecting To Other Page
	 } 
	 else{	
	$_SESSION['login_user_id']=$arrlogin['user_id']; // Initializing Session
	$_SESSION['login_user_name']=$arrlogin['user_name'];
	$_SESSION['login_user_displauname']=$arrlogin['display_name'];
	$url = "index.php";
	 echo "<script>window.location.href='".$url."'</script>"; // Redirecting To Other Page
	 }
} else {
$error = "Username or Password is invalid";
}
  // Free result set
  mysqli_free_result($query_login);

}
}
mysqli_close($conn); // Closing Connection
?>
	<div class="wrapper full-page-wrapper page-auth page-login text-center" style="margin-top: -50px;">
		<div class="inner-page">
			<div class="logo">
				<a href="index.php"><img src="assets/img/logo.png" alt="Q4home" /></a>
			</div>                    
                        
			
<a href="<?php echo htmlspecialchars($loginUrl) ?>"  class="btn btn-auth-facebook"><span>Login via Facebook</span></a>
			<div class="separator"><span>OR</span></div>
			<div class="login-box center-block">
                                   <?php if($error!=""){?>
                                    <div class="alert alert-danger">
                                        <center><b><?php echo $error;?></b></center>				
                                    </div>
                                   <?php } ?>
				<form class="form-horizontal" role="form" method="post">
					<p class="title">Use your username</p>
					<div class="form-group">
						<label for="username" class="control-label sr-only">Username</label>
						<div class="col-sm-12">
							<div class="input-group">
                                                            <input type="text" name="username" id="username" placeholder="username" id="username" class="form-control" autofocus>
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
							</div>
						</div>
					</div>
					<label for="password" class="control-label sr-only">Password</label>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
                                                            <input type="password" name="password" placeholder="password" id="password" class="form-control">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							</div>
						</div>
					</div>
					<!--<label class="fancy-checkbox">
						<input type="checkbox">
						<span>Remember me next time</span>
					</label>-->
                                        <button type="submit" name="submit" class="btn btn-custom-primary btn-lg btn-block btn-auth"><i class="fa fa-arrow-circle-o-right"></i> Login</button>
				</form>
				<div class="links">
					<p><a href="forget-password.php">Forgot Username or Password?</a></p>
					<!--<p><a href="#">Create New Account</a></p>-->
				</div>
			</div>
		</div>
	</div>

	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.js"></script>
	<script src="assets/js/plugins/modernizr/modernizr.js"></script>
	
	<!--Login with facebook code-->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{1867561280208420}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

</body>

</html>

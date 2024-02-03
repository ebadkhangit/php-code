<?php  
session_start(); 
if(isset($_SESSION['id']))
{  
 $id = $_SESSION['id'];
 $name = $_SESSION['name'];  
}else{
header("Location: ../");	
}
  ?>

<!DOCTYPE html>
<head>
<!-- ********* Start Meta Discription  -->
  <meta charset="utf-8">
  <title><?php echo $_SERVER[HTTP_HOST]; ?>-Change Login Password</title>
<meta name="description" content="sms sending jobs in india,view ads jobs in india,sms sending jobs in haryana,refer&earn,part time work,full time work" />
<meta name="keywords" content="sms sending jobs in india,view ads jobs in india,sms sending jobs in haryana,refer&earn,part time work,full time work" />
<!-- ********* Close Meta Discription  -->

  <!-- Styles -->
  <link href="../css/styles.css" rel="stylesheet">
  <link href="../css/bootstrap-override.css" rel="stylesheet">
  <!-- Font Avesome Styles -->
  <link href="../css/font-awesome/font-awesome.css" rel="stylesheet">

  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/> 
        <style>
    #sz{
        height: 40px; margin-top: 10px;
    }
    #add{
        margin-top: 10px;
    }
    label{
        color: #000 ;
    }
     #r1{
        background-color: white; margin-left: 1px; margin-right: 1px;margin-top: 1px; font-size: 16px; height: 30px;
    }
    #r2{
        background-color:#F8F9F9; margin-left: 1px; margin-right: 1px;margin-top: 1px; font-size: 16px;height: 30px;
    }
    #head{
        background-color: #85A4F0; font-size: 22px;  height: 40px; color: #fff;
    }
	#sub {
		height: 50px; margin-top: 20px; background-color: #85A4F0;color:#FFF; font-size:18px
	}
</style>

</head>       
<body style="background-color:#EBEDEF">
  <!-- Header -->
  <?php include_once 'header.php'; ?>
  <?php include_once '../db/config.php';?>
      <?php	
$domain_name = $_SERVER['HTTP_HOST']; 
$dates = date('Y-m-d h:i:s');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	$old_password = mysql_real_escape_string($_POST['old_password']);
        $new_password = mysql_real_escape_string($_POST['new_password']); 
	$con_password = mysql_real_escape_string($_POST['con_password']); 


   if($new_password==$con_password){
   $query ="update user_registration set password ='$new_password' where id = '$id' AND password='$old_password'";
    
 
   $querysid = mysql_query("SELECT * FROM   user_registration  where id = '$id' AND password='$old_password'") or die(mysql_error());
$arr_res = mysql_fetch_array($querysid);
     $usertype = $arr_res['user_type'];
     $unamename= $arr_res['name'];
    $email =  $arr_res['email']; 
    $userid = $row_user['loginuser_id'];	
	$mobile = $row_user['mobile'];
	
 if($email!=""){  
		$sub= "Change Members login Password Successfully";
	  	$header = "From: $donain_name Noreply@$donain_name";
	    	$message =
	    	 "Dear Member:  $unamename\n
		 Your Login Password has been changed Successfully & New Password Details Below: \n
		 User ID = $userid \n
                 Email id= $email \n
                 New Login Password= $new_password  \n		
		 Thanks & Regards \n
		 Support Team \n
		 $donain_name\n
		  
		  For  any help,Write to us at \n
                  Mail to:support@$donain_name \n
                  Website: $donain_name \n	 
		";	
		
	        mail($email,$sub,$message,$header);
	   
	        		
$mobilemsg = "Dear Member:$name .Your Login Details as below: User ID = $userid Login Password=$new_password From : $donain_name.";

 	 $pustitle = "CHANGE MEMBER LOGIN  PASSWORD";	  	
	  $pus_message = "Dear Member : $name, User Id:$userid Your Login Password has been changed successfully.";
		}
		if(mail($email,$sub,$message,$header)){

$sql_prosms =mysql_query ("select * from promotional_sms where sms_cat='Tractional'");
	$fetch_arr =  mysql_fetch_array($sql_prosms);
	$api_key  = $fetch_arr['api_key'];
	 $routeId = $fetch_arr['route_id'];
	$senderId = $fetch_arr['sender_id'];
	$smsType = $fetch_arr['sms_type'];
	
	  	
				
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "http://user.zygontech.com/app/smsapi/index.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&routeid=".$routeId."&type=".$smsType."&contacts=".$mobile."&senderid=".$senderId."&msg=".$mobilemsg);
		$response = curl_exec($ch);
		curl_close($ch);
		 $sms_shoot_id = substr($response,13);
		
				$api_url = "http://user.zygontech.com/app/miscapi/".$api_key."/getDLR/".$sms_shoot_id;
				//Submit to server
				  $result = file_get_contents($api_url);				
				  $json = json_decode($result, true);
				 //print_r($json);
			  	  $sms_status = $json[0]['DLR'];
			  	 
	
// pus notification entry
mysql_query("insert into all_notification (uid,email_id,user_type,title,mess,dt) values ('$id','$email','$usertype ','$pustitle','$pus_message','$dates')")  or die(mysql_error());
       
	
	        
	        
		$message= addslashes($message);  	 	  
	 $result=mysql_query($query) or die(mysql_error());	   	    
                 }else{@$msg="<h4 align='center'>Your password not correct."."</h4>"; }  
  if($result){
      mysql_query("insert into change_password_notification (uid,user_type,domain,mess,dt) 
          values('$id','$usertype','$domain_name','$message','$dates')") or die(mysql_error());
        @$msg="<h4 align='center'>Your password has been changed."."</h4>";
	 $url ="welcome.php";
    // echo '<script>window.location.href="'.$url.'";</script>';
    
		}
	 
   
        }else{
			
         @$msg="<h4 align='center'>Your New Password and Confirm Password Not Mached."."</h4>";
	}
}
        ?>
    
    
    <!-- ********* Start Basic details ********* -->
<?php //include"basic_home_dashbord.php"; ?>
	<br>
	<div class="container"><?php include"banner_1.php";?></div>
	<br>
<!-- ********* Close Basic details  -->


 <div class="container" style="background-color: #F2F4F4; margin-top: 5px">
    	
 <div style="font-size:18px"><center><?php echo isset($msg) ? $msg : ''; ?></center></div>		  
  <!-- Header End -->
   <form class="form-horizontal" method="post">
 
             
                <div class="col-sm-12" style="background-color: #fff;">
									
         <div>                
                    <div id="head"><center>Change Login Password</center> </div>
     <div class="row">
      <div class="col-sm-3"> <label class="control-label">Old Password:</label></div>
      <div class="col-sm-8">  <input type="password" name="old_password" class="form-control" id="sz" autofocus required> </div>
  </div>     
                  
                     
  <div class="row">
      <div class="col-sm-3"> <label class="control-label">New Password:</label></div>
      <div class="col-sm-8">  <input type="password" name="new_password" class="form-control" id="sz" required> </div>
  </div>
                   
     <div class="row">
      <div class="col-sm-3"> <label class="control-label">Confirm Password:</label></div>
      <div class="col-sm-8">  <input type="password"  name="con_password" class="form-control" id="sz" required> </div>
  </div>    
                   
                     
   
  
                   
                   <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-8">
        <button type="submit" name="register" class="btn form-control" id="sub">Submit</button>
    </div>
  </div>
  
  <br>
      <div class="col-sm-offset-3 col-sm-8">
        <h3><a href="change_trac_password.php">CHANGE TRANSACTION PASSWORD CLICK HERE</a></h3>
    </div>  
    <BR>        
         
           
             </div>
      
         </div>
</form>
        
  <br>
   
    </div>
    
    
    
    
    
     	  <!-- ********* Start Bottum Banners ********* -->	
			<br>
			 <div class="clearfix"></div>
			 <br>
			 <div class="container"><?php include"banner_2.php";?></div>
			 <br>
			 <div class="container">
			 <?php include"recent_earner.php";?>			 
			 </div>
			 <br>
			 <div class="container"><?php include"banner_3.php";?></div>
		<!-- ********* Close Bottum Banners ********* -->
  <!-- Content End -->
  
 <!-- Footer -->
  <?php include_once 'footer.php'; ?>
  <!-- Footer End -->


</body>



</html>
  
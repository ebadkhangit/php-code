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
	<!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title><?php echo $_SERVER[HTTP_HOST]; ?>-Upload Profile Pic</title>
<meta name="description" content="sms sending jobs in india,view ads jobs in india,sms sending jobs in haryana,refer&earn,part time work,full time work" />
<meta name="keywords" content="sms sending jobs in india,view ads jobs in india,sms sending jobs in haryana,refer&earn,part time work,full time work" />

  

  <link href="../img/favicon.ico" rel="icon" type="image/png">
  <!-- Styles -->
  <link href="../css/styles.css" rel="stylesheet">
  <link href="../css/bootstrap-override.css" rel="stylesheet">
  <!-- Font Avesome Styles -->
  <link href="../css/font-awesome/font-awesome.css" rel="stylesheet">
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <style>
    #sz{
        height: 50px; margin-top: 20px;
    }
    #add{
        margin-top: 10px;
    }
    label{
        color: #000 ; margin-top: 10px;
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
    <!-- End Header -->
    <!-- Content -->
	
  <?php include_once '../db/config.php';?>
      <?php	 
	$sql = "SELECT * FROM user_registration WHERE id = '$id'";
	$result = mysql_query($sql)or die(mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$email = $row['email']; 	
	$s_id = $row['loginuser_id']; 

	 
    if($_SERVER["REQUEST_METHOD"] == "POST") {	
        //print_r($_FILES['file_name']);
     //$file_name =$_FILES['file_name']['name'];
	 $file_name = $id.$s_id.'.jpg';
     $file_tmp_name =$_FILES['file_name']['tmp_name']; 
	 $path = "../userphotos/".$file_name;	 
  
      $result_photo = mysql_query("SELECT * FROM user_photos  WHERE uid = '$id'")or die(mysql_error());	
				
   if(mysql_num_rows($result_photo)>0){
mysql_query("update user_photos set path='$path'");
   }else{     
   $result=mysql_query("insert into user_photos (uid, path)
   values ('$id','$path')") or die(mysql_error());
   }
  	move_uploaded_file($file_tmp_name,$path);  
	echo "<script>alert('Your Profile Pic Seccessfully Updated');</script>";
	echo "<script>window.location.href='dashboard.php'</script>";
 
   } 
	
	?>
	<!--<?php include"basic_home_dashbord.php"; ?>
	<br>
	<div class="container"><?php include"banner_1.php";?></div>
	<br>
 <div class="container" style="background-color: #F2F4F4; margin-top: 5px;position:relative">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
<div style="font-size:18px; background-color: #85A4F0; color:#fff;"><center><?php echo isset($msg) ? $msg : '';; ?></center></div>		
        
									
         <div style="border:1px solid #85A4F0; background-color: #fff;">                
                    <div id="head"><center>UPLOAD PROFILE PIC</center> </div>
     

     <div class="row">
      <div class="col-sm-3"> <label class="control-label">Upload Pic:</label> </div>
      <div class="col-sm-8"> <input type="file" name="file_name" class="form-control"  id="sz" required> </div>
  </div>               
                  
    
   <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-8">
        <button type="submit" name="register" class="btn form-control"  id="sub" >Submit</button>
    </div>
  </div>
                       
             </div>
             </form>
			 </div>
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
 <br> <br>
  <!-- Footer -->
 <?php include_once 'footer.php'; ?>
  <!-- Footer End -->
</body>
</html>
  
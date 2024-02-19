<?php
session_start();
$login_user_id = $_SESSION['login_user_id'];
if(empty($_SESSION['login_user_id'])){
	header("Location:logout.php");
}
	

//include('head.php');
//$currentDateTime = date( 'Y-m-d h:i:s A', time () );
  //echo   $currentDate = date( 'Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
	<?php

	include_once"db/config.php"; 
 date_default_timezone_set('Asia/Kolkata');
     $Time = date("H:i:s");
     $currentDateTime = date( 'Y-m-d h:i:s A', time () );
    $currentDate = date( 'Y-m-d');
	?>	
	
<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Add Employee</title>
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Linearicon Font -->
		<link rel="stylesheet" href="assets/css/lnr-icon.css">
				
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
				
		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css"/>
        <link href=" https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
	</head>

	<body>
	
		<!-- Inner wrapper -->
		<div class="inner-wrapper">
		
			<!-- Loader -->
			
			<!-- Header -->
		<?php include('header.php');?>
			<!-- /Header -->
			
			<!-- Content -->
			
			
		<?php
error_reporting(0);
$filesizeError="";
$msg="";
$error=''; // Variable To Store Error Message
$sucessMessage=''; // Variable To Store Success Message

if (isset($_POST['submit'])) {
    extract($_POST);
    
    	 
$name =trim($_POST['name']);
//$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
 $gender = trim($_POST['sex']);
$mobile =trim($_POST['mobile']);
$mobile2 =trim($_POST['mobile2']);
$username =trim($_POST['username']);
$password1 = trim($_POST['password']);
   $password =  sha1($password1);
  $password_encoded = base64_encode($password1); 
   
$address =trim($_POST['address']);
//$address2 =trim($_POST['address2']);
$experience =trim($_POST['experience']);
$joining_date =trim($_POST['joining_date']);

$depid =trim($_POST['depid']);
$desid =trim($_POST['desid']);

$titlename1 =trim($_POST['titlename1']);
$titlename2 =trim($_POST['titlename2']);
$titlename3 =trim($_POST['titlename3']);
//$titlename4 =trim($_POST['titlename4']);

//$department =trim($_POST['department']);
//$designation =trim($_POST['designation']);


// ================= salary ===================================//

$basicsalary = trim($_POST['basicsalary']);
//$year =trim($_POST['year']);
$hra =trim($_POST['hra']);
$conveyance = trim($_POST['conveyance']);
  
$allowance =trim($_POST['allowance']);
//$medicalallowance =trim($_POST['medicalallowance']);
//$other =trim($_POST['other']);
//$tds =trim($_POST['tds']);
$esi =trim($_POST['esi']);
$pf =trim($_POST['pf']);
    $usertype='0';
	$userstatus='1';
	$status='0';
	
$duplicate=mysqli_query($conn,"select * from user_login where  user_name='$username' or user_emailid='$email' or user_mobile='$mobile'");
if (mysqli_num_rows($duplicate)>0)
{
echo "<script>alert('User Name OR Email Id OR Mobile Number Already  Exist')</script>";
}
else{	
	
	
     if($_FILES['file1']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path1 = "assets/document/".$login_user_id.uniqid ().$_FILES['file1']['name'];
          }
          if($_FILES['file2']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path2 = "assets/document/".$login_user_id.uniqid ().$_FILES['file2']['name'];
          }
          if($_FILES['file3']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path3 = "assets/document/".$login_user_id.uniqid ().$_FILES['file3']['name'];
          }
          if($_FILES['file4']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path4 = "assets/document/".$login_user_id.uniqid ().$_FILES['file4']['name'];
          }
            if($_FILES['file5']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path5 = "assets/user_img/".$login_user_id.uniqid ().$_FILES['file5']['name'];
          }
  
     if($_FILES['file6']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path6 = "assets/document/".$login_user_id.uniqid ().$_FILES['file6']['name'];
	 }
     if($_FILES['file7']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path7 = "assets/document/".$login_user_id.uniqid ().$_FILES['file7']['name'];
	 }
	  if($_FILES['file8']['name']==""){ $file_path = "no file choose"; }else{  
	 $file_path8 = "assets/document/".$login_user_id.uniqid ().$_FILES['file8']['name'];
	 }
	 
	 

           if($_FILES["file1"]["size"] >= 1000000 or $_FILES["file1"]["error"]=="1" ) {  				  				
                    //$filesizeError.= " , Resume Image is greater than 1 MB!"; 
                    echo "<script>alert('Error! Resume  Image is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file1"]["tmp_name"], $file_path1); }
                        
                            if($_FILES["file2"]["size"] >= 1000000 or $_FILES["file2"]["error"]=="1" ) {  				  				
                    //$filesizeError.= " , Exp Certificate  Image  is greater than 1 MB!"; 
                    echo "<script>alert('Error! Exp Certificate  Image 2 is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file2"]["tmp_name"], $file_path2); }
                        
                            if($_FILES["file3"]["size"] >= 1000000 or $_FILES["file3"]["error"]=="1" ) {  				  				
                   // $filesizeError.= " ,  Adahr Card Image 3 is greater than 1 MB!"; 
                    echo "<script>alert('Error! Adahr Card Image 3 is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file3"]["tmp_name"], $file_path3); }
                        
                            if($_FILES["file4"]["size"] >= 1000000 or $_FILES["file4"]["error"]=="1" ) {  				  				
                   // $filesizeError.= " ,  Other Document Image 4 is greater than 1 MB!"; 
                    echo "<script>alert('Error!  Other Document  Image 4 is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file4"]["tmp_name"], $file_path4); }
                        
                                if($_FILES["file5"]["size"] >= 1000000 or $_FILES["file5"]["error"]=="1" ) {  				  				
                  //  $filesizeError.= " ,  Profile Pic  Image 4 is greater than 1 MB!"; 
                    echo "<script>alert('Error! Profile Pic  Image 4 is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file5"]["tmp_name"], $file_path5); }
   
                            if($_FILES["file6"]["size"] >= 1000000 or $_FILES["file6"]["error"]=="1" ) {  				  				
                   // $filesizeError.= " , Other Document1   Image is greater than 1 MB!"; 
                    echo "<script>alert('Error! Other Document1  Image is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file6"]["tmp_name"], $file_path6); }      
                                 
         if($_FILES["file7"]["size"] >= 1000000 or $_FILES["file7"]["error"]=="1" ) {  				  				
                  //  $filesizeError.= " , Other Document2  Image is greater than 1 MB!"; 
                    echo "<script>alert('Error! Other Document2  Image is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file7"]["tmp_name"], $file_path7); } 
                        
                         if($_FILES["file8"]["size"] >= 1000000 or $_FILES["file8"]["error"]=="1" ) {  				  				
                  //  $filesizeError.= " , Other Document3  Image is greater than 1 MB!"; 
                    echo "<script>alert('Error! Other Document3  Image is greater than 1 MB')</script>";
                        }else{ $result = move_uploaded_file($_FILES["file8"]["tmp_name"], $file_path8); } 
   
  
  $query_result="insert into user_login(display_name,user_name,user_emailid,user_mobile,mobile_2,gender,user_password,forget_password,view_password,address,experience,joining_date,dep_id,des_id,resume_image,experience_certificate,adhar_card,other_document,user_pic,other_1,other_2,other_3,other_tite1,other_tite2,other_tite3,basic_salary,hra,conveyance,allowance,esi,pf,user_type,user_status,status,user_create_date) values('$name','$username','$email','$mobile','$mobile2','$gender','$password','$password_encoded','$password1','$address','$experience','$joining_date','$depid','$desid','$file_path1','$file_path2','$file_path3','$file_path4','$file_path5','$file_path6','$file_path7','$file_path8','$titlename1','$titlename2','$titlename3','$basicsalary','$hra','$conveyance','$allowance','$esi','$pf','$usertype','$userstatus','$status','$currentDate')";
$edit= mysqli_query($conn, $query_result);

if($edit){
        $sucessMessage="Employee successfully created.";
       // $url = "admin/dashboard.php";
       //echo "<script>window.location.href='".$url."'</script>"; // Redirecting To Other Page
      

} else {
$error = die(mysqli_error($conn));
}
  // Free result set
 // mysqli_free_result($query_result);
//mysqli_close($conn); // Closing Connection

}
}

?>	
			

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="dashboard.php" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Employees</li>
														</ol>
														<h4 class="text-dark">Add Person</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0">Details Content</h4>
									</div>
									<div class="card-body">
										<div id="list-example" class="list-group border-none">
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Basic</a>
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Employment</a>
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Teams & Offices</a>
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Salary</a>
										</div>
									</div>
								</div>-->
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Basic Details
											</a>
										</h4>
									</div>
									  <?php                                  
                                    if($error!=""){?>
                                        <div class="alert alert-danger">
                                            <center><b><?php echo $error.$filesizeError;?></b></center>				
                                        </div>
                                    <?php }else if($sucessMessage!=""){ ?>
                                          <div class="alert alert-success">
                                             <center><b><?php echo $sucessMessage.$filesizeError;?></b></center>				
                                          </div>
                                     <?php  }   ?>
									<?php echo $msg; ?>
									<div class="card-body p-0">
										<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
											<form method="post"  enctype="multipart/form-data">
												<div class="row">
													<div class="col form-group">
													<label for="usr"> Name:<span class="text-danger">*</span></label>
														<input type="text" name="name" class="form-control" placeholder=" Name" onkeypress="return checkNum(event)"  required>
													</div>
													<div class="col form-group">
													<label for="usr">Email:<span class="text-danger">*</span></label>
														<input type="text" name="email" class="form-control" placeholder="Email" required >
													
												</div>
													</div>
													<div class="row">
													
												
												<div class="col form-group">
													<label for="usr"> User Name:<span class="text-danger">*</span></label>
														<input type="text" name="username" class="form-control" placeholder="First Name" required >
													</div>
												<div class="col form-group">
												<label for="usr">Password:<span class="text-danger">*</span></label>
														<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" placeholder="Password" required >
													
												</div>
												</div>
												
												<div class="row">
												<div class="col form-group">
												<label for="usr">Mobile:<span class="text-danger">*</span></label>
														<input type="text" name="mobile" class="form-control" placeholder="Mobile Number" minlength="10" maxlength="10"   onkeypress="return isNumber()" required>
													
												</div>
													<div class="col form-group">
												<label for="usr">Emergency Contact No.:</label>
														<input type="text" name="mobile2" class="form-control" placeholder="Mobile Number" minlength="10" maxlength="10"   onkeypress="return isNumber1()">
													
												</div>
												<div class="col form-group">
<label for="usr"> Address:</label>
<textarea class="form-control" name="address"  rows="3"></textarea>
</div>

												</div>
												
												<div class="row">
												    <div class="col form-group">
												        <label for="usr">Gender</label>
												    <input type="radio" name="sex" value="Male"/> Male
                                                     <input type="radio" name="sex" value="Female"/> Female
												    </div>
												</div>
											<div class="row">
										<div class="col form-group">
  <label for="sel1">Experience</label>
  <select class="form-control" id="sel1" name="experience">
    <option>Select Exp.</option>
    <option>Fresher</option>
    <option>1 Year</option>
	<option>2 Year</option>
	<option>3 Year</option>
	<option>4 Year</option>
	<option>5 Year</option>
    
  </select>
</div>
												<div class="col form-group">
												<label for="usr">Date Of Joining:<span class="text-danger">*</span></label>
														<input type="date" name="joining_date" class="form-control" placeholder="Joining Date">
													
												</div>
												</div>	
												
		<div class="row">
	<div class="col form-group">
  <label for="sel1">Department</label>
  <select class="form-control" id="depid" onchange="getsubcat(this.value)" name="depid">
     <option value="">Select Department</option>
                          <?php 
										$stmt = $conn->prepare("select dep_id,department_name from department");
											//$stmt->bind_param('s',$ststus);
											$stmt->execute();
											$result = $stmt->get_result();    
											if ($result->num_rows>0) {
											while ($arr_cat  = $result->fetch_assoc()){
                                        
	  												
                                                                                        
                                       ?>	
						<option value="<?php echo $arr_cat['dep_id'];?>"><?php echo $arr_cat['department_name'];?></option>
										
											<?php }} ?>                   
                        </select>
</div>
	<div class="col form-group">
	<label for="usr">Designation:</label>

												<select id="desid" name="desid" class="form-control">
												<option value="">Select Designation</option>
													
												</select>
</div>

													
												</div>
													<div class="row"> 
										<div class="col-sm-6"> 
											<h4 class="text-primary">Gross Salary</h4>
											<div class="form-group">
												<label>Basic<span class="text-danger">*</span></label>
												<input class="form-control" name="basicsalary" type="text" required>
											</div>
											
											<div class="form-group">
												<label>HRA</label>
												<input class="form-control" name="hra" type="text">
											</div>
											<div class="form-group">
												<label>Conveyance</label>
												<input class="form-control"  name="conveyance" type="text">
											</div>
											<div class="form-group">
												<label> Other Allowance</label>
												<input class="form-control" name="allowance" type="text">
											</div>
											
											
										</div>
										<div class="col-sm-6">  
											<h4 class="text-primary">Total Deductions</h4>
											
											<div class="form-group">
												<label>ESI (%)</label>
												<input class="form-control" name="esi" type="text">
											</div>
											<div class="form-group">
												<label>PF (%)</label>
												<input class="form-control" name="pf" type="text">
											</div>
										
														    <div class="col-md-6">
                        <label for="">Upload Profile Pic</label>
                        <input type="file" name="file5" id="fileName5"  placeholder="Select Image">
                        <span><p class="text-info">Allowed Only(.png, .jpg, .jpeg)</p></span>
                      </div>
											
										</div>
									</div>
												<div class="row">
												    <div class="col-md-4">
												        
                        <label for="">Upload Resume</label>
                        <input type="file" name="file1" id="fileName1" class="form-control"    placeholder="Select Image">
                      <span><p class="text-info">Allowed Only(.doc, .docx, .pdf)</p></span>

                      </div>
                      					    <div class="col-md-4">
                        <label for="">Upload Exp.Certifaicate </label>
                        <input type="file" name="file2" id="fileName2" class="form-control"    placeholder="Select Image">
                       <span><p class="text-info">Allowed Only(.doc, .docx, .pdf)</p></span>
                      </div>
														    <div class="col-md-4">
                        <label for="">Upload Aadhar Card</label>
                        <input type="file" name="file3" id="fileName3" class="form-control"  placeholder="Select Image">
                        <span><p class="text-info">Allowed Only(.png, .jpg, .jpeg)</p></span>
                      </div>
                      					    <div class="col-md-4">
                        <label for="">Upload Other Document </label>
                        <input type="file" name="file4" id="fileName4" class="form-control"    placeholder="Select Image">
                        
                      </div>
                      </div>
                      <div class="row">
                                          <div class="col-sm-4">
		 <label for="">Upload Other Document1 </label>
	<input type="text" class="form-control"  name="titlename1" placeholder="Title">
  <input type="file" name="file6" class="form-control" >   
  </div>
			                                   <div class="col-sm-4">
		 <label for="">Upload Other Document2 </label>
	 <input type="text" class="form-control"  name="titlename2" placeholder="Title">
  <input type="file" name="file7" class="form-control" >   
  </div>	
  	                                   <div class="col-sm-4">
		 <label for="">Upload Other Document3 </label>
	<input type="text" class="form-control"  name="titlename3" placeholder="Title">
  <input type="file" name="file8" class="form-control" >   
  </div>
  
  
  </div>
												
												</div>
									<!--								<div class="row">
												<div class="col-sm-3">
		 <label for="">Upload Other Document1 <span class="text-danger">*</span></label>
	
  <input type="file" name="fileUpload1">  class="form-control"  
  </div>
  <div class="col-sm-3">
      <label for="">Upload Other Document2 <span class="text-danger">*</span></label>
 
  <input type="file" name="fileUpload2" class="form-control"  > 
  </div>
  <div class="col-sm-3">
      <label for="">Upload Other Document3 <span class="text-danger">*</span></label>

  <input type="file" name="fileUpload3" class="form-control"  > 
  </div>
  <div class="col-sm-3">
      <label for="">Upload Other Document4 <span class="text-danger">*</span></label>

  <input type="file" name="fileUpload4" class="form-control"  >
  </div>
</div>  -->				
<br>
												<div class="row">
								<div class="col-12">
									<div class="submit-section text-center btn-add">
										<button type="submit" name="submit"  class="btn btn-theme text-white ctm-border-radius button-1">Add Employee</button>
									</div>
								</div>
							</div>
											</form>
										</div>
									</div>
								</div>
						
							
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/js/jquery-1.11.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>		
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
		
		<!-- Datetimepicker JS -->
		<script src="assets/plugins/select2/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
				
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/select2.min.js"></script>
				
		<!-- Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
		
		<!-- Custom Js -->
		<script src="assets/js/script.js"></script>
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

      function isNumber1(evt) {
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
<script>
    var xobj;
   //modern browers
   if(window.XMLHttpRequest)  {
	  xobj=new XMLHttpRequest();
	  }
	  //for ie
	  else if(window.ActiveXObject)   {
	    xobj=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else {
		  alert("Your broweser doesnot support ajax");
		  }	
     function getsubcat(depid){
			if(xobj)
			{	
		
                   // alert(depid);
			  xobj.open("GET","fetch_designation.php?dep_id="+depid);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                              //alert(xobj.responseText);
	    document.getElementById('desid').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
		  }
</script>

	</body>


</html>
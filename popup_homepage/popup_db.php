<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display popup on page load</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
	<link rel="stylesheet" href="popup/swc.css">
	<script type="text/javascript" src="js/ajaxPage.js"></script>

function getmailaddress()
{
	
				var popupmailid = document.getElementById("popupmailid").value;
	if(popupmailid=="")
	{
		alert("Please enter mail address!");
		document.getElementById("popupmailid").focus();
		return false;
		
	}
		
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(!popupmailid.match(mailformat))
			{
				
			alert("You have entered an invalid email address!");
			document.form1.text1.focus();
			return false;
					
			}else{
				window.location.href="index.php?ss=1";
				return true;
			}
	
}


</script>
</head>
<body>
    <?php 
    if(@$_GET['ss']!=""){
        $_SESSION["session_popup_date"] = date('d');
    }
    ?>
    <!-- start popup -->
    <?php  
    
    if(@$_SESSION["session_popup_date"] != date('d')){ ?>
        
        <script>
    setTimeout(function() {
    $('#boxes').fadeOut('fast');
    window.location.href="index.php?ss=1";
}, 8000); // <-- time in milliseconds

            
        </script>
 <?php   ?>
    <div id="boxes">
<div style="top: 50%; left: 50%; display: none;" id="dialog" class="window"> 
<div id="san">
<!--<a href="#" class="close agree"><img src="popup/close-icon.png" width="25" style="float:right; margin-right: -25px; margin-top: -20px;"></a>-->
<center><img src="popup/dg.png"></center>

<p><b>A Memorable Name, Unforgettable Experiences.</b></p>
<p>Why take the bus, when you can be Luxurious...</p>
<p>Deluxe Driving</p>
<p>Innovation through Transportation (or vice versa)</p>

<form method="post">
<div class="row" style="padding-left:10%;">
<div class="col-sm-8">
<input type="email" id="popupmailid" class="form-control" autofocus placeholder="Enter mail address" pattern=".+@globex.com"/>
</div>
<div class="col-sm-2">
<button type="button" class="btn btn-info"  onclick="getmailaddress()"> Submit</button>
</div>

</div>
</form>
<br>
</div>
</div>
<div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"></div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 
<script src="popup/swc.js"></script>

<?php } ?>
    
    <!--  close popup -->
</body>
</html>
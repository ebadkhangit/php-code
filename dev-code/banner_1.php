<script>
  <script src="../js/ajaxPage.js"></script>
  </script>
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
<!-- google adsence code -->
<?php 
$sqlpg1 = mysql_query("select * from googleads where category='body'") or die(mysql_query);
	$arradsence1 = mysql_fetch_array($sqlpg1);					
	echo $arradsence1['content'];						
					
?>
<!-- close google adsence code -->
<?php
 $sql_banner1 = "SELECT * FROM user_registration WHERE id = '$id'";
					$result_bn1 = mysql_query($sql_banner1) or die(mysql_error());
					$roww_bn1 = mysql_fetch_array($result_bn1,MYSQL_ASSOC);
					 //$dt = $row['dt']; 
					 $con_idbn = $roww_bn1['country'];
					 $state_idbn = $roww_bn1['state'];
				          $genderbn= $roww_bn1['gender']; 
					  $marital_statusbn= $roww_bn1['marital_status']; 
					   $dobbn = $roww_bn1['dob']; 
					 
					 $totadydt = date('Y-m-d');
					 $dates = date('Y-m-d');
					 
					 
					$frombn = new DateTime($dobbn);
					$tobn   = new DateTime('today');
					  $useragebn = $frombn->diff($tobn)->y;
?>

<br>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
 <?php					 
 $pagename = basename($_SERVER['PHP_SELF']);
  $dates = date('Y-m-d');
 
 
	$email_tempp = mysql_query("select * from ad where ad_type='Banner Ad' and status = 'approval' and payment_status='1' and total_click_status='0' and country='$con_idbn' and state like '%$state_idbn%' and gender like '%$genderbn%' and marital_status like '%$marital_statusbn%' and from_year <= '$useragebn' and to_year >= '$useragebn'  ORDER BY id desc "); 
		$temp_discc = mysql_fetch_array($email_tempp);
		 $idd = $temp_discc['id']; 
		  $slidee = $temp_discc['path']; 
		  $link_url = $temp_disc['link_url']; 
		  
		  $query_viewad11 = mysql_query("SELECT * FROM  view_ad where uid = '$id' and ad_id='$idd' and status='1' and dt = '$dates'"); 
		if(mysql_num_rows($query_viewad11)>0){}else{
		 ?>
      <div class="item active">
       <a href="<?php echo $link_url; ?>" target="_blank"  onclick="banner1('<?php echo $idd;?>')"> <img src="../admin/<?php echo $slidee; ?>" style="width:100%;height:120px" target="_blank"></a>
        
      </div>
      
  <?php }
   
	$email_temp = mysql_query("select * from ad where ad_type='Banner Ad' and status = 'approval' and payment_status='1' and total_click_status='0' and country='$con_idbn' and state like '%$state_idbn%' and gender like '%$genderbn%' and marital_status like '%$marital_statusbn%' and from_year <= '$useragebn' and to_year >= '$useragebn' ORDER BY id desc"); 
		while($temp_disc = mysql_fetch_array($email_temp)){
		$slide = $temp_disc['path']; 
		 $link_url = $temp_disc['link_url'];
		$idd = $temp_disc['id']; 
		  
		  $query_viewad12 = mysql_query("SELECT * FROM  view_ad where uid = '$id' and ad_id='$idd' and status='1' and dt = '$dates'"); 
		if(mysql_num_rows($query_viewad12)>0){}else{
		 ?>
      <div class="item">
      <a href="<?php echo $link_url; ?>" target="_blank"  onclick="banner1('<?php echo $idd;?>')"> <img src="../admin/<?php echo $slide; ?>"  style="width:100%;height:120px" target="_blank"></a>
       
      </div>
       <?php } } ?>
    
       
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>




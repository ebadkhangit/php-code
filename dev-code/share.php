<?php  
session_start(); 
if(isset($_SESSION['id']))
{  
 $uid = $_SESSION['id'];
 $name = $_SESSION['name'];
 
  
}else{
header("Location: ../");	
}
  ?>
  // facebook messanger, whatsapp chat use website
  <script type="text/javascript">
    (function () {
        var options = {
            facebook: "473741296120557", // Facebook page ID
            whatsapp: "+91 8744013222", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
//
  
  youtube link all share link work
  https://www.youtube.com/watch?v=_wmIyAfS54
  
  
  	<!-- share share script paste head -->
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c27be11d02b6e0010eca5a3&product=social-ab' async='async'></script>
	
		 <!--  share link paste any page-->
                              <br><br> 
                              <div class="sharethis-inline-share-buttons"></div>

<!DOCTYPE html>
<head>
	<!-- Basic Meta Tags -->
<!-- ********* Start Meta Discription  -->
  <meta charset="utf-8">
  <title><?php echo $_SERVER[HTTP_HOST]; ?>-Referal & Earn</title>
<meta name="description" content="sms sending jobs in india,view ads jobs in india,sms sending jobs in haryana,refer&earn,part time work,full time work" />
<meta name="keywords" content="sms sending jobs in india,view ads jobs in india,sms sending jobs in haryana,refer&earn,part time work,full time work" />
<!-- ********* Close Meta Discription  -->
  <!-- Favicon -->
  <link href="../img/favicon.ico" rel="icon" type="image/png">
  <!-- Styles -->
  <link href="../css/styles.css" rel="stylesheet">
  <link href="../css/bootstrap-override.css" rel="stylesheet">
  <!-- Font Avesome Styles -->
  <link href="../css/font-awesome/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen">
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
        background-color: #85A4F0; font-size: 22px;  color: #fff;
    }
	#sub {
		height: 50px; margin-top: 20px; background-color: #85A4F0;color:#FFF; font-size:18px
	}
</style>

</head>        
<body style="background-color:#F2F4F4">
  <!-- Header -->
   <?php include_once 'header.php'; ?>
    <!-- End Header -->
    <!-- Content -->
	<?php include_once 'header.php'; ?>
  <?php include_once '../db/config.php';?>
  <br><br><br>
  <!-- ********* Start Basic details ********* -->
<!--<?php include"basic_home_dashbord.php"; ?>--><br>	
	<div class="container"><?php include"banner_1.php";?></div><br>	
<!-- ********* Close Basic details  -->
    <div class="container" style="background-color: #F2F4F4; margin-top: 5px;">
		    <div class="col-sm-offset-2 col-sm-8 well" style="background-color:#FFF;">   
               
                <div class="panel panel-primary"> 
                    <div class="panel-heading" id="head"><center>REFER AND EARN </center>   </div>
					<div class="panel-body">
					<?php


$sqlheader = mysql_query("SELECT * FROM frontend where cat='index'") or die(mysql_error());
	   	$header = mysql_fetch_array($sqlheader);
  $title = $header['frntend_title'];
 
		
	$result_user = mysql_query("SELECT * FROM user_registration WHERE id = '$uid'")or die(mysql_error());
	$row_user = mysql_fetch_array($result_user,MYSQL_ASSOC);
	  
				
					  $userid = $row_user['loginuser_id'];
					//$url = "http://rent-karo.in/index.php?referal_id=$userid";
					 $url=$_SERVER['HTTP_HOST'];
					$fb_url = $url.'/share_referal_code.php?fb_uid='.$userid;
					$google_url = $url.'/share_referal_code.php?glp_uid='.$userid;
					$twitter_url = $url.'/share_referal_code.php?twt_uid='.$userid;
					$linkdin_url = $url.'/share_referal_code.php?lnkd_uid='.$userid;
					$whatsapp_url = $url.'/share_referal_code.php?whatsapp_uid='.$userid;
					$title=$title;
					$summary = "what is sms income - यह अलग-अलग कंपनियों के एडवरटाइजिंग बैनर्स होते हैं जो आपने अपने कंप्यूटर या मोबाइल स्क्रीन पर 30 सेकंड (प्रति ऐड) के लिए देखने होते हैं और इसकी आपको इनकम मिलती है. वैसे तो हर Advertisement Banner का अलग रेट होता है, लेकिन आप प्रति बैनर एवरेज earning rate, 5 रुपये मान सकते हैं. इसके इलावा आपको messages को आगे फॉरवर्ड करने के भी पैसे मिलते हैं. ";
					
					$fb_url = urlencode($fb_url);
					$google_url= urlencode($google_url);
					$twitter_url= urlencode($twitter_url);
					$linkdin_url= urlencode($linkdin_url);
					$whatsapp_url= urlencode($whatsapp_url);
					//$title = urlencode($title);
					$summary = urlencode($summary);
					
				
					?>
				
					
      	
      	
    <center>


   <h2>Userid: <?php echo  $userid; ?></h2><br>



In this section, you get your unique referral link which you can send in your friend circle thru
 Facebook,Twitter,linkedin,Google+,Whatsapp or by other means of social media. Here we do something easy for you. You can see a
button named “Facebook” above. By clicking on this button, you can promote your referral link on your Facebook ID. You can also
promote your referal link thru WhatsApp also by clicking on the WhatsApp button above.
: इस सेक्शन में आपको आपका अपना पर्सनल रेफेरल लिंक मिलता है जिसे आप अपने दोस्तों, मित्रों, रिश्तेदारों को facebook/Twitter/Google+/linkedin/whatsapp या दूसरे किसी तरीके से भेज कर
उन्हें अपने नेटवर्क में ज्वाइन करवा सकते हैं जिसका आपको एक्स्ट्रा बोनस भी मिलता है. यहाँ पर हम आपके लिए कुछ आसान भी कर देते हैं. अगर आप ज़रा ध्यान से देखेंगे तो आपको यहां पर एक
&quot;facebook&quot; नाम का बटन मिलेगा. इस पर क्लिक करके आप अपना रेफेरल लिंक अपनी फेसबुक आई डी पर पोस्ट कर सकते हैं. Twitter/Google+/Linkedin/Whatsapp बटन पर क्लिक करके भी
आप अपना रेफेरल लिंक प्रमोट कर सकते हैं



<div id="share-buttons">  
   

    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=<?php echo $fb_url; ?>&title=<?php echo $title; ?>&summary=<?php echo $summary; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=<?php echo $google_url; ?>&title=<?php echo $title; ?>&summary=<?php echo $summary; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>
	 <!-- Twitter -->
    <a href="https://twitter.com/share?url=<?php echo $twitter_url; ?>&title=<?php echo $title; ?>&summary=<?php echo $summary; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>
    
    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $linkdin_url; ?>&title=<?php echo $title; ?>&summary=<?php echo $summary; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
	 <!-- Whatsapp -->
 <a href="whatsapp://send?text=<?php echo $whatsapp_url; ?>" data-action="share/whatsapp/share" target="_blank">
     <img src="img/whatsapp.png" alt="LinkedIn" />
  </a>	
	
	
	
    
    <!--
    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
        <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
    </a>
 
    <a href="javascript:;" onclick="window.print()">
        <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
    </a>
    
    
    <a href="http://reddit.com/submit?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
    </a>
    
    
    <a href="http://www.stumbleupon.com/submit?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" />
    </a>
    
    
    <a href="http://www.tumblr.com/share/link?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>
     -->
   
    
     <!--
    <a href="http://vkontakte.ru/share.php?url=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
    </a>
    
    
    <a href="http://www.yummly.com/urb/verify?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/yummly.png" alt="Yummly" />
    </a>
	 <a href="https://bufferapp.com/add?url=https://simplesharebuttons.com&amp;text=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" />
    </a>
    
 
    <a href="http://www.digg.com/submit?url=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" />
    </a>
    
    
    <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
-->
</div>
  (import your gmail contacts & send your referal link automatically)
    
    <h2><a href="export-gmail-contacts-in-php/" title="">IMPORT GMAIL CONTACTS CLICK HERE</a></h2>
      </center>
	<br>
				  </div>
				  
                </div>
                
      
				
		  
     
            </div> 
        
    </div>
  <!-- Content End -->
	   <!-- ********* Start Bottum Banners ********* -->			
			 <br><div class="clearfix"></div>			
			  <br><div class="container"><?php include"banner_2.php";?></div>			 
			 <br><div class="container"><?php include"recent_earner.php";?> </div>				 
			 <br><div class="container"><?php include"banner_3.php";?></div>
		<!-- ********* Close Bottum Banners ********* -->
  <!-- Footer -->
 <?php include_once 'footer.php'; ?>
  <!-- Footer End -->
</body>
</html>
  
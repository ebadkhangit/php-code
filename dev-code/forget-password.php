<style>
.thumbnail{
	margin-top:10px;
}
.button-add{
	margin-left:20px;
}
input[type=text], input[type=email], input[type=password]{
 color: #fff;
}
</style>

<?php include('head.php')?>
<body class="product-product-56 home1">
<div class="wrapper">
<?php include('menu.php')?>
	<?php include('header.php')?>
	<div id="product-product" class="container">
<?php include_once('db/config.php');?>

   		 <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Forget Password</a></li>
            </ul>
           
    		<div class="main-row ">
				<div class="container">
					<div class="row">
	

<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username'])) {
$error = "Email address is invalid";
}
else
{
// Define $username and $password
$username=trim($_POST['username']);
$username = stripslashes($username);
$username = mysqli_real_escape_string($conn,$username);
$query_login = mysqli_query($conn,"select * from user_login where user_name='$username'");
$rows = mysqli_num_rows($query_login);
if ($rows == 1) {
$arrlogin = mysqli_fetch_array($query_login);
		$sub = $_SERVER['HTTP_HOST'];
		$pass = base64_decode($arrlogin['user_password']);	
		$display_name = $arrlogin['display_name'];			
		$headers = "From: $display_name<$username>";		
	$message = "Dear $display_name , \n\n your login  password: $pass \n\n $sub";				 
	        if(mail($username, $sub, $message, $headers)){	   
	        $error = "Thank You, check your email address.";	    
	        
	        }

} else {
$error = "Username or Password is invalid";
}
  // Free result set
  mysqli_free_result($query_login);

}
}

?>
                        
			


			<div class="col-sm-offset-3 col-sm-6">
                                   <?php if($error!=""){?>
                                    <div class="alert alert-danger">
                                        <center><b><?php echo $error;?></b></center>				
                                    </div>
                                   <?php } ?>
				<form class="form-horizontal" role="form" method="post">
					<p class="title">Enter registered email address</p>
					<div class="form-group">
						<label for="username" class="control-label sr-only">Enter Registered Email Address</label>
						<div class="col-sm-12">
							<div class="input-group">
                                <input type="text" name="username" id="username" placeholder="Enter Registered Email Address" id="username" class="form-control" autofocus>
								<span class="input-group-addon"><i class="fa fa-angel-right"></i></span>
							</div>
						</div>
					</div>
				
					
                     <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-auth"><i class="fa fa-arrow-circle-o-right"></i> Submit</button>
				</form>
			
			</div>
			
		</div>
	</div>
	
	
		
			<div class="main-row ">
				<div class="container">
					<div class="row">
						<div class="main-col col-sm-12 col-md-12">
							<div class="row sub-row">
								<div class="sub-col col-xs-12 col-sm-12 col-md-12">
									<div class="tt_product_module module-style1 module-nav2" id="product_module241">
										<div class="module-title">
											<h2>
				  Latest Products 
			  </h2>
										</div>
										<div class="owl-container">
											<div class="tt-product  owl-carousel owl-theme " >
												<!-- Grid -->
                                                                                                                        <?php 
                                      
                    $query_LatestProducts = mysqli_query($conn,"select product_id,product_item_code ,product_price,img_1,product_desc from product where is_delete='0' order by product_id desc limit 15");
                                    while($arr_product =  mysqli_fetch_array($query_LatestProducts)){
                                  
                    ?>  
												<div class="row_items "  style="background-color:#eee;">
													<div class="product-layout grid-style ">
														<div class="product-thumb transition">
														    <div class="item">
														<div class="item-inner">
														<div class="image images-container">
									<a href="product-discription.php?prdid=<?php echo $arr_product['product_id'];?>" class="product-image" >												

																						<img class="img-r" src="admin/<?php echo $arr_product['img_1'];?>" alt="<?php echo $arr_product['product_item_code'];?> " />
																						<img src="admin/<?php echo $arr_product['img_1'];?>" alt="<?php echo $arr_product['product_item_code'];?>" title="<?php echo $arr_product['product_item_code'];?>" class="img-responsive has-rotator" style="height:128px;"/> </a>
																																								</div>
																				<!-- image -->
																				<div class="caption">
																				
		
<h4 class="product-name"><a href="product-discription.php?prdid=<?php echo $arr_product['product_id'];?>" ><?php echo $arr_product['product_item_code'];?></a></h4>	
																				
																					
																					
																				</div>
																				<!-- caption -->
																			</div>
																		
																		
														    </div>
													   </div>
														<!-- product-thumb -->
													</div>
													<!-- product-layout -->
												</div>
												<?php } 
                                                                                                mysqli_free_result($query_LatestProducts); 
                                                                                                ?>
											</div>
										</div>
										
										
										<div class="clearfix"></div>
									</div>
									
								
									<script>
										$(document).ready(function() {
										            $("#product_module241 .tt-product").owlCarousel({
										                loop: true ,
										                margin:  0 ,
										                nav:  true ,
										                dots:  false ,
										                autoplay:   true ,
										                autoplayTimeout:  1000 ,
										                autoplayHoverPause: true,
										                autoplaySpeed:  1000 ,
										                navSpeed:  1000 ,
										                dotsSpeed:  1000 ,
														lazyLoad: true,
										                responsive:{
															0:{
																items: 2,
																nav:true
															},
															480:{
																items: 3,
																nav:true
															},
															768:{
																items: 4,
															},
															992:{
																items: 4
															},
															1200:{
																items: 5
															},
															1600:{
																items: 5
															}
										                },
														onInitialized: function() {
															var count = $("#product_module241 .tt-product .owl-item.active").length;
															if(count == 1) {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .active").addClass('first');
															} else {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .owl-item.active:first").addClass('first');
															}
															
														},
														onTranslated: function() {
															var count = $("#product_module241 .tt-product .owl-item.active").length;
															if(count == 1) {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .active").addClass('first');
															} else {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .owl-item.active:first").addClass('first');
															}
														}
										            });
													
										        });
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		
			
									<script>
										$(document).ready(function() {
										            $("#product_module241 .tt-product").owlCarousel({
										                loop:  false ,
										                margin:  0 ,
										                nav:  true ,
										                dots:  false ,
										                autoplay:   false ,
										                autoplayTimeout:  1000 ,
										                autoplayHoverPause: true,
										                autoplaySpeed:  1000 ,
										                navSpeed:  1000 ,
										                dotsSpeed:  1000 ,
														lazyLoad: true,
										                responsive:{
															0:{
																items: 2,
																nav: false
															},
															480:{
																items: 3,
																nav: false
															},
															768:{
																items: 4
															},
															992:{
																items: 4
															},
															1200:{
																items: 5
															},
															1600:{
																items: 5
															}
										                },
														onInitialized: function() {
															var count = $("#product_module241 .tt-product .owl-item.active").length;
															if(count == 1) {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .active").addClass('first');
															} else {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .owl-item.active:first").addClass('first');
															}
															
														},
														onTranslated: function() {
															var count = $("#product_module241 .tt-product .owl-item.active").length;
															if(count == 1) {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .active").addClass('first');
															} else {
																$("#product_module241 .tt-product .owl-item").removeClass('first');
																$("#product_module241 .tt-product .owl-item.active:first").addClass('first');
															}
														}
										            });
													
										        });
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-row box-blog">
				<div class="container">
					<div class="row">
						<div class="main-col col-sm-12 col-md-12">
							<div class="row sub-row">
								<div class="sub-col col-sm-12 col-md-12">
									
									<script>
										$(document).ready(function() {
										        $(".articles-container").owlCarousel({
										            autoPlay :  false ,
										        	items : 3,
													margin: 0,
													loop: true,			
													navSpeed : 1000,
													dotsSpeed : 1000,
													autoplaySpeed : 1000,
													nav :  true ,
													dots :  false ,
													navText : ['<i class="ion-chevron-left"></i>','<i class="ion-chevron-right"></i>'],
													responsive:{
														0:{
															items: 1,
															nav: false
														},
														480:{
															items: 2,
															nav: false
														},
														768:{
															items: 3
														},
														992:{
															items: 3
														},
														1200:{
															items: 3
														}
													}
										    	});
										    });
									</script>
								
								
																		
					
													<script>
														function email_subscribe(){
															$.ajax({
																type: 'post',
																url: 'index.php?route=extension/module/newslettersubscribe/subscribe',
																dataType: 'html',
																data:$("#subscribe-normal").serialize(),
																success: function (html) {
																	try {
																		eval(html);
																	} 
																	catch (e) {
																	}				
																}});
														}
														function email_unsubscribe(){
															$.ajax({
																type: 'post',
																url: 'index.php?route=extension/module/newslettersubscribe/unsubscribe',
																dataType: 'html',
																data:$("#subscribe").serialize(),
																success: function (html) {
																	try {
																		eval(html);
																	} catch (e) {
																	}
																}}); 
															$('html, body').delay( 1500 ).animate({ scrollTop: 0 }, 'slow'); 
														}
													</script>
													<script>
														$(document).ready(function() {
																$('#subscribe_email').keypress(function(e) {
														            if(e.which == 13) {
														                e.preventDefault();
														                email_subscribe();
														            }
																	var name= $(this).val();
																  	$('#subscribe_name').val(name);
														        });
																$('#subscribe_email').change(function() {
																 var name= $(this).val();
																  		$('#subscribe_name').val(name);
																});
														    });
													</script>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	
	
				
	
				<style>
.panel{
background-color:#000 !important;
	
}
.input-group-addon {
   color: #fff;
   background-color: #337ab7;
}


.form-control, .input-group-addon {
   border-radius: 0px;
}
label{
  text-align: left !important;
}
.coupon-discount{
	position:absolute;
	top:149px;
	left:48px;
	
		
}
.discount-text{
	position:absolute;
top: 91px;
    left: 39px;
    font-size: 23px;
    color:#000;

}
.discount-text-2{
	position:absolute;
	//background-color:#fff;


	
	font-size:12px;
	color:#000 !important;

        top: 134px;
    left: 86px;
	font-weight:700;
		 
	
color:#000;	 
}

.text-plus{


position:absolute;
top: 100px;
    left: 236px;
    color:#000;
}


	.img-main img{
					width:800px;
				height:500px;
			
				
				
			
			}
			.section-6{
				margin:30px 0px 30px 0px;
				background-color:#333232;
				padding-bottom:30px;
				
				
				
			}
			.middle-section{
				margin-top:107px;
			
			
			}
			.right-section{
				padding:20px;
			
				
			}
			.section-bottom{
				padding:10px;
				border:1px solid #4a4949;
				
			}
			.button3{
    background-color:#f44336; /* Green */
    border: none;
    color: white;
    padding: 0px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 4px 2px;
    cursor: pointer;
}

.btn4{
    background-color:#793434; /* Green */
    border: none;
    color: white;
    padding: 6px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius:4px;
}

.btn-danger:hover {
    color: #fff;
    background-color: #a25151;
    border-color: #ac2925;
}

@media screen and (max-width: 768px) {
.banner-static .image a img {
height:200px !important;


}
.middle-section {
    margin-top: 17px;
}



.right-section img{
height:100px;


}


.text-plus{


position:absolute;
top: 51px;
    left: 133px;
    color:#000;
}






				
.section-bottom {

margin-top:-21px;
}

.middle-section .img-main img{
width:800px;
height:200px;
			

}
.coupon-discount img{
	
	    width: 176px;
    height: 98px;
}


.discount-text {
    position: absolute;
    top: 50px;
    left: 48px;
    font-size: 13px;
    color: #000;
}
.discount-text-2 {
    position: absolute;
    font-size: 7px;
    color: #000 !important;
    top: 73px;
    left: 41px;
    font-weight: 500;
    color: #000;
}


}




</style>


<br><br>
	<?php include('footer.php')?>
	
		
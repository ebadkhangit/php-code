<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>
<?php include_once('db/config.php'); 
  date_default_timezone_set('Asia/Kolkata');
     $currentDateTime = date( 'd-m-Y h:i:s A', time () );
     $currentDate = date( 'd-m-Y');
?>
<style>
    .projects-section .box .details, .projects-section-s2 .box .details {
    background-color: #0d1e2d63 !important;
    
}
</style>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        
        <!-- end preloader -->

        <!-- Start header -->
        <?php include "header.php" ?>
        <!-- end of header -->


        <!-- start of hero -->   
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    		  <?php   
                            // view product name      
									
             $query_banner_dots = mysqli_query($conn,"select slider_path from slider");
                                    $countBanner =  mysqli_num_rows($query_banner_dots);
                                     for($i=1;$i<($countBanner);$i++){  
                                                                     
                                    ?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $i?>"></li>
					<?php }  mysqli_free_result($query_banner_dots);  ?> 
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
		<?php   
                            // view product name                                                          
                             $query_banner1 = mysqli_query($conn,"select slider_path from slider where slider_id limit 0,1");
                                     $arr_banner =  mysqli_fetch_array($query_banner1);                                                                           
                                    ?>
      <img src="admin/<?php echo $arr_banner['slider_path'];?>" alt="Chania">
      <div class="carousel-caption">
      
      </div>
    </div>
	 <?php  ?> 
 <?php   
                            // view product name                                                          
             $query_banner = mysqli_query($conn,"select slider_path from slider where slider_id limit 1,10");
                                     while($arr_banner =  mysqli_fetch_array($query_banner)){
                                                                     
                                    ?>
    <div class="item">
      <img src="admin/<?php echo $arr_banner['slider_path'];?>" alt="Chicago">
      <div class="carousel-caption">
      
      </div>
    </div>
  <?php }  mysqli_free_result($query_banner);  ?> 
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
        <!-- end of hero slider -->
<?php 


  $stmt = $conn->prepare("select * from client");
			  $stmt->execute();
			  $result= $stmt->get_result();
			  $arr_about= $result->fetch_assoc();
?>

        <!-- start about-section-s3 -->
        <section class="about-section-s3 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="about-img">
                            <img src="img/2.jpg" alt>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="about-text">
                            <div class="title">
                                <span>About Us</span>
                                <h2>We Build Everything</h2>
                            </div>
                            <p><?php echo htmlspecialchars_decode(stripcslashes($arr_about['read_desc']));?></p>

						   <div class="signature">
                                <img src="assets/images/signature.png" alt>
                            </div>
                        </div>

                    
                    </div>
                </div>
				  <div class="row">
				    <div class="fun-fact">
                            <div class="fun-fact-grids start-count">
                                <div class="grid">
                                    <div class="icon">
                                        <img src="assets/images/fun-fact/icon-1.png" alt>
                                    </div>
                                    <h3>
                                        <span class="counter" data-count="10000">00</span><span>+</span>
                                    </h3>
                                    <p>Products</p>
                                </div>

                                <div class="grid">
                                    <div class="icon">
                                        <img src="assets/images/fun-fact/icon-2.png" alt>
                                    </div>
                                    <h3>
                                        <span class="counter" data-count="400">00</span><span>+</span>
                                    </h3>
                                    <p>Customers</p>
                                </div>

                                <div class="grid">
                                    <div class="icon">
                                        <img src="assets/images/fun-fact/icon-3.png" alt>
                                    </div>
                                    <h3>
                                        <span class="counter" data-count="200">00</span><span>+</span>
                                    </h3>
                                    <p>Employees</p>
                                </div>
                            </div> 
                        </div>
						</div>
            </div> <!-- end container -->
        </section>
        <!-- end about-section-s3 -->    

        <!-- start projects-section-s2 -->
        <section class="projects-section-s2 section-padding padding-bottom-0" style="background: #f5f5f5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="section-title">
                            <h2>Featured Products</h2>
                            <!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
                        </div>
                    </div>
                </div>

                <div class="row" >
                    <div class="col col-xs-12 sortable-gallery" >
                    

                        <div class="gallery-container" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);">
											 
			                       <?php 
						 
						                   // view Category name  
                                    $query_result = mysqli_query($conn,"select product_id,product_title,page_name,img_1 from product order by product_id desc");
                                      while($arr_product =  mysqli_fetch_array($query_result)){
                                    $productid =  $arr_product['product_id'];
                        
                    ?>
                             <div class="box construction text-center">
                              <a href="<?php echo  $arr_product['page_name']; ?>">  <img src="admin/<?php echo $arr_product['img_1']; ?>" style="height:200px;" alt></a>
                               
								   <h3>  <a href="<?php echo  $arr_product['page_name']; ?>">  <?php echo  $arr_product['product_title']; ?></a></h3> 
                            </div>
                            <?php } ?>

					   </div>
						
						
                    </div>
                </div>
            </div>
        </section>
        <!-- end projects-section-s2 -->

           
        <!-- start work-process-section -->
        <section class="work-process-section section-padding">
            <div class="container">
                <div class="row section-title-text">
                    <div class="col col-lg-3 col-md-4">
                        <div class="section-title-s4">
                            <span>Work Process</span>
                            <h2>How We Work</h2>
                        </div>
                    </div>
                    <div class="col col-lg-8 col-md-8">
                        <p>Edina is able to source and develop high quality spare parts and test machines at highly competitive price by leveraging the strength of its loyal customer base and their numbers.</p>
                    </div>
                </div> 
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="work-process-content">
                            <!-- Nav tabs -->
                            <div class="tablinks">
                                <ul>
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab">Plan</a>
                                    </li>
                                    <li>
                                        <a href="#tab-2" data-toggle="tab">Design</a>
                                    </li>
                                    <li>
                                        <a href="#tab-3" data-toggle="tab">Develop</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane in active" id="tab-1">
                                    <div class="img-holder">
                                        <img src="img/planning.jpg" alt>
                                    </div>
                                    <div class="details">
                                        <h3>Planning</h3>
                                        <p>EDP success is based on its customer’s first approach. Where each and every customer satisfaction is goal of the organization, we achieve this by exceeding the customer expectation through..  </p>
                                        <div class="detail-list">
                                            <ul>
                                                <li><i class="fa fa-caret-right"></i> Continuous improvement.</li>
                                                <li><i class="fa fa-caret-right"></i> Commitment to excellence.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                            </ul>
                                            <ul>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2">
                                    <div class="img-holder">
                                        <img src="img/design.jpg" alt>
                                    </div>
                                    <div class="details">
                                        <h3>Desgin</h3>
                                        <p>Edina is able to source and develop high quality spare parts and test machines at highly competitive
                                             price by leveraging the strength of its loyal customer base and their numbers.</p>
                                        <div class="detail-list">
                                            <ul>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                            </ul>
                                            <ul>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3">
                                    <div class="img-holder">
                                        <img src="assets/images/workprocess-pic.jpg" alt>
                                    </div>
                                    <div class="details">
                                        <h3>Develop</h3>
                                        <p>Our experienced sourcing team with multiple years of experience with large multinational companies and knowledge of best global practices is able to identify best supplier and develop or source parts with best in class quality and price.</p>
                                        <div class="detail-list">
                                            <ul>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                            </ul>
                                            <ul>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                                <li><i class="fa fa-caret-right"></i> Entegrity and team work.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>             
            </div> <!-- end container -->
        </section>
        <!-- end work-process-section -->


        <!-- start cta-section-s2 -->
        <section class="cta-section-s2">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="cta-text">
                            <h3>We provide innovative Product Solutions for sustainable progress.</h3>
                            <a href="#" class="theme-btn-s2">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>   
        <!-- end cta-section-s2 -->




        
        <!-- start site-footer -->
        <?php include "footer.php" ?>
        <!-- end site-footer -->

    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="assets/js/jquery-plugin-collection.js"></script>

    <!-- Google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key"></script>

    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
    	<script type="text/javascript">
    (function () {
        var options = {
            facebook: "#", // Facebook page ID
            whatsapp: "+91 9958297887", // WhatsApp number
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
<script>
	$(document).ready(function() {	
	$( ".widget h5" ).click(
		function() {
			$(this).parent().parent().toggleClass("active");
		}
	);	  	
});


	</script>

	<script>
			$(document).ready(function(){
				// hide #back-top first
				$("#back-top").hide();
				// fade in #back-top
				$(function () {
					$(window).scroll(function () {
						if ($(this).scrollTop() > $('body').height()/3) {
							$('#back-top').fadeIn();
						} else {
							$('#back-top').fadeOut();
						}
					});
					// scroll body to 0px on click
					$('#back-top').click(function () {
						$('body,html').animate({scrollTop: 0}, 800);
						return false;
					});
				});
			});
		</script>
	<!-- End script -->
	<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
</body>


</html>

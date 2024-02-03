<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<?php 
                               $query_result_sl = mysqli_query($conn,"select slider_id,slider_path from slider order by slider_id desc limit 0,1");
                                                                                     $arr_cat_sl =  mysqli_fetch_array($query_result_sl);
                                                                                              $arr_cat_sl['slider_id'];
                                                                                               ?>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <?php  while($arr_cat =  mysqli_fetch_array($query_result_sl)){ 
 $i=1; 
  ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $i++; ?>"></li>
    <?php } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
   
    <div class="item active">
      <img src="admin/<?php echo $arr_cat_sl['slider_path'];?>" style="height:220px;width:100%;">
    </div>
   
    
  <?php 
                                                                                   
                                                                                     $query_result = mysqli_query($conn,"select slider_id,slider_path from slider");
                                                                                     while($arr_cat =  mysqli_fetch_array($query_result)){
                                                                                              $arr_cat['slider_id'];
                                                                                               ?>
    <div class="item">
      <img src="admin/<?php echo $arr_cat['slider_path'];?>" style="height:220px;padding-r:100%;">
    </div>

      <?php } ?>
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
</div>
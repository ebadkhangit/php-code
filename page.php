<?php include ('layout/header.php') ?>






<?php

  $page = $_GET['pid'];
$resultSet = custom_my_sql_fetch_assoc(custom_my_sql_query($GLOBALS['con'], "SELECT * FROM pages WHERE visible = '1' AND link_url = '$page' LIMIT 1"));

?>

<div class="innerBanner">
    <img src="admin/upload/banners/<?php echo $resultSet['image'];?>" alt="" class="w-100"> 
    <div class="innerContent">
    <div>
        <h1><?php echo $resultSet['name'];?></h1>
        <p><?php echo $resultSet['image_description'];?></p>
</div>
</div>
</div>



	<?php echo $resultSet['content'];?>

  <?php include ('layout/footer.php') ?> 
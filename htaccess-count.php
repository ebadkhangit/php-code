  <?php
  $query_count  = "SELECT COUNT(`MessageID`) AS cnt FROM `contactus`   $sql_search ";

    $result_count = custom_my_sql_query($GLOBALS['con'], $query_count) or die(custom_my_sql_error($GLOBALS['con']));

    $nums         = custom_my_sql_fetch_assoc($result_count);

    $nume         = $nums['cnt'];
	
	?>
	
	RewriteEngine On

RewriteCond %{HTTP_HOST} !^www\.inovetic\.com$
RewriteRule (.*) https://www.inovetic.com/voltenix/$1 [R=301,L]

RewriteBase /voltenix/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^contact-us.html$ /voltenix/contact-us.php [L]
RewriteRule ^eaas-platform.html$ /voltenix/eaas-platform.php [L]
RewriteRule ^thankyou.html$ /voltenix/thankyou.php [L]
RewriteRule ^job-title.html$ /voltenix/job-title.php [L]
RewriteRule ^GCM_job-title.html$ /voltenix/GCM_job-title.php [L]
RewriteRule ^PMPA_job-title.html$ /voltenix/PMPA_job-title.php [L]
RewriteRule ^SWFED_job-title.html$ /voltenix/SWFED_job-title.php [L]
RewriteRule ^UXD_job-title.html$ /voltenix/UXD_job-title.php [L]
RewriteRule ^SDAM_job-title.html$ /voltenix/SDAM_job-title.php [L]
RewriteRule ^process-form.html$ /voltenix/process-form.php [L]
RewriteRule ^career.html$ /voltenix/career.php [L]

RewriteRule ^AM_job-title.html$ /voltenix/AM_job-title.php [L]
RewriteRule ^index.html$ /voltenix/index.php [L]
RewriteRule ^([^/]*)\.html$ /voltenix/page.php?pid=$1 [L]

 

RewriteCond %{THE_REQUEST} (.*)\.php  
RewriteRule ^(.*)\.php $1.html [R=301,L]  
RewriteCond %{THE_REQUEST} (.*)\.html  
RewriteRule ^(.*)\.html $1.php [L]

//  search bar code

 <form method="post">
      <div class="serach_box input-group">
        <input type="text" class="form-control" placeholder="Search text"  name="searchProduct" onkeyup="search_product(this.value)">
        
      <span class="input-group-btn">
          <input  type="submit" id="search"  name="searchPro">
       
       </span>
       
     <div  id="viewSearchData" style="background-color:#fff;color:#000; margin-top:56px;position:absolute;font-size:13px !important; padding: 0px; width:84%; left:1px;"></div>

    </div>
    </form>


<!--	 <?php
            if(isset($_POST['searchPro'])){
            $searchProduct =$_POST['searchProduct'];
            
             $query_searchPro = "select product_id from product where product_title = '$searchProduct' ";
 $query_ProductsPro = mysqli_query($conn,$query_searchPro);
 $arr_productPro =  mysqli_fetch_array($query_ProductsPro );
 
 $psSearchid=$arr_productPro['product_id'];
 if($psSearchid!=""){
 $urlsearch="product-description.php?prdid=".$psSearchid;
 echo "<script>window.location.href='$urlsearch'</script>";
 }else{
  echo "<script>alert('Please enter correct product name/title');</script>";
 }
            
            }
            ?> -->

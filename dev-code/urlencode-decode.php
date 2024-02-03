    <?php
	 $prmtr="prdid=".$productid;
     $encodedUrl ="product-discription.php?".rawurlencode($prmtr);
		<a href="<?php echo $encodedUrl;?>">							  
 
 
 $decodeurlStr=rawurldecode($_SERVER['REQUEST_URI']);
        $filterStr=strstr($decodeurlStr,'?',true);
        $allprmtr=str_replace("$filterStr?","",$decodeurlStr);
        $allprmArr= explode('&',$allprmtr);
       //print_r($allprmArr);
       
       $zeroindexStr=$allprmArr[0];
	   $catid=preg_replace("/[^0-9]/", '', $zeroindexStr);
       //$prdid=str_replace("prdid=","",$zeroindexStr);
	   
	   ?>
	   
	   <script>
	    function fetch_clik_link_products(catid,subcatid){	
		       prmtr="catid="+catid+"&subcatid="+subcatid;
                                      encodedUrl ="view-products.php?"+encodeURIComponent(prmtr);                                      
                                      window.location.href="view-products.php?"+encodeURIComponent(prmtr);		
			//window.location.href="view-products.php?catid="+catid+"&subcatid="+subcatid;		  
		 		 }
				 
				 </script>
<?php
// create new file
 $pageTitle = "Hand Watch";
 $lowerPageTitle = strtolower($pageTitle);
 $removePageTitleSpace= str_replace(" ","-",$lowerPageTitle);  
 $newTitlefileName="../".$removePageTitleSpace.".php";
$pageName=$removePageTitleSpace.'.php';  // use in insert query  
   
 $openNewfileName = fopen($newTitlefileName, "w") or die("Unable to open file!");
 $writeNewFileName = "<?php include_once('view-product.php');?>";
 fwrite($openNewfileName, $writeNewFileName);
 fclose($openNewfileName); 
 
 //  for website view product page
 
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
echo $file; 

// remove page
unlink("../".$pagename);
  
     


?>
<?php
   /*
$ServerName="localhost";
  $HostName="nensi_adotkatruc";
  $Password="nensi_adotkatruc123";
  $DataBaseName="adotkatrucks";
*/ 

  $ServerName="localhost";
  $HostName="root";
  $Password="";
  $DataBaseName="edina";
   
$conn=mysqli_connect($ServerName,$HostName,$Password,$DataBaseName);
 if(!$conn)
 { 
 echo "Server Connection Error".mysqli_error($conn);
 }
 
?>
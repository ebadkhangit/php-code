<?php
if($_SERVER['HTTPS']!="on") {
$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo "<script>window.location.href='".$redirect."'</script>";
header("Location:$redirect"); } 

if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    echo "<script>window.location.href='".$redirect."'</script>";
    header('Location: ' . $redirect);
    exit();
}
?>
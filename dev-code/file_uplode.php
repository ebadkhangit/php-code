<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   
   //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
   if(isset($_FILES['uploaded_file'])) {
    $errors     = array();
    $maxsize    = 2097152;
    $acceptable = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['uploaded_file']['size'] >= $maxsize) || ($_FILES["uploaded_file"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
    }

    if(!in_array($_FILES['uploaded_file']['type'], $acceptable) && (!empty($_FILES["uploaded_file"]["type"]))) {
    $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
}

if(count($errors) === 0) {
    move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
} else {
    foreach($errors as $error) {
        echo '<script>alert("'.$error.'");</script>';
    }

    die(); //Ensure no more processing is done
}
}

?>
<html>
   <body>
   
   <input type="file" name="pic" id="pic" accept="image/gif, image/jpeg" />
<input type="file" name="pic" accept="image/*">

<input type="file" name="pic"accept="image/*,application/pdf,video/mp4,video/*"/>
<input type="file" name="foo" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
<input type="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>

<?php
session_start();
if(empty($_SESSION['username'])){
	header("Location: ../");
}



$host = "localhost"; /* Host name */
$user = "p2danfotaltej1"; /* User */
$password = "67gtdr436%^&jk1"; /* Password */
$dbname = "p2dispatch_tej1"; /* Database name */

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
include_once('../layoutfiles/header.php');
error_reporting(0);

if(isset($_POST['but_import'])){
   $target_dir = "../commonfiles/uploads/";
  $target_file = $target_dir . basename($_FILES["importfile"]["name"]);

     $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

     $uploadOk = 1;
   if($imageFileType != "csv" ) {
     $uploadOk = 0;
       echo "<script>alert('File Can not be uploaded ,Only Accept CSV File');</script>";
     
   }

   if ($uploadOk != 0) {
     
       
      if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir.'importfile.csv')) {

        // Checking file exists or not
        $target_file = $target_dir . 'importfile.csv';
         $fileexists = 0;
        if (file_exists($target_file)) {
          $fileexists = 1;
        }
        if ($fileexists == 1 ) {

           // Reading file
           $file = fopen($target_file,"r");
           $i = 0;

           $importData_arr = array();
          
           while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($data);

             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = mysqli_real_escape_string($conn, $data[$c]);
             }
             $i++;
           }
           fclose($file);

           $skip = 0;
           // insert import data
           foreach($importData_arr as $data){
              if($skip != 0){
                 $material_type = $data[0];
                 $name = $data[1];
                 $rate = $data[2];
                 $qty = $data[3];
                 $dop = $data[4];
                 $contradiction = $data[5];
                 $vendor = $data[6];

                 // Checking duplicate entry
                 $sql = "select count(*) as allcount from row_materials where material_type='" . $material_type . "' and name='" . $name . "'  and rate='" . $rate . "' and  qty='" . $qty . "' and dop='" . $dop . "' and contradiction='" . $contradiction . "' and vendor='" . $vendor . "' ";

                 $retrieve_data = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($retrieve_data);
                 $count = $row['allcount'];

                 if($count == 0){
                    // Insert record
                    $agent_id = $_SESSION['userID'];
                     $TIME 		= 	date("Y-m-d H:i:s");
                     
                     
                    $insert_query = "insert into row_materials(agent_id,material_type,name,rate,qty,dop,contradiction,vendor,insert_date) values('".$agent_id."','".$material_type."','".$name."','".$rate."','".$qty."','".$dop."','".$contradiction."','".$vendor."','".$TIME."')";
                    mysqli_query($conn,$insert_query);
                 }
              }
              $skip ++;
           }
           $newtargetfile = $target_file;
           if (file_exists($newtargetfile)) {
             unlink($newtargetfile);
             echo "<script>alert('File Upload Successfully');</script>";
           }
         }

      }
   }
}
?>
<style>
    .popup_import{
  border: 1px solid black;
  width: 550px;
  height: auto;
  background: white;
  border-radius: 3px;
  margin: 0 auto;
  padding: 5px;
}

.format{
  color: red;
}

#userTable{
  border-collapse: collapse;
  margin: 0 auto;
  margin-top: 15px;
  width: 550px;
}

#but_import{
  margin-left: 10px;
}
</style>
 <div id="wrapper">
    <!-- Sidebar -->
<?php include_once('../layoutfiles/sidebar-menu.php'); ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Upload CSV File</li>
        </ol>
		<?= $message; ?>
        <!-- DataTables Example -->
        <div class="card mb-3">
        
          <div class="card-body">
<!-- Import form (start) -->
<div class="popup_import">
 <form method="post" action="" enctype="multipart/form-data" id="import_form">
     <div class="row">
         <div class="col-sm-6">
                 <div class="form-group">  
     <input type='file' name="importfile" class="form-control"  id="importfile" required>
   </div> 
   
         </div>
        <div class="col-sm-3">
            <div class="form-group"> 
        <button type="submit"  class="btn btn-success btn-sm form-control"  id="but_import" name="but_import">Upload</button>
        </div>
            </div> 
     </div>
  <table width="100%">

   <tr>
    <td colspan="2">
 
   </tr>
   <tr>
    <td colspan="2" >
        
        </td>
   </tr>
  
   <tr>
    <td colspan="2"><b>Instruction : </b><br/>
     <ul>
      <li>Enclose text field in quotes (' , " ) if text contains comma (,) is used.</li>
      <li>Enclose text field in single quotes (') if text contains double quotes (")</li>
      <li>Enclose text field in double quotes (") if text contains single quotes (')</li>
     </ul>
    </td>
   </tr>
  </table>
 </form>
</div>

          </div>
        </div>

      </div>
    </div>
    <!-- /.content-wrapper -->
  </div>
<script>
function totalamt(data){
    //alert(data);
    if(data >=0)
       {
        var packageamt = document.getElementById("rate").value;
           document.getElementById("total_amt").value = Math.round(parseInt(packageamt)+parseInt(packageamt)*parseInt(data)/100);
           document.getElementById("advance_amt").style.display="block";
           document.getElementById("advamtt").style.display="none";

       }else{
           //alert('Enter package amount!');
         //document.getElementById("rate").style.display = "none";
       }
}

    function balanceamt(data){
    //alert(data);
    if(data >=0)
       {
        var total_amt = document.getElementById("total_amt").value;
           document.getElementById("balance_amt").value = Math.round(parseInt(total_amt)-parseInt(data));

       }else{
           //alert('Enter advance amount!');
         //document.getElementById("rate").style.display = "none";
       }
}

function value_blank()
{
            document.getElementById("total_amt").value = "";
           document.getElementById("advance_amt").value="";
           document.getElementById("commission").value="";
            document.getElementById("balance_amt").value="";
}

function validate(event)
{

if ((event.keyCode < 48 || event.keyCode > 57))
{
   event.returnValue = false;
}
}


</script>

  <!-- /#wrapper -->
<?php include_once('../layoutfiles/footer.php'); ?>


<html lang="en">
 <?php 
  include_once "../db/config.php"; 
  include_once "basic_requirment.php"; 
  date_default_timezone_set('Asia/Kolkata');
  $crdate=date('Y-m-d h:i:s A');
  ?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->


   
<?php
if(isset($_POST['export_excel']))
{
$sql ="select * from user_login order by user_id desc";
$result = mysqli_query($conn, $sql);
//print_r($result);
//die();
if(mysqli_num_rows($result)>0)
{
    $output .= '
    <table class="table" bordered="1">
    <tr>
      <th>id</th>
    <th>First Nmae</th>
      <th>email</th>
        <th>mobile</th>
          <th>city</th>
    </tr>
 
    ';
    while($row = mysqli_fetch_array($result))
    {
      $output .= '
      <tr>
       <td> '.$row["user_id"].'</td>
      <td> '.$row["display_name"].'</td>
        <td> '.$row["user_emailid"].'</td>
          <td> '.$row["user_mobile"].'</td>
            <td> '.$row["city"].'</td>
      </tr>
      
      ';  
    }
    
     $output .= '</table>';
     header("Content-type: application/xls"); 
     header("Content-Disposition: attachment; filename=User_Detail.xls");
     echo $output;
}

}
?>


<?php include_once "footer.php"; ?>
</body>
</htm>
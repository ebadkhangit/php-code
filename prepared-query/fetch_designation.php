
<?php

	include_once"db/config.php"; 
 date_default_timezone_set('Asia/Kolkata');
     $Time = date("H:i:s");
     $currentDateTime = date( 'Y-m-d h:i:s A', time () );
    $currentDate = date( 'Y-m-d');
	?>
<option value="" style="display:none;"> Select Designation</option>
<?php

				$dep_id = $_GET['dep_id'];
                  $query_product="SELECT distinct designation_name,des_id from designation
				  where dep_id='$dep_id' " ;			
				$run_pro=mysqli_query($conn,$query_product) or die(mysqli_error($con));
                     		 while($data_user=mysqli_fetch_array($run_pro))
					{
                                        ?>
                                        <option value="<?php echo  $data_user['des_id']; ?>"><?php echo $data_user['designation_name'];?></option>
                                        <?php } 
                                        ?>
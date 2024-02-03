    <?php 
		     		     // pagination
		             $showRecordPerPage = 3;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;

$totalEmpSQL = "select * from find_volunteer ";
$allEmpResult = mysqli_query($conn, $totalEmpSQL);

$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

                    $sr=1;                   
                    $stmt = $conn->prepare("select * from find_volunteer  order by vol_id desc  LIMIT $startFrom, $showRecordPerPage");
                      //$stmt->bind_param('s',$ststus);
                      $stmt->execute();
                      $result = $stmt->get_result(); 
                      while ($arr_cat  = $result->fetch_assoc()){                                              
                                                                                        
                                       ?>
			<div class="col-md-4 ac">
			    <div class="cours2" style="overflow:hidden;">
					<img class="hover img-thumbnail" src="admin/<?php echo $arr_cat['img'];?>" style="width:100%;height:300px;border:1px solid transparent;transition:1s;" />
						<!-- <div class="cours3">
							<h2 style="text-align:center;margin-top:-6px;color:rgb(237,78,110);">ISTAKHAR</h2>
							<h5 style="text-align:center;">Teaching To Over Students To Making Applications..</h5>
							<h6 style="text-align:center;">Student Can Make Apropariats Are The Creating Applications Are The All About The Relivents If The Regarding..</h6>						
						</div>
						<div class="cours4 text-center">							
							<button class="cou" style="border:1px solid transparent;padding:10px 20px ;font-size:16px;border-radius:10%;background-color:rgb(237,78,110);color:white;">View More</button>						
						</div> -->
						
						
				</div>
				<h2><?php echo $arr_cat['title'];?></h2>
				<p><?php echo $arr_cat['desc'];?>...
				   <i class="fa fa-arrow-right icon-c" aria-hidden="true"></i> <blink><a href="<?php echo $arr_cat['url'];?>" class="" role="button">Read More</a></blink>
				</p>
			</div>
		    <?php } ?>
		</div>
		
	</div>	
	
			<!-- pagination link -->
			<div class="row ">
	    <div class="col-md-12" >
			<nav style="float:right; padding: 10px 0px 35px 0px;">
				<ul class="pagination">
		
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>&ct=<?php echo $ct;?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
				</ul>
			</nav>
	    </div>
	</div>

<!-- close pagination link -->



<?php
include_once("db_connect.php");
$showRecordPerPage = 5;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT * FROM employee";
$allEmpResult = mysqli_query($conn, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$empSQL = "SELECT id,employee_name, employee_salary
FROM `employee` LIMIT $startFrom, $showRecordPerPage";
$empResult = mysqli_query($conn, $empSQL);
?>
<table class="table ">
<thead>
<tr>
<th>EmpID</th>
<th>Name</th>
<th>Salary</th>
</tr>
</thead>
<tbody>
<?php
while($emp = mysqli_fetch_assoc($empResult)){
?>
<tr>
<th scope="row"><?php echo $emp['id']; ?></th>
<td><?php echo $emp['employee_name']; ?></td>
<td><?php echo $emp['employee_salary']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<nav aria-label="Page navigation">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>
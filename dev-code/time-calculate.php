<?php
 date_default_timezone_set('Asia/Kolkata');
     echo $currentDateTime = date( 'Y-m-d h:i:s A', time () );
     $currentDate = date( 'Y-m-d');
     $todayDate=date( 'Y-m-d h:i:s A', time () );
     echo "<br>old time";
    echo $oldtime = "2019-01-24 11:55:18 AM";
       echo "<br> time";
$start_date = new DateTime($currentDateTime);
$since_start = $start_date->diff(new DateTime($oldtime));
//echo $since_start->days.' days total<br>';
//echo $since_start->y.' years<br>';
//echo $since_start->m.' months<br>';
//echo $since_start->d.' days<br>';
//echo $since_start->h.' hours<br>';
//echo $since_start->i.' minutes<br>';
//echo $since_start->s.' seconds<br>';

echo "<hr>";
$minutes = $since_start->days * 24 * 60;
$minutes += $since_start->h * 60;
$minutes += $since_start->i;
echo $minutes.' minutes';

echo "<hr>";
?>

<?php 
	$now = new \DateTime('now');
    $month = $now->format('m');
    $year = $now->format('Y');
	
	 echo $mo= date('F-d-Y,h:i:s A', time ()); //   Aug-2020 03:45:15 AM
	 
	 echo $mo= date('l'); // day

?>
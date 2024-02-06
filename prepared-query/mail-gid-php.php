<?php include 'layout/header.php'; ?>
 <?php 
include('lib/class.sendgridmail.php');
$name=isset($_POST['name'])?$_POST['name']:''; 
$packagetype=isset($_POST['packagetype'])?$_POST['packagetype']:''; 
$email=isset($_POST['email'])?$_POST['email']:'';
$passengers=isset($_POST['passengers'])?$_POST['passengers']:'';
$startdest=isset($_POST['startdest'])?$_POST['startdest']:'';
$enddest=isset($_POST['enddest'])?$_POST['enddest']:'';
$ridedate=isset($_POST['ridedate'])?$_POST['ridedate']:'';
$ridetime=isset($_POST['ridetime'])?$_POST['ridetime']:'';  
//$name=$fname.' '.$lname;

if(!empty($name) && !empty($email) ){ 
$to = "info@manziltravels.in";
  $subject = "From Manzil Travels";
  $txt="Hi Enquiry From Manzil Travels<br /><br />$name has sent you a message via contact form on your website! <br /><br />
  <table border='0' cellpadding='5' cellspacing='0'  style='width='100%'>
  <tbody>
  
  <tr>
  <td >First Name</td>
  <td > : </td>
  <td>$name</td>   
  </tr>
  <tr>
  <td >Package Type</td>
  <td > : </td>
  <td>$packagetype</td>   
  </tr>
  <tr> 
  <td >Passengers</td>
  <td > : </td>
  <td>$passengers</td>  
  </tr>
  <tr> 
  <td >Email</td>
  <td > : </td>
  <td>$email</td>  
  </tr>
  
   <tr> 
  <td >From Destination</td>
  <td > : </td>
  <td>$startdest</td>  
  </tr>

   <tr> 
  <td >End Destination </td>
  <td > : </td>
  <td>$enddest</td>  
  </tr>
   <tr> 
  <td >Riding Date </td>
  <td > : </td>
  <td>$ridedate</td>  
  </tr>
  <tr>
  <td >Riding Time</td>
  <td > : </td>
  <td>$ridetime</td>  
  </tr>
  
  </tbody>
  </table> ";


       

  //$headers = "MIME-Version: 1.0" . "\r\n";
  //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  //$headers .= 'From:info@zealclinica.com' . "\r\n";


  $mailerObj = new SendGridMailClass();

  $mailerObj->toArray = array('info@manziltravels.in');
  //$mailerObj->toArray = array('rahul@inovetic.com');
  $mailerObj->fromName = $name;
  $mailerObj->fromEmail = $email;
  $mailerObj->category =  'Manzil Travel - Appointment Request';
  $mailerObj->body =$txt;
  $mailerObj->subject = 'Manzil Travel- Appointment Request';
  //$mailerObj->sendMail();
  

            

if (  $mailerObj->sendMail()){
 
echo "<script>alert('Your Message has been Send Successfully.')</script>";
  // exit;

  } else {
    printf ("<b>errormessage</b>");
  }

}

?>

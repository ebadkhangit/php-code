<?php
include('layout/header.php');
//include('admin/include/function.php');
// include('admin/include/custom_mysqli_functions.php');
include('admin/include/dbconnect.php');
include('lib/class.sendgridmail.php');

?>

</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="homeSlider">
  <img src="assets/images/banner_moile.webp" alt="" class="w-100 d-md-none">
  <div class="container">
    <div class="row mob-row">
      <?php
      $query = "SELECT * FROM banner_add";
      $result = mysqli_query($GLOBALS['con'], $query);
      $num = mysqli_num_rows($result);
      if ($num > 0) {
        while ($pageArray = custom_my_sql_fetch_assoc($result)) {  
      ?>

          <div class="col-lg-6 col-md-7">
            <div class="homeSliderContent">
              <h1><?php echo $pageArray['name']; ?></h1>
              <p><?php echo $pageArray['title']; ?></p>
              <a href="<?php echo $pageArray['url']; ?>" class="btn btn-theme border-green"><?php echo $pageArray['button_text']; ?><i class="fa fa-long-arrow-right ml-2"></i></a>
            </div>
          </div>
 
          <div class="col-lg-6 col-md-5">
            <img src="assets/images/home-banner-video.gif" alt="" class="img-fluid w-100">
          </div>
      <?php }
      } ?>

    </div>
  </div>
</div>
<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
$msg = "";
if (isset($_POST['submit'])) {


  $secretkey = "6LfiB2opAAAAANjK1rlz15eVZN0bI5Va_HqMCONI";
  $captcha = $_POST['g-recaptcha-response'];
  $userIP = $_SERVER['REMOTE_ADDR'];
  $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$userIP");

  $response = file_get_contents($url);
  $response = json_decode($rsp, true);

  // print_r($response);
  //die();

  if ($response['success']) {

    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $phone=isset($_POST['phone'])?$_POST['phone']:'';
    $name = $fname . " ," . $lname;


    $insert_contact = "INSERT INTO `contactus` (

            `MessageID` ,

            `Name`,

            `Email`,

            `Subject`,

            `Message`,

            `Telephone`,

            `Date`

            )

            VALUES ('', '$name', '$email','$subject','$message', '$phone', '" . time() . "') ";

    $query_result =  mysqli_query($GLOBALS['con'], $insert_contact);
    if ($query_result) {
      //echo "<script>alert(' Send Successfully.')</script>";

      if (!empty($name) && !empty($email)) {
        $to = "info@voltenix.com";
        $subject = $subject;
        $txt = "Hi Enquiry From Voltenix<br /><br />$name has sent you a message via contact form on your website! <br /><br />
  <table border='0' cellpadding='5' cellspacing='0'  style='width='100%'>
  <tbody>
  
  <tr>
  <td >Name</td>
  <td > : </td>
  <td>$name</td>   
  </tr>
  <tr>
  <td >Email</td>
  <td > : </td>
  <td>$email</td>  
  </tr>
  <tr>
  <td >Subject</td>
  <td > : </td>
  <td>$subject</td>  
  </tr>

  <td >Phone Number</td>
  <td > : </td>
  <td>$phone</td>  
  </tr>
  
   <tr> 
  <td >Message</td>
  <td > : </td>
  <td>$message</td>  
  </tr>

  
  </tbody>
  </table> ";




        //$headers = "MIME-Version: 1.0" . "\r\n";
        //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //$headers .= 'From:info@zealclinica.com' . "\r\n";


        $mailerObj = new SendGridMailClass();

        $mailerObj->toArray = array('info@voltenix.com');
        //$mailerObj->toArray = array('rahul@inovetic.com');
        $mailerObj->fromName = $name;
        $mailerObj->fromEmail = $email;
        $mailerObj->category =  'Voltenix - Appointment Request';
        $mailerObj->body = $txt;
        $mailerObj->subject = 'Voltenix- Appointment Request';
        //$mailerObj->sendMail();

        //print_r( $mailerObj);
        //die();


        if ($mailerObj->sendMail()) {

          $url = "thankyou.php";
          echo "<script>window.location.href='" . $url . "'</script>";

          //echo "<script>alert('Your Message has been Send Successfully.')</script>";
          // exit;

        } else {
          printf("<b>errormessage</b>");
        }
      }
    }

    //$msg = "<div class='alert alert-success'>Your contact enquiry has been sent!</div>";
  } else {
    $msg =  "<div class='alert alert-danger'>Please select captcha!</div>";
  }
}
?>
<div class="solutionsWrap mt-5">
  <div class="container">
  <center><?php echo  $msg; ?></center>
    <h2 class="homeTitle   solMar text-center">Solutions</h2>

    <?php
    $sql = "SELECT * FROM contents WHERE name='solution_section_edit'";
    $result_page = mysqli_query($GLOBALS['con'], $sql);
    $row = mysqli_fetch_array($result_page)
    ?>
    <div>
      <?php echo $row['value']; ?>
    </div>
  </div>
</div>






<div class="aboutVoltenix mt-5 bg-gray">

  <div class="container">
    <div class="row align-items-center ">
      <?php
      $sql = "SELECT * FROM contents WHERE name='about_voltenix'";
      $result_page = mysqli_query($GLOBALS['con'], $sql);
      $row = mysqli_fetch_array($result_page)
      ?> 
      <div class="col-lg-5 mt-3 mt-lg-0 order-2 order-md-1">
          <?php echo $row['value']; ?>

      </div>

      <div class="col-lg-7 position-relative order-1 order-md-2">
          <!--<img src="assets/images/vdImg.webp" alt="" class="w-100">-->
          <video id="video22" width="100%" preload="auto" controls> 
              <source src="assets/images/about-voltenix.mp4" type="video/mp4">
          </video>
          <!--<h6 class="vdText">We are an independent, agile, client-cantric, consulting firm with offices around the globe</h6>-->
      </div>    
 

    </div>
  </div>
</div>

 

<div class="aboutVoltenix mt-5 py-0">
  <?php
  $sql = "SELECT * FROM contents WHERE name='eass_plateform_edit'";
  $result_page = mysqli_query($GLOBALS['con'], $sql);
  $row = mysqli_fetch_array($result_page)
  ?>


  
  
<div class="container">
<div class="row align-items-center my-3">
<div class="col-lg-7 position-relative">
<!--<img src="assets/images/vdImg1.webp" alt="EaaS Platform" class="w-100">-->
<video id="video2" width="100%" preload="auto" controls> 
    <source src="assets/images/eaas-platform.mp4" type="video/mp4">
</video>

 </div>
 
<div class="col-lg-5 mt-3 mt-lg-0">
  <?php echo $row['value']; ?>

</div>


</div>
</div> 
  
  

</div>

<?php
$sql = "SELECT * FROM contents WHERE name='why_choose_voltenix'";
$result_page = mysqli_query($GLOBALS['con'], $sql);
$row = mysqli_fetch_array($result_page)
?>

<?php echo $row['value']; ?>


<?php
$sql = "SELECT * FROM contents WHERE name='partner_section_edit'";
$result_page = mysqli_query($GLOBALS['con'], $sql);
$row = mysqli_fetch_array($result_page)
?>




<?php echo $row['value']; ?>




 
 <div class="contactWrappers mt-md-5 mb-5"> 
<div class="container">
<div class="row ">

<div class="col-lg-6 col-xl-5">

<h2 class="homeTitle mb-4 mt-4">Contact Us</h2>
<h6 class="mb-3">Ready to optimize your energy storage systems with our advanced Battery Management solutions?</h6>
<p> "Ready to optimise your energy usage with our advanced Ai powered energy management solutions?"</p>
</div>
<div class="col-xl-2 col-lg-1 d-none d-lg-block"></div>
<div class="col-lg-5 col-xl-5">
<form  method="post" id="my_captcha_form">

<div class="d-flex flex-wrap">

<div class="col-md-6"> 
<div class="form-group">
<input class="form-control" type="text" name="fname" id="fname" maxlength="50"  onkeypress="return checkNum(event)"placeholder="* First Name" value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname'], ENT_QUOTES) : ''; ?>" required />
</div>
</div>


<div class="col-md-6"> 
<div class="form-group">
<input class="form-control" type="text" name="lname" maxlength="50"  onkeypress="return checkNum(event)"placeholder="* Last Name" value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname'], ENT_QUOTES) : ''; ?>" required />
</div>
</div>

<div class="col-md-6"> 
<div class="form-group">
<input class="form-control" type="email" name="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"  title="Invalid email address is valid@email.com" maxlength="100" placeholder="* Email Address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>" required />
</div>
</div>

<div class="col-md-6"> 
<div class="form-group">
<input class="form-control" type="text" name="phone" id="phone"  minlength="10"    placeholder="* Phone Number"  value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES) : ''; ?>" required />
</div>
</div>

<div class="col-md-12"> 
<div class="form-group">
<input class="form-control" type="text" name="subject" id="subject" maxlength="50" placeholder="* Subject" value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject'], ENT_QUOTES) : ''; ?>" required />
</div>
</div>
<div class="col-md-12"> 
<div class="form-group">
<textarea class="form-control" name="message" id="message" placeholder="Message"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES) : ''; ?></textarea>
</div>
</div>
<div class="col-md-12"> 
 <div class="g-recaptcha" data-sitekey="6LfiB2opAAAAAP6ScjNF4PvYfzls0kEm8xF8pJl8"></div>
<div class="form-group mt-3">
<input type="submit" name="submit" value="Send Message" class="btn btn-theme" >
</div>
</div>


</div>

</form>

</div>

</div>
</div>
</div>  
 




<?php include('layout/footer.php') ?>

<script>
  // only accept number
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      alert("Please enter only 10 digit number");
      return false;
    }
    return true;
  }


  // only accept char
  function checkNum() {
    var ch = String.fromCharCode(event.keyCode);
    var filter = /[a-zA-Z ]/;
    if (!filter.test(ch)) {
      alert("Please enter only char");
      event.returnValue = false;
    }



  }


  function phoneno() {
    $('#phone').keypress(function(e) {
      var a = [];
      var k = e.which;

      for (i = 48; i < 58; i++)
        a.push(i);

      if (!(a.indexOf(k) >= 0))
        e.preventDefault();
    });
  }
</script>

<script>


document.getElementById("my_captcha_form").addEventListener("submit",function(evt)
  {
  
  var response = grecaptcha.getResponse();
  if(response.length == 0) 
  { 
    //reCaptcha not verified
    alert("Please check security recaptcha !!"); 
    evt.preventDefault();
    return false;
  }
  //captcha verified
  //do the rest of your validations here
  
});
    function validateContactUsForm() {
    var formObj = document.contactUs;


    if (formObj.name.value.trim() == ''){
    alert('Please Enter Name.');
    formObj.name.focus();
    return false;
    }

    if (formObj.email.value.trim() == ''){
    alert('Please Enter Email.');
    formObj.email.focus();
    return false;
    }

    if (formObj.phone.value.trim() == ''){
    alert('Please Enter Phone No.');
    formObj.phone.focus();
    return false;
    }

    if (formObj.last_name.value.trim() == ''){
    alert('Please Enter Last Name.');
    formObj.last_name.focus();
    return false;
    }

    if (formObj.Message.value.trim() == ''){
    alert('Please Enter Comment.');
    formObj.Message.focus();
    return false;
    }

    if (!grecaptcha.getResponse()){ 
    alert("Please Check CAPTCHA Checkbox.");
    return false;
    }

    return true;
    }

    function echeck(str) {
    var at="@"
    var dot="."
    var lat=str.indexOf(at)
    var lstr=str.length
    var ldot=str.indexOf(dot) 

    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
    alert("Invalid E-mail ID")
    return false
    }

    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
    alert("Invalid E-mail ID")
    return false
    }

    if (str.indexOf(at,(lat+1))!=-1){
    alert("Invalid E-mail ID")
    return false
    }

    if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
    alert("Invalid E-mail ID")
    return false
    }

    if (str.indexOf(dot,(lat+2))==-1){
    alert("Invalid E-mail ID")
    return false
    }

    if (str.indexOf(" ")!=-1){
    alert("Invalid E-mail ID")
    return false
    }

    return true;                               
    }
</script>
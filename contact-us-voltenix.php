<?php
include('layout/header.php');
include('admin/include/dbconnect.php');
include('lib/class.sendgridmail.php');

?>

<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="innerBanner">
  <img src="assets/images/contact-us.webp" alt="" class="w-100">
  <div class="innerContent">
    <h1>Contact Us</h1>
    <p>WE ARE HERE</p>
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
    //$phone=isset($_POST['phone'])?$_POST['phone']:'';
    $name = $fname . " " . $lname;


    $insert_contact = "INSERT INTO `contactus` (

            `MessageID` ,

            `Name`,

            `Email`,

            `Subject`,

            `Message`,

            `Date`

            )

            VALUES ('', '$name', '$email','$subject','$message', '" . time() . "') ";

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
<div>
  <center><?php echo  $msg; ?></center>
</div>




<div class="eaaS-platformForm py-5">
  <div class="container">

    <div class="centerboxes2">
    <div class="row justify-content-center m-0">
      <div class="col-lg-4 col-md-5   p-md-0">
        <div class="platformForm-left  cnts">
        <div>
          <?php
          $query_contact = "SELECT name, value FROM contents WHERE name = 'contact_us_address_text'";
          $result_contact = custom_my_sql_query($GLOBALS['con'], $query_contact);
          $contact_us_row = custom_my_sql_fetch_array($result_contact)
          ?>
          <?php echo $contact_us_row['value']; ?>
          <div class="row">
              <div class="col-2 col-md-2 col-xl-2">&nbsp;</div>
              <div class="col-10 col-md-10 col-xl-10 pl-0">
               <ul class="ftpSocial mb-4">

            <!--  <li>
                                   <?php
                                    $query = "SELECT name, value FROM contents WHERE name = 'linkedin'";
                                    $result2 = custom_my_sql_query($GLOBALS['con'], $query);
                                    $social_row = custom_my_sql_fetch_array($result2)
                                    ?>
                                <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-linkedin-in"></i></a>
                            </li> -->
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'facebook'";
              $result3 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result3)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-facebook"></i></a>

            </li>
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'twitter'";
              $result4 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result4)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'youtube'";
              $result5 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result5)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-youtube"></i></a>
            </li>
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'instagram'";
              $result6 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result6)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>    

              </div>  
          </div>

          

        </div>
        </div>

      </div>

      <div class="col-lg-8 col-md-7   p-md-0">
        <div class="platformFormRight">
          <h2>Contact us</h2>




          <form method="post" onsubmit="return checkForm(this);" action="">
            <div class="row mt-4">
              <div class="col-md-6 mb-3">
                <input class="form-control" type="text" name="fname" id="fname" maxlength="50" onkeypress="return checkNum(event)" placeholder="* First Name" value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname'], ENT_QUOTES) : ''; ?>" required="">
              </div>

              <div class="col-md-6 mb-3">
                <input class="form-control" type="text" name="lname" id="lname" maxlength="50" onkeypress="return checkNum(event)" placeholder="* Last Name" value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname'], ENT_QUOTES) : ''; ?>"  required="">
              </div>
              <div class="col-md-6 mb-3">
                <input class="form-control" type="email" name="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Invalid email address is valid@email.com" placeholder="* Email Address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>" required="">
              </div>

              <div class="col-md-6 mb-3">
                <input class="form-control" type="text" name="subject" id="subject" maxlength="50" placeholder="* Subject" value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject'], ENT_QUOTES) : ''; ?>" required="">
              </div>

              <div class="col-md-12 mb-3">
                <textarea class="form-control" name="message" id="message" placeholder="Message"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES) : ''; ?></textarea>
              </div>


              <div class="col-md-12 mb-3 checkNewBox">
                  <input type="checkbox" name="terms" id="html">
                 <label for="html"> I have read your <a href="javascript:;" class="click-show under-line">Privacy Policy</a> and I'm happy to proceed.</label> 
              </div>
              <div class="g-recaptcha" data-sitekey="6LfiB2opAAAAAP6ScjNF4PvYfzls0kEm8xF8pJl8" ></div>
              <div class="col-md-12 mt-4">
                <input type="submit" name="submit" value="Send Message" class="btn cont-form-btn">
              </div>


            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    
      <div class="centerboxes2 mt-5"> 
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2688.8499219559762!2d-122.13001009999999!3d47.629048499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906da16976f31b%3A0x471c9963a94db2b0!2s2018%20156th%20Ave%20NE%20Suite%20100%2C%20Building%20F%2C%20Bellevue%2C%20WA%2098007%2C%20USA!5e0!3m2!1sen!2sin!4v1709033522051!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
 
    
    
    
  </div>
</div>




<div class="privacy-backdrop fade"></div>   
        <div class="box privacy-box">
            <div class="cross-arrow">
                <img src="assets/images/cross-sign.svg" alt="">
            </div>
            <div class="privacy-p">
              <div class="heading">
                <h5>Privacy and Policy</h5>
              </div>
              <div class="polices">
                <h4>Voltenix Email Privacy Policy</h4>
                <p>At Alonzi Ventures, we deeply value your privacy and the trust you place in us when sharing your personal information. Our commitment to safeguarding your privacy is reflected in our comprehensive email privacy policy, which outlines how we handle and protect your data.</p>
                <p>Collection of Information: We collect personal information, such as your email address and name, only when you voluntarily provide it to us through our website, correspondence, or other direct contacts from you.</p>
              </div>
              <div class="policy-points">
                <div class="list">
                    <h6>Use of Information:</h6>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
                </div>
                <div class="list">
                    <h6>Use of Information:</h6>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
                </div>
                <div class="list">
                    <h6>Use of Information:</h6>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
                </div>
                <div class="list">
                    <h6>Use of Information:</h6>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
                </div>
                <div class="list">
                    <h6>Use of Information:</h6>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
                </div>
                <div class="list">
                    <h6>Use of Information:</h6>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
                    <p>The information you provide is used solely for the purpose for which you have shared it. This includes responding to your inquiries, sending updates about our services and opportunities, and improving our offerings and customer service.</p>
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
      alert("Please enter only character");
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

<script>

  var checkForm = function(form) {

 //alert(checkForm);
    if(!form.terms.checked) {
      alert("Please accept privacy policy before submittion");
      form.terms.focus();
      return false;
    }
 var response = grecaptcha.getResponse();

    if(response.length == 0) {
      alert("Please check security recaptcha !!"); 
    return false;
    }

    return true;
  }


</script>


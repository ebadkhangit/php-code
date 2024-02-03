
	<script>
//accept only number   
        function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
     //accept only alphabet spaces
     function alphaOnly(evt) {
    var charCode = (evt.which) ? evt.which : window.event.keyCode;

    if (charCode <= 13) {
        return true;
    }
    else {
        var keyChar = String.fromCharCode(charCode);
        var re = /^[a-zA-Z ]+$/
        return re.test(keyChar);
    }
}
	// accept opnly number and dot like 4000,400.20
function checkDec(el){
 var ex = /^[0-9]+\.?[0-9]*$/;
 if(ex.test(el.value)==false){
   el.value = el.value.substring(0,el.value.length - 1);
  }
}
	</script>
<script type = "text/javascript">
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}

</script>


<script>
function validate()
{ 
var fullname = document.register.fullname.value;
var email = document.register.email.value;
var username = document.register.username.value; 
var password = document.register.password.value;
var conpassword= document.register.conpassword.value;
if (fullname==null || fullname=="")
{ 
alert("Full Name can't be blank"); 
return false; 
}
else if (email==null || email=="")
{ 
alert("Email can't be blank"); 
return false; 
}
else if (username==null || username=="")
{ 
alert("Username can't be blank"); 
return false; 
}
else if(password.length&amp;lt;6)
{ 
alert("Password must be at least 6 characters long."); 
return false; 
} 
else if (password!=conpassword)
{ 
alert("Confirm Password should match with the Password"); 
return false; 
} 
} 
</script> 


<?php
$success="<div class='alert alert-success alert-dismissible fade show col-sm-offset-4 col-sm-4' role='alert' style='position:absolute;z-index:9999;border:1px solid green;box-shadow:3px 3px green;color:#000;'>
		<h3>Hello $fname $lname </h3><hr>
  	<h4>You are an eligible candidate for Clear Aligners.<br> We contact you shortly to know more and serve you better.</h4> 
 	 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	<span aria-hidden='true'>&times;</span>

   	 
  	</button>
</div>";
?>

<script type = "text/javascript">
   <!--
      function validateEmail() {
         var emailID = document.myForm.EMail.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) {
            alert("Please enter correct email ID")
            document.myForm.EMail.focus() ;
            return false;
         }
         return( true );
      }
   //-->
</script>
<script>
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert("Please enter only Numbers.");
    return false;
  }

  return true;
}

//accept only character space
function ischar(){
     var ch = String.fromCharCode(event.keyCode);
     var filter = /[a-zA-Z ]/   ;
     if(!filter.test(ch)){
		  alert("Please enter only char or space");
          event.returnValue = false;
     }
}

function validateForm() {
  var phoneNo = document.getElementById('txtPhoneNo');

  if (phoneNo.value == "" || phoneNo.value == null) {
    alert("Please enter your Mobile No.");
    txtPhoneNo.focus();
    return false;
  }
  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    txtPhoneNo.focus();
    return false;
  }
  return true;
}
</script>

onclick="return confirm('Are you sure you want to Remove?');"




<form name="myForm" action="/action_page.php" onsubmit="return validateForm()" method="post">
Name: <input type="text" name="fname">
<input type="text" name="mobile" id="txtPhoneNo" class="form-control" placeholder="Enter Mobile Number" onkeypress="return isNumber(event)" required/>


<input type="submit" value="Submit">
</form>


<script> 
function GEEKFORGEEKS()                                    
{ 
    var name = document.forms["RegForm"]["Name"];               
    var email = document.forms["RegForm"]["EMail"];    
    var phone = document.forms["RegForm"]["Telephone"];  
    var what =  document.forms["RegForm"]["Subject"];  
    var password = document.forms["RegForm"]["Password"];  
    var address = document.forms["RegForm"]["Address"];  
   
    if (name.value == "")                                  
    { 
        window.alert("Please enter your name."); 
        name.focus(); 
        return false; 
    } 
   
    if (address.value == "")                               
    { 
        window.alert("Please enter your address."); 
        name.focus(); 
        return false; 
    } 
       
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf("@", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf(".", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (phone.value == "")                           
    { 
        window.alert("Please enter your telephone number."); 
        phone.focus(); 
        return false; 
    } 
   
    if (password.value == "")                        
    { 
        window.alert("Please enter your password"); 
        password.focus(); 
        return flase; 
    } 
   
    if (what.selectedIndex < 1)                  
    { 
        alert("Please enter your course."); 
        what.focus(); 
        return false; 
    } 
   
    return true; 
}</script> 

<script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
      
         if( document.myForm.Name.value == "" ) {
            alert( "Please provide your name!" );
            document.myForm.Name.focus() ;
            return false;
         }
         if( document.myForm.EMail.value == "" ) {
            alert( "Please provide your Email!" );
            document.myForm.EMail.focus() ;
            return false;
         }
         if( document.myForm.Zip.value == "" || isNaN( document.myForm.Zip.value ) ||
            document.myForm.Zip.value.length != 5 ) {
            
            alert( "Please provide a zip in the format #####." );
            document.myForm.Zip.focus() ;
            return false;
         }
         if( document.myForm.Country.value == "-1" ) {
            alert( "Please provide your country!" );
            return false;
         }
         return( true );
      }
   //-->
</script>

  <form action="/action_page.php">
    <label for="usrname">Username</label>
    <input type="text" id="usrname" name="usrname" required>

    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <input type="submit" value="Submit">
  </form>
</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
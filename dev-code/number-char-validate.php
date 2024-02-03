 <input type ="text" name="patientname" id="patientname" class="form-control"  placeholder ="Enter patient name" onkeypress="return checkNum()">	
 
  <input type ="tel" name="mobile" id="mobile" class="form-control"  placeholder="Enter mobile no." onkeypress="return isNumber(event)"   >
  
  <script>
   // only accept number
      function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        alert("Please enter only number");
        return false;
    }
    return true;
}
      
      // only accept char
      function checkNum()
{
var ch = String.fromCharCode(event.keyCode);
     var filter = /[a-zA-Z ]/   ;
     if(!filter.test(ch)){
         alert("Please enter only char");
          event.returnValue = false;
     }
    


}
    </script>
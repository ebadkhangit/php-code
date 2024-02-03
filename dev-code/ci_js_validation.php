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
	 <?=form_input('name',set_value('name'),['class'=>'form-control','required'=>'required','pattern'=>'[a-zA-Z. ]{3,100}','title'=>'3 to 100 character allowed','onkeypress'=>'return alphaOnly(event)']);?>
	
	 <?= form_input('mobile',set_value('mobile'),['class'=>'form-control','required'=>'required','pattern'=>'\d{10}','title'=>'10 number allowed','maxlength'=> '10','onkeypress'=>'return isNumberKey(event)']); ?>

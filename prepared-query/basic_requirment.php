<?php
session_start();
if($_SESSION['login_user_id']==""){ 
    echo "<script>window.location.href='../logout.php'</script>";
}else{
$login_user_id = $_SESSION['login_user_id'];
$login_user_display_name = $_SESSION['login_display_name'];
}
     date_default_timezone_set('Asia/Kolkata');
     $currentDateTime = date( 'd-m-Y h:i:s A', time () );
     $currentDate = date( 'd-m-Y');
?>
<?php include_once '../db/config.php';?>






<script>

    function totalCost(data){
   alert(data);
    if(data)
       {
        var goods_box_qty = document.getElementById("goods_box_qty").value;
           //document.getElementById("qty_cost").value = (rate_kg*data).toFixed(3);
           if(goods_box_qty<data){
               alert('Enter qty is greater then total qty!');
               document.getElementById("req_boxt_qty").value = goods_box_qty;
           }else{
               document.getElementById("req_boxt_qty").value = data;
           }
       }
}

    function totalCost4(data){
    //alert(data);
    if(data)
       {
        var req_boxt_qty2 = document.getElementById("req_boxt_qty").value;
     // alert(req_boxt_qty2);
    var price = parseFloat($('#exfactry_amount').val());
   // alert(price);
    $('#exfactry_amount2').val((req_boxt_qty2 * price ? req_boxt_qty2 * price : 0).toFixed(2));
           //document.getElementById("qty_cost").value = (rate_kg*data).toFixed(3);
         
}

}




  function totalCost3(data){
    //alert(data);
    if(data)
       {
        var sale_amount = document.getElementById("sale_amount").value;
     // alert(req_boxt_qty2);
    var exfac = parseFloat($('#exfactry_amount2').val());
    alert(exfac);
    $('#totalfundammot').val((exfac-sale_amount).toFixed(2));
           //document.getElementById("qty_cost").value = (rate_kg*data).toFixed(3);
         
}

}




function value_blank()
{
            document.getElementById("total_amt").value = "";
           document.getElementById("advance_amt").value="";
           document.getElementById("commission").value="";
            document.getElementById("balance_amt").value="";
}

function validate(event)
{

if ((event.keyCode < 48 || event.keyCode > 57))
{
   event.returnValue = false;
}
}


</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#formulation_id').on('change',function(){
    var formulation_id = $(this).val();
	//alert(formulation_id);
    if(formulation_id){
        $.ajax({
            type:'POST',
            url:'../layoutfiles/fetch_finish_goods_pmcard.php',
            data:'formulation_id='+formulation_id,
            success:function(html){
				//alert(html);
               // var nameArr = html.split(',');
               // document.getElementById("rate_kg").value = nameArr[0];
                // document.getElementById("goods_box_qty").value = nameArr[1];
                $('#pmcard_id').html(html);
                //$('#showCust').value(html);
            }
        });
    }else{
        $('#pmcard_id').html('<option value="">Select Formulation first</option>');
    }
});
  });
   </script>

<script type="text/javascript">
$(document).ready(function(){
$('#label_id').on('change',function(){
    var label_id = $(this).val();	
    var formulation_id = document.getElementById("formulation_id").value;
     var pmcard_id = document.getElementById("pmcard_id").value;
//alert(pmcard_id);
//alert(formulation_id);
//alert(label_id);
    if(pmcard_id){
        $.ajax({
            type:'POST',
            url:'../layoutfiles/fetch_finish_goods_qtyprice.php',
            data:'pmcard_id='+pmcard_id+'&formulation_id='+formulation_id+'&label_id='+label_id,
            success:function(html){
				//alert(html);
                //document.getElementById("goods_box_qty").value = html;
                document.getElementById("stock_price_qty").innerHTML = html;
            }
        });
    }else{
        $('#pmcard_id').html('<option value="">Select PM Card first</option>');
    }
});
  });
    
$(document).ready(function(){
$('#pmcard_id_jbdhbjd').on('change',function(){
    var pmcard_id = $(this).val();	
    var formulation_id = document.getElementById("formulation_id").value;
    //alert(pmcard_id);
    //alert(formulation_id);
    if(pmcard_id){
        $.ajax({
            type:'POST',
            url:'../layoutfiles/fetch_finish_goods_qtyprice.php',
            data:'pmcard_id='+pmcard_id+'&formulation_id='+formulation_id,
            success:function(html){
				//alert(html);
                //document.getElementById("goods_box_qty").value = html;
                document.getElementById("stock_price_qty").innerHTML = html;
            }
        });
    }else{
        $('#pmcard_id').html('<option value="">Select PM Card first</option>');
    }
});
  });
    
    $(document).ready(function(){
$('#customer_id').on('change',function(){
    var customer_id = $(this).val();	
    if(customer_id){
        $.ajax({
            type:'POST',
            url:'../layoutfiles/fetch_customerdetail.php',
            data:'customer_id='+customer_id,
            success:function(html){
				//alert(html);
                //$('#goods_box_qty').value(html);
                 document.getElementById("hidecust").innerHTML = "";
                document.getElementById("customerdata").innerHTML = html;
            }
        });
    }else{
        $('#pmcard_id').html('<option value="">Select PM Card first</option>');
    }
});
  });
  
  function calculate_funcamt(val,exfactoryval)
  {
      if(val>=0){
      document.getElementById("fund_amount").value = parseInt(val)-parseInt(exfactoryval);
      
           var exfactry_amount2 = document.getElementById("exfactry_amount2").value;
           var sale_amount = document.getElementById("sale_amount").value;
      var req_boxt_qty2 = document.getElementById("req_boxt_qty").value;
     
            $('#totalfundammot').val((sale_amount *req_boxt_qty2- exfactry_amount2   ? sale_amount * req_boxt_qty2 -exfactry_amount2: 00).toFixed(2));
  $('#tot_sale_amount').val((sale_amount *req_boxt_qty2  ? sale_amount * req_boxt_qty2: 00).toFixed(2));
      }
      
  }
  
   function totalCalexfactammount(val,exfactoryval2)
  {
      if(val>=0){

      document.getElementById("fund_amount").value = parseInt(val)-parseInt(exfactoryval);
      }
      
  }
   </script>
<?php 

    include_once('header.php');

    include_once('include/function.php');

    include('left_panel.php');

?>

<link rel="stylesheet" href="css/facebox.css" type="text/css" />

<script type="text/javascript" src="js/facebox.js"></script>

<link rel="stylesheet" type="text/css" href="/js/datepicker/datepickr.css" />

<script type="text/javascript" src="/js/datepicker/datepickr.min.js"></script>

<link href="http://mottie.github.io/tablesorter/css/theme.default.css" rel="stylesheet">

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.13.3/jquery.tablesorter.js"></script>     



<script>



    $(document).ready(function() { 

        $("#myTable").tablesorter({



            // pass the headers argument and assing a object 

            headers: { 

                // assign the secound column (we start counting zero) 



                5: { 

                    // disable it by setting the property sorter to false 

                    sorter: false 

                } 

            } 

        }); 

    });



</script> 



<script>

    jQuery(document).ready(function($) {

        $('a[rel*=facebox]').facebox()

    })

</script>



<?php





    ////only for pagination

    @$start=$_GET['start'];

    if(!isset($start)) {                         // This variable is set to zero for the first page

        $start = 0;

    }



    $uriSegment = "where={$_REQUEST['where']}&operation={$_REQUEST['operation']}&keyword={$_REQUEST['keyword']}&fromDate={$_REQUEST['fromDate']}&toDate={$_REQUEST['toDate']}&c_id={$_REQUEST['c_id']}&orderStatus={$_REQUEST['orderStatus']}&barcode_value_hidden={$_REQUEST['barcode_value_hidden']}";

    $c_id = $_REQUEST['c_id'];

    $where = $_REQUEST['where'];

    $operation = $_REQUEST['operation'];

    $keyword = $_REQUEST['keyword'];

    $fromDate = $_REQUEST['fromDate'];

    $toDate = $_REQUEST['toDate'];



    $orderStatus = $_REQUEST['orderStatus'];



    if(isset($_REQUEST['filterOrders']) && $_REQUEST['filterOrders'] != ""){

        

        if($_REQUEST['barcode_value_hidden'] != '') {

            $arrTmp = explode(',', $_REQUEST['barcode_value_hidden']);

            $sql_search .= " AND (";

            $tmp = '';

            foreach(array_unique($arrTmp) as $pval){

                $tmp .= " p.sku = '{$pval}' OR p.id = '{$pval}' OR ";

            }

            $sql_search .= substr($tmp, 0, -3).") ";

        }

        

        if(isset($keyword) && $keyword != ""){

            $keyword2 = $keyword;

            if($operation == 'LIKE') {

                $keyword2 = '%'.$keyword.'%';

            }

            $sql_search .= " AND $where $operation '$keyword2'";            

        }



        if($fromDate != ''){

            $from = strtotime("$fromDate");            

            $sql_search .= " AND cm.memo_date >= $from ";

        }

        if($toDate != ''){

            $to = strtotime("$toDate 23:59:59");  

            $sql_search .= " AND cm.memo_date  <= $to ";

        }

        if(isset($orderStatus) && $orderStatus != ""){

            $sql_search .= " AND cm.memo_status = '$orderStatus'";

        }

        if(isset($c_id) && $c_id != ""){

            $sql_search .= " AND cm.customer_id = '$c_id'";

        }

    }



    $time = time();

    if(isset($_GET['act']) && $_GET['act'] == 'del'){

        $o_id = $_GET['o_id'];

        $delete_section = "DELETE FROM `customer_memo` WHERE `id` = '{$o_id}'";

        $bool = custom_my_sql_query($GLOBALS['con'], $delete_section);

        if($bool){

            $memoItemQ = custom_my_sql_query($GLOBALS['con'], "SELECT * FROM customer_memo_item WHERE memo_id='{$o_id}' ");

            while($data = custom_my_sql_fetch_assoc($memoItemQ)){

                $updateProduct =  custom_my_sql_query($GLOBALS['con'], "UPDATE `product` SET `updated_date` = $time, `status` = 'active' WHERE `id` ='{$data['product_id']}'");

            }

            $memoItemQ = custom_my_sql_query($GLOBALS['con'], "DELETE FROM customer_memo_item WHERE memo_id='{$o_id}' ");

            header("location: ".ADMIN_SERVER."approbation_orders_manager.php?msg_id=100&$uriSegment&start=$start");

        }        

    }







    $eu = ($start - 0); 

    $limit = 100;                                 // No of records to be shown per page.

    $this1 = $eu + $limit; 

    $back  = $eu - $limit; 

    $next  = $eu + $limit; 



    $page_name = "approbation_orders_manager.php";



    if($where == 'display_sku' || $_REQUEST['barcode_value_hidden'] != '') {

        $query_count  = "SELECT COUNT(cm.id) AS cnt FROM `customer_memo` AS cm, vendor AS v, customer_memo_item AS coi, product AS p WHERE cm. customer_id = v.VendorID AND cm.id = coi.memo_id AND coi.product_id = p.id $sql_search GROUP BY cm.id";

    } else {

        $query_count  = "SELECT COUNT(cm.id) AS cnt FROM `customer_memo` AS cm, vendor AS v WHERE cm. customer_id = v.VendorID $sql_search ";

    }

    $result_count = custom_my_sql_query($GLOBALS['con'], $query_count) or die(custom_my_sql_error($GLOBALS['con']) );

    $nums         = custom_my_sql_fetch_assoc($result_count);

    $nume         = $nums['cnt'];



    if($nume <= $start){

        $eu = "0";

    }



    if($where == 'display_sku' || $_REQUEST['barcode_value_hidden'] != '') {

        $fetch_orders  = "SELECT cm.*, v.* FROM `customer_memo` AS cm, vendor AS v, customer_memo_item AS coi, product AS p WHERE cm.customer_id = v.VendorID AND cm.id = coi.memo_id AND coi.product_id = p.id $sql_search GROUP BY cm.id ORDER BY cm.id DESC limit $eu, $limit";

    } else {

        $fetch_orders  = "SELECT * FROM `customer_memo` AS cm, vendor AS v WHERE cm.customer_id = v.VendorID $sql_search ORDER BY cm.id DESC limit $eu, $limit";

    }



    $result_orders = custom_my_sql_query($GLOBALS['con'], $fetch_orders);




?>



<!-- CONTENT --> 

<div id="content" class="white">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <h1>Approbation Orders Manager</h1>

        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">

            <?php include('include/message.php'); ?>

        </div>

    </div>



    <div class="bloc">

        <div class="title">

            Approbation Orders List  

        </div> 

        <div class="content">   

            <form name="frmProductSearchBySku" id="frmProductSearchBySku" method="get" action="/admin/approbation_orders_manager.php" >

                <input type="hidden" name="start" id="start" value="<?php echo $_GET['start']; ?>">

                <table width="100%" cellpadding="0" cellspacing="0">

                    <tr>

                        <td colspan="2">

                            <strong>Scan here for any product to search:</strong><br><br>

                            <input type="text" name="barcode_value" id="barcode_value" onmouseover="this.focus();" class="form-control" />

                            <input type="hidden" name="barcode_value_hidden" id="barcode_value_hidden" value="<?php echo $_REQUEST['barcode_value_hidden']; ?>" />

                        </td>

                    </tr>

                    <tr>

                        <td style="width:35%;"> 

                            <div style="float: left; margin-top: -30px;">

                                <div class="input" id="title_label">

                                    <select class="field1" name="where">

                                        <option value="virtual_order_id" <?php if ($where == 'virtual_order_id') { echo 'selected="selected"';} ?> >OrderID</option>

                                        <option value="display_sku" <?php if ($where == 'display_sku') { echo 'selected="selected"';} ?> >SKU</option>



                                    </select>&nbsp;

                                    <select class="field1" name="operation">

                                        <option value="=" <?php if ($operation == '=') { echo 'selected="selected"';} ?>>=</option>

                                        <option value="&gt;" <?php if ($operation == '&gt;') { echo 'selected="selected"';} ?>>&gt;</option>

                                        <option value="LIKE" <?php if ($operation == 'LIKE') { echo 'selected="selected"';} ?>>Like</option>

                                    </select>&nbsp;

                                    <input type="text" class="field1" name="keyword" value="<?php echo $keyword; ?>">&nbsp;



                                    <select class="field1" name="c_id" id="all_cust">

                                        <option value="">All Customers</option>

                                        <?php 

                                            $allCust = custom_my_sql_query($GLOBALS['con'], "SELECT VendorName, VendorID FROM vendor WHERE VendorStatus ='1' ORDER BY VendorName ASC");

                                            while($custArry = custom_my_sql_fetch_assoc($allCust))

                                            { 

                                                $name=  ucwords($custArry['VendorName']); 

                                            ?>



                                            <option value="<?php echo $custArry['VendorID']; ?>" <?php if ($custArry['VendorID'] == $c_id) { echo 'selected="selected"';} ?>><?php echo $name; ?></option>



                                            <?php   

                                            }

                                        ?>

                                    </select>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div style="float: left; margin-top: 20px;">

                                <div class="input" id="title_label">

                                    <!--<select name="orderStatus" id="all_order">

                                    <option value="">All Orders</option>

                                    <?php

                                        $codeList = custom_my_sql_query($GLOBALS['con'], "SELECT * FROM `statuscodes` ORDER BY `StatusDescription` asc");

                                        $orderStatusArr = array();

                                        while($codeObj = custom_my_sql_fetch_assoc($codeList)){

                                            $orderStatusArr[$codeObj['StatusCode']] = $codeObj['StatusDescription'];

                                        ?>

                                        <option value="<?php echo $codeObj['StatusCode']; ?>" class="mainCategory" <?php if ($orderStatus == $codeObj['StatusCode']) echo 'selected="selected"'; ?> ><?php echo $codeObj['StatusDescription']; ?></option>

                                        <?php } ?>

                                    </select>

                                    &nbsp;<br />-->



                                    <strong>From Date:</strong> <input type="text" class="field1" name="fromDate" id="fromDate" value="<?php echo $fromDate; ?>">&nbsp;<br />

                                    <strong>To Date:</strong> <input type="text" class="field1" name="toDate" id="toDate" value="<?php echo $toDate; ?>">

                                </div>

                                <div class="container-fluid">

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">

                                            <div class="form-group brdTop">

                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <input class="btn btn-primary btn-sm" type="submit" name="filterOrders" id="submit1" value="Filter Orders" />&nbsp;&nbsp;

                                                    <input class="btn btn-primary btn-sm" type="button" name="reset" id="reset" value="Reset" onclick="javascript:location.href='approbation_orders_manager.php';" />

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <script type="text/javascript">

                                new datepickr('fromDate', {

                                    'dateFormat': 'm/d/Y'

                                });

                                new datepickr('toDate', {

                                    'dateFormat': 'm/d/Y'

                                });

                            </script>

                        </td>

                    </tr>

                </table>

            </form>

            <br><br>

            <table width="100%" cellpadding="0" cellspacing="0" style="padding-top: 10px;" id="myTable">

                <thead>

                    <tr style="height: 25px;">

                        <th>Order ID</th>

                        <th>Company Name</th>

                        <th>Contact Person</th>

                        <th>Order Date</th>

                        <th>Approbation Date</th>

                        <th>Order Status</th>

                        <th>Price</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php 

                        $fancyboxIds = array();

                        $pageTotal = 0;

                        if($nume > 0){

                            while($orderArray = custom_my_sql_fetch_assoc($result_orders)){

                                $fancyboxIds[] = "#th_".$orderArray['OrderID'];

                                $orderTotal = getMemoTotalPrice($orderArray['id'], $orderArray['total_discount'], $orderArray['memo_type']);

                                $pageTotal += $orderTotal;



                                $approbation_time = $orderArray['approbation_time'];

                                $now = time();

                                $datediff =  $approbation_time - $now;

                                $daysRemaining = floor($datediff/(60*60*24));

                                // echo "<br>".$daysRemaining;



                                if($daysRemaining)





                            ?>

                            <tr <?php if($daysRemaining <= 2 && $daysRemaining > 0) { ?> class="daysRemaining"<?php } else if($daysRemaining < 0) { /*echo 'class="daysRemainingNegative"';*/ } ?> >

                                <td><a href="approbation_order_detail.php?orderId=<?php echo $orderArray['id']; ?>" title="<?php echo $orderArray['virtual_order_id']; ?>"><?php echo $orderArray['virtual_order_id']; ?></a>&nbsp;&nbsp;

                                    <?php if($orderArray['memo_type'] == 'custom') {

                                            echo '<a class="btn btn-warning btn-xs" href="javascript:;" title="Custom">C</a>';

                                        } else {

                                            echo '<a class="btn btn-success btn-xs" href="javascript:;" title="Regular">R</a>';

                                    } ?>

                                </td>

                                <td><?php echo ucwords($orderArray['VendorName']); ?></td>

                                <td><?php echo ucwords($orderArray['contact_person']); ?></td>

                                <td><?php echo GetFormatedDate($orderArray['memo_date']); ?></td>

                                <td><?php echo GetFormatedDate($orderArray['approbation_time']); ?></td>

                                <td><!--<a title="Click to Change Status" id="th_<?php echo $orderArray['OrderID']; ?>" href="change_order_status.php?orderId=<?php echo $orderArray['OrderID']; ?>">--><?php echo ucwords($orderArray['memo_status']); ?><!--</a>--></td>

                                <td><?php echo SITE_CURRENCY.getSPrintF($orderTotal); ?></td>

                                <td> <a class="btn btn-danger btn-xs ask" href="approbation_orders_manager.php?act=del&o_id=<?php echo $orderArray['id'].'&'.$uriSegment.'&start='.$start; ?>" title="Delete">

                                        <i class="fa fa-close"></i>

                                    </a>
              
                   <button type="button" class="btn btn-primary"  onclick="sendMail('<?php echo $orderArray['id'];?>')">

                                        <i class="fa fa-envelope"></i> Send Reminder

                                    </button> 
                                  
                          



                             
                                </td> 


                            </tr>

                            <?php } 

                        ?>

                    </tbody>

                    <tfoot>

                        <tr style="height: 35px;">

                            <td colspan="6" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #FF0000; text-align: right; padding-right: 10px; font-weight: bold; vertical-align: middle;">Page Total:</td>

                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #FF0000; font-weight: bold; vertical-align: middle;"><?php echo SITE_CURRENCY.getSPrintF($pageTotal); ?></td>

                            <td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #FF0000; font-weight: bold;">&nbsp;</td>

                        </tr>



                        <?php

                        }else{ ?>

                        <tr>

                            <td colspan="8" style="text-align:center;" class="alert alert-danger">Records not found.</td>

                        </tr>

                        <?php } ?>

                    <?php  if($nume > $limit ){ ?>

                        <tr>

                            <td colspan="8"><?php

                                echo "<table align = 'right' width='50%' ><tr><td  align='left' width='50%' >";

                                if($back >=0) { 

                                    print "<a href='$page_name?start=$back&$uriSegment'><font face='Verdana' size='1'>PREV</font></a>"; 

                                } 

                                echo "</td><td align=center width='30%'>";

                                $i=0;

                                $l=1;

                                for($i=0;$i < $nume;$i=$i+$limit){

                                    if($i <> $eu){

                                        echo " <a href='$page_name?start=$i&$uriSegment'><font face='Verdana' size='1'>$l</font></a> ";

                                    } else { 

                                        echo "<font face='Verdana' size='2' color=red>$l</font>";

                                    }

                                    $l=$l+1;

                                }

                                echo "</td><td  align='right' width='30%'>";

                                if($this1 < $nume) { 

                                    print "<a href='$page_name?start=$next&$uriSegment'><font face='Verdana' size='1'>NEXT</font></a>";} 

                                echo "</td></tr></table>";

                            ?></td>

                        </tr>

                        <?php } ?>

                </tfoot>



            </table>

        </div>

        <!-- end of right content-->

    </div>

    <!--end of center content -->

    <div class="clear"></div>

</div>


<?php include('footer.php');

    echo $javaScript .= "<script type='text/javascript'>

    $(document).ready(function() {



    $('".implode(",", $fancyboxIds)."').fancybox({

    opacity : 0.5,

    'titleShow'     : false,

    'width'                : '50%',

    'height'            : '100%',

    'autoScale'         : false,

    'transitionIn'        : 'none',

    'transitionOut'        : 'none',

    'type'                : 'iframe'

    });



    });

    </script>"; 





?>


<script type="text/javascript">

   function sendMail(orderid){  
  // alert(orderid);  
 $.ajax({

                     type:'POST',
                     url: "sendmail.php?oid="+orderid,
                       
                      success: function(data) {
                    //alert(data);
                    alert("Email Successfully Send !!");
                  

                }
            });



    }



    $(function(){

        $('#all_cust').change(function(){



            $('#submit1').click();

        });



        $('#all_order').change(function(){



            $('#submit1').click();

        }); 





    });

    

    

    

    

    $( document ).ready(function() {

        $('#barcode_value').focus();

        

        $('#barcode_value').on('input', function() {

            if($('#barcode_value').val().slice(-1) == '-' ) {

                

                if ($('#barcode_value_hidden').val() == '') {

                    $('#barcode_value_hidden').val($('#barcode_value').val().replace('-',''));

                } else {

                    $('#barcode_value_hidden').val($('#barcode_value_hidden').val()+','+$('#barcode_value').val().replace('-',''));

                }

                 window.location.href = 'approbation_orders_manager.php?filterOrders=1&barcode_value_hidden='+$('#barcode_value_hidden').val();

            }            

            

        });

        

    });



</script>

// =========================    send mail php ===========================================//


<?php 

    include('header.php');

    include('include/function.php');

    include('left_panel.php');

include('../lib/class.sendgridmail.php');

//  ebad kahn code send mail on every order send  mail ======================//
$orderid = $_REQUEST['oid'];
 
$SQL1 = custom_my_sql_query($GLOBALS['con'], "SELECT * FROM `customer_memo` AS cm, vendor AS v WHERE id = '{$orderid}' AND cm.customer_id = v.VendorID");


//$SQL1 = custom_my_sql_query($GLOBALS['con'], "SELECT OrderStatus, approbation_time, VirtualOrderID, CustomerID FROM orderprocess WHERE OrderID='$orderid'");    

$SQLRes1 = custom_my_sql_fetch_array($SQL1);
 $dateapp = GetFormatedDate($SQLRes1['approbation_time']);


if ($orderid !== 0) {

    $customerData = custom_my_sql_fetch_array(custom_my_sql_query($GLOBALS['con'], "SELECT * FROM customer WHERE CustomerID = '{$SQLRes1['CustomerID']}'"));
      // $customername = $customerData['CustomerFirst'].' '.$customerData['CustomerLast'];
  

    $Text = ' Dear ' . $SQLRes1['contact_person'] .'<br><br>'. ' Your  Approbation - Order Number is. ' . $SQLRes1['virtual_order_id'] .'<br>'. ' Your Approbation Order Due Date is. ' . $dateapp ;

    $subject = DOMAIN_NAME . 'Your Approbation Orde Due Date. ';



    /*$mailerObj = new MailClass();



    $emailArr = retrieveMailArr();

    foreach ($emailArr AS $mailObj) {

        $mailerObj->AddBCC($mailObj[0], $mailObj[1]);

    }



    $mailerObj->AddAddress($customerData['CustomerEmail']);

    $mailerObj->Subject = $subject;

    $mailerObj->Sender  = SALES_EMAIL;

    $mailerObj->From = SALES_EMAIL;

    $mailerObj->FromName = $DomainName;

    $mailerObj->Body = $Text;

    $mailerObj->IsHTML(true);

    $mailerObj->Send(); */

    

    

    $mailerObj = new SendGridMailClass();

    $emailArr = retrieveMailArray();                

    array_push($emailArr, SALES_EMAIL);

    array_push($emailArr, 'ebadullah76@gmail.com');

    $emailNotificationArrayAdmin = $emailArr;

    //$emailNotificationArrayAdmin = array('vijay@inovetic.com');

    $mailerObj->toArray = $emailNotificationArrayAdmin;

    $mailerObj->FromName = $DomainName;  

    

    $mailerObj->body = $Text;

    $mailerObj->subject = $subject;  

    $mailerObj->sendMail();

    

    

    echo '1';

} else {

    echo '0';

}


    
    include('footer.php');   

?>



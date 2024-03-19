<?php 
    $page_title = 'Stock Availibility Report';
    include_once('header.php');

    //only for pagination
    @$start=$_GET['start'];
    if(!isset($start)) { // This variable is set to zero for the first page
        $start = 0;
    }
    $time = time();

    $sql_search = $sql_search = "WHERE 1 = 1 ";
    $joinTable = "";	

    $eu = ($start - 0); 
    $limit = 100;                                 // No of records to be shown per page.
    $this1 = $eu + $limit; 
    $back  = $eu - $limit; 
    $next  = $eu + $limit; 

    $page_name = "stock-availability-report.php";
?>

<!-- CONTENT --> 
<div  class="page-content">
    <div  class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h1 class="mb-sm-0 font-size-18">Stock Availibility Report&nbsp;&nbsp;
                        <!--	<a href="product_add.php class="btn btn-sm btn-outline-secondary waves-effect"><i class="bx bx-plus font-size-12 align-middle me-2"></i> Add New</a>-->
                    </h1>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php include('include/message.php');?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"> 
                    <form name="frmProductSearchBySku" id="frmProductSearchBySku" method="get" action="/stock-availability-report.php<?php echo $cnyQueryString; ?>">

                        <div class="form-group">
                            <div class="well">
                                <div class="row">

                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-9 col-12">
                                                <div class="row">
                                                    
                                                    <?php
                                                        $qrymetaltype = "SELECT * FROM `metaltype` order by `MetalID` asc";
                                                        $exqrymetaltype = custom_my_sql_query($GLOBALS['con'], $qrymetaltype) or die(custom_my_sql_error($GLOBALS['con']));
                                                        
                                                    ?>

                                                    <div class="col-md-2">
                                                        <div class="selectFluid">
                                                            <label>Metal Type</label>
                                                            <select name="metal_type" class="form-control" id="metal_type" onchange="document.frmProductSearchBySku.submit();">
                                                                <option value="">Metal Type</option>
                                                                
                                                                <?php while($metalArray = custom_my_sql_fetch_assoc($exqrymetaltype)){?>
                                                                    <option value="<?php echo $metalArray['MetalID']?>" <?php if($metalArray['MetalID'] == $_REQUEST['metal_type']){?> selected="selected" <?php }?>><?php echo $metalArray['MetalName'];?></option>      
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-12 text-end mb-2">
                                                <!--<input type="submit" name="do_search" id="submit1" value="Search Product" class="btn btn-primary btn-sm" />-->
                                                <input type="reset" name="reset" id="submit3" value="Reset" class="btn btn-warning btn-sm" onclick="location.href='stock-availability-report.php<?php echo $cnyQueryString; ?>';"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>


                    <table id="datatable" width="100%" cellpadding="0" cellspacing="0"  class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead>

                            <tr style="height: 25px;">
                                <th>Metal Type</th>
                                <th>In Stock(gram)</th>
                                <th>Sold Out(gram)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 

                                    if ($_REQUEST['metal_type'] != ''){  
                                        $qrymetaltype = "SELECT * FROM `metaltype` WHERE MetalID = '{$_REQUEST['metal_type']}' order by `MetalID` asc";
                                    }else {
                                        $qrymetaltype = "SELECT * FROM `metaltype` order by `MetalID` asc";
                                    }

                                    $exqrymetaltype = custom_my_sql_query($GLOBALS['con'], $qrymetaltype) or die(custom_my_sql_error($GLOBALS['con']));

                                    while($productArray = custom_my_sql_fetch_array($exqrymetaltype)){

                                        $arrayresult = custom_my_sql_fetch_assoc(custom_my_sql_query($GLOBALS['con'], "SELECT SUM(metalWeightPerGram) AS total FROM `product` WHERE status = 'active' AND metal_id={$productArray['MetalID']}"));
                                        $arrayresult_soldout = custom_my_sql_fetch_assoc(custom_my_sql_query($GLOBALS['con'], "SELECT SUM(metalWeightPerGram) AS total FROM `product` WHERE status = 'soldout' AND metal_id={$productArray['MetalID']}"));

                                    ?>

                                    <tr>																						

                                        <td><?php echo $productArray['MetalName']; ?></td>

                                        <td><?php if($arrayresult['total'] && $arrayresult['total'] != NULL) echo $arrayresult['total']; else echo "0.00"; ?></td>
                                        <td><?php if($arrayresult_soldout['total'] && $arrayresult_soldout['total'] != NULL) echo $arrayresult['total']; else echo "0.00";  ?></td>

                                        
                                    </tr>
                                    <?php } ?>
                        </tbody>

                    </table>
                    </form>
                </div>
                <!-- end of right content-->
            </div>
        </div>
        <!--end of center content -->

        <div class="clear"></div>
    </div>
</div>
<!--end of main content-->

<?php 
    $extraJS = '
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables_no_sorting.init.js"></script>

    <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- lightbox init js-->
    <script src="assets/js/pages/lightbox.init.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>';

    include ('footer.php'); 
?>

<script language="javascript" type="text/javascript">
    function validateChecked(){

        var namelist = new Array();
        var counter = 0;

        for(var i = 0; i < document.frmProductUpdate.productID.length; i++){
            if(document.frmProductUpdate.productID[i].checked) {
                namelist[counter++] = document.frmProductUpdate.productID[i].value;
            }
        }
        if (counter > 0 ){
            document.frmProductUpdate.productStr.value = namelist;
        } else {
            var event_id = document.frmProductUpdate.event_id.value;
            alert('Please select atleast one product to '+event_id+'.');
            return false;
        }

        if(document.frmProductUpdate.productDelete.value == 1) {
            if (confirm("All the products and its images will also be permanent deleted from the server. Are you sure?")) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    function CheckAll(chk){
        for (var i=0;i < document.frmProductUpdate.elements.length;i++){
            var e = document.frmProductUpdate.elements[i];
            if (e.type == "checkbox"){
                e.checked = chk.checked;
            }
        }
    }
</script>
<script language="javascript">
    $(function(){
        $('#search_status').change(function(){
            $('#submit1').click();
        });

        $('#category').change(function(){
            $('#submit1').click();
        }); 

        $('#vendor').change(function(){
            $('#submit1').click();
        });

        $('#product_type').change(function(){
            $('#submit1').click();
        });

    });

    function createDuplicateProduct(sku){

        $.ajax({
            url: "create_duplicate_product_ajax.php?sku="+sku,
            success: function(data){
                if (data != '') {
                    window.location.href="product_list.php?msg_id=25a";
                } 
            },
        }); 
    }


    $( document ).ready(function() {
        $('#barcode_value').focus();

        $('#barcode_value').on('input', function() {
            if($('#barcode_value').val().slice(-1) == '-' ) {

                if ($('#barcode_value_hidden').val() == '') {
                    $('#barcode_value_hidden').val($('#barcode_value').val().replace('-',''));
                } else {
                    $('#barcode_value_hidden').val($('#barcode_value_hidden').val()+','+$('#barcode_value').val().replace('-',''));
                }
                window.location.href = 'product_list.php?do_search=1&barcode_value_hidden='+$('#barcode_value_hidden').val();
            }            

        });

    });

</script>

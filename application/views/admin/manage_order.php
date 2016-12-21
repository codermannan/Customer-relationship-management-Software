<div class="row">
    <div class="col-lg-12">
        <?php if($this->session->flashdata('flash_message')){?>
            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('flash_message');?></div>
        <?php }?>
    </div>          <!-- /.col-lg-12 -->
</div>
<div class="row">
                <?php //$p=1250;echo $pp = substr(sprintf('%08d', $p),0,8);?>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">New Sales Order Entry</h3>
                        </div>
                        <?php
                            $attributes = array('name' => 'form-student', 'id' => 'form-student', 'class' => 'form-student');
                            echo form_open_multipart("admin/manage_orders/create", $attributes);
                        ?>
                        <div class="panel-body">
                        <div id="entryPanelDiv">
                            <table class="table table-bordered m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">Supplier</th>
                                        <td>
                                            <input type="text" name="supplier" id="supId" class="form-control" placeholder="Supplier" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                            <input type="hidden" name="supplierId" id="supplierId"/>
                                        </td>
                                        <th scope="row" style="vertical-align: middle;">Customer</th>
                                        <td>
                                            <input type="text" name="customer" id="cusId" class="form-control" placeholder="Customer" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                            <input type="hidden" name="customerId" id="customerId"/>
                                        </td>
                                        <th scope="row" style="vertical-align: middle;">Payment</th>
                                        <td>
                                            <select  name="payment_terms" required="" class="form-control" required="">
                                                <option value="">Please Select Method</option>
                                                <?php if(isset($pterms)): foreach ($pterms as $ptval):?>
                                                <option value="<?php echo $ptval['terms_id'];?>"><?php echo $ptval['terms'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </td>
                                        <th scope="row" style="vertical-align: middle;">Order Date</th>
                                        <td><input type="text" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" required="" name="order_date"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="panelTable">
                                <table data-page-size="7" class="table table-striped m-b-0 table-hover toggle-circle tablet breakpoint footable-loaded footable no-paging" id="demo-foo-addrow">
                                <thead>
                                    <tr>
                                        <th data-toggle="true" data-sort-initial="true" class="footable-visible footable-sortable" style="text-align: center;">Product Code<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Product Name<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-sorted-desc" style="text-align: center;">Price<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-sorted-desc" style="text-align: center;">Quantity<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-last-column" style="text-align: center;">Comm Type<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-last-column" style="text-align: center;">Commission<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-last-column" style="text-align: center;">Total<span class="footable-sort-indicator"></span></th>
                                        <th><button onclick="addMoreEmpRows(this.form);" class="demo-delete-row btn fa-plus btn-xs btn-icon fa fa-times btn btn-lg btn-default"></button></td></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="display: table-row;" class="footable-even">
                                        <td class="footable-visible">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Item Code" class="form-control" id="ItemCode1" name="item_code[1]" readonly="">
                                        </td>
                                        <td class="footable-visible">
                                            <select class="form-control" required="" name="prodcut[1]" data-parsley-id="28" onchange="getIteminfo(this.value,1);">
                                                <option value="">Please Select Product</option>
                                                <?php if(isset($products)): foreach ($products as $pvalue):?>
                                                <option value="<?php echo $pvalue['item_code'];?>"><?php echo $pvalue['item_name'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </td>
                                        <td class="footable-visible">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Prodcut Price" class="form-control" id="productPrice1" name="prodcut_price[1]" readonly="">
                                        </td>
                                        <td class="footable-visible">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Quantity" class="form-control" id="saleQty1" name="sale_qty[1]" onkeyup="getTotalprice(this.value,1);">
                                        </td>
                                        <td class="footable-visible">
                                            <select class="form-control" required="" name="comission_type[1]" id="comissionType[1]" data-parsley-id="28" onchange="commCalculation(this.value,1);">
                                                <option value="">Please Select</option>
                                                <option value="1">Percentage</option>
                                                <option value="2">Flat</option>
                                            </select>
                                        </td>
                                        <td class="footable-visible">
                                            <input type="text" placeholder="Commission" class="form-control" required="" name="commission[1]" id="commission1" readonly="">
                                        </td>
                                        <td class="footable-visible">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Total Price" class="form-control" id="totalPrice1" name="total_price[1]" value="0" onchange="getIteminfo(this.value);">
                                        </td>
                                        <td style="text-align: center;" class="footable-visible footable-first-column"><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td>
                                    </tr>
                                </tbody>
                        </table>
                            </div>
                            
                        </div>
                        
                        </div>
                        <div class="panel-footer" style="text-align: left;">
                            <?php
                                $submitButton = array(
                                                'name' => 'submit',
                                                'id' => 'submit',
                                                'value' => 'SAVE',
                                                'type' => 'submit',
                                                'class' => 'btn btn-primary'
                                            );
                                echo form_submit($submitButton);
                            ?>
                        </div>
                    </div>
                </div>
                <?php echo form_close();?>

<!-- /#end of employment table -->
</div>
<script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
<script type="text/javascript">
     //auto suggest
        $(function() {
            function displayResult(item) {
                  $('#customerId').val(item.value);
            }
            $('#cusId').typeahead({
                source: <?php echo $org.','; ?>
                onSelect: displayResult
            });
            //for supplier
            function displaySupplier(item) {
                  $('#supplierId').val(item.value);
            }
            $('#supId').typeahead({
                source: <?php echo $org.','; ?>
                onSelect: displaySupplier
            });
           
        });
      //auto row  
        var count = 1;
        function addMoreEmpRows(frm) {
            count++;
            var recRow = '<tr id="trid'+count+'"><td class="footable-visible"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Item Code" class="form-control" id="ItemCode'+count+'" name="item_code['+count+']" readonly=""></td><td class="footable-visible"><select data-parsley-id="18" name="prodcut['+count+']" required="" class="form-control"  onchange="getIteminfo(this.value,'+count+');"><option value="">Please Select Product</option><option value="00000001">Methy</option><option value="00000002">Ketone</option><option value="dfasf66">Ketone</option></select></td><td class="footable-visible"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Prodcut Price" class="form-control" id="productPrice'+count+'" name="prodcut_price['+count+']" readonly=""></td><td><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Quantity" class="form-control" id="saleQty'+count+'" name="sale_qty['+count+']"  onkeyup="getTotalprice(this.value,'+count+');"><td class="footable-visible"><select class="form-control" required="" name="comission_type['+count+']" id="comissionType['+count+']" data-parsley-id="28" onchange="commCalculation(this.value,'+count+');"><option value="">Please Select</option><option value="1">Percentage</option><option value="2">Flat</option></select></td><td class="footable-visible"><input type="text" placeholder="Commission" class="form-control" required="" name="commission['+count+']" id="commission'+count+'"></td><td class="footable-visible"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Total Price" class="form-control" id="totalPrice'+count+'" name="total_price['+count+']" value="0"></td><td style="text-align: center;"><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times" onclick="removeRow('+count+')"></button></td></tr>';
           
            $('#demo-foo-addrow tbody').append(recRow);
            
        } 
        function removeRow(id){
            $('#trid'+id).remove();
        }
        
        function getIteminfo(id,cnt){
            var xmlhttp;
            var icode = 'ItemCode'+cnt;
            var iprice = 'productPrice'+cnt;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                       var jsonObject = JSON.parse(xmlhttp.responseText);

                        if (jsonObject != null)
                        {
                            document.getElementById(icode).value=id;
                            document.getElementById(iprice).value=jsonObject[0].price;
                        }
                }
              }
            xmlhttp.open("GET","<?php echo base_url()?>index.php?setting/getProdcutByAjax/"+id,true);
            xmlhttp.send();
        
          }
          //For total price
          function getTotalprice(pqty,cnt){
              var iprice = 'productPrice'+cnt;
              var tprice = 'totalPrice'+cnt;
              var pprice = document.getElementById(iprice).value;
              var tolal = (pprice * pqty); 
              document.getElementById(tprice).value=tolal;
          }
          //commision calculation
          function commCalculation(id,cnt){
              var tprice = 'totalPrice'+cnt;
              var iqty = 'saleQty'+cnt;
              var icom = 'commission'+cnt;
              
              var tot = document.getElementById(tprice).value;
              var qty = document.getElementById(iqty).value;
              var com = 0;
              if(id==1){
                  com = ((tot*2)/100);
                  document.getElementById(icom).value=com;
              }else if(id==2){
                  com = (5*qty);
                  document.getElementById(icom).value=com;
              }
          }
          //For grand total
//          function grandTotalPrice(cnt){
//              
//              var tprice = 'totalPrice'+cnt;
//              
////              document.getElementById("grandTotal").value = null;
//              
//              var prodcutTotal = document.getElementById(tprice).value;
//              var ptoatal = document.getElementById("grandTotal").value;
//              
//              var netTotal = Number(prodcutTotal)+Number(ptoatal);
//              document.getElementById("grandTotal").value=netTotal;
//          }
</script>











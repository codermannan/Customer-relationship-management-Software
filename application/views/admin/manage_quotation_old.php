<div class="row">
    <div class="col-lg-12">
        <?php if ($this->session->flashdata('insert_message')){?>
            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('insert_message');?></div>
        <?php }else if($this->session->flashdata('update_message')) {?>
             <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('update_message');?></div>
        <?php }else if($this->session->flashdata('delete_message')) {?>
             <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('delete_message');?></div>
        <?php } ?>  
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12"> 
<div class="search-result-box m-t-40">
<ul class="nav nav-tabs"> 
<li class="active"> 
<a href="#list" data-toggle="tab" aria-expanded="true"> 
    <span class="visible-xs"><i class="fa fa-home"></i></span> 
    <span class="hidden-xs"><b>QUOTATION LIST</b></span> 
</a> 
</li> 
<li class=""> 
<a href="#add" data-toggle="tab" aria-expanded="false"> 
    <span class="visible-xs"><i class="fa fa-user"></i></span> 
    <span class="hidden-xs"><b>ADD QUOTATION</b></span> 
</a> 
</li>
</ul> 
<div class="tab-content"> 
<div class="tab-pane active" id="list">
<table id="datatable" class="table table-striped table-bordered">
<thead>
<tr>
    <th>Quotation No.</th>    
    <th>Date</th>
    <th>Time</th>
    <th>Customer</th>
    <th>Product</th>
    <th>Status</th>
    <th>User</th>
    <th>Method</th>
    <th>Action</th>
    <th></th>
</tr>
</thead>
<tbody>
<?php if(isset($quotation)): foreach ($quotation as $value):?>
<tr>
    <td><?php echo $value['quotation_no'];?></td>
    <td><?php echo date('d-m-Y',  strtotime($value['entryDate']));?></td>
    <td><?php echo date('h:m:s',  strtotime($value['entryDate']));?></td>
    <td><?php echo $value['com_name'];?></td>
    <td><?php echo $value['item_name'];?></td>
    <td><?php echo $value['status']==0?'Send':'Won';?></td>
    <td><?php echo $value['userId'];?></td>
    <td><?php echo $value['method']==0?'Email':'Download';?></td>
    <td><?php echo $value['action']==0?'Send':'Won';?></td>
    <td>
        <a class="table-action-btn" href="#"><i class="md md-edit"></i></a>
        <a class="table-action-btn" href="#"><i class="md md-close"></i></a>
    </td>
</tr>
<?php endforeach; endif;?>

</tbody>
</table>
</div>
<!-- end All results tab -->
<!-- Users tab -->

<div class="tab-pane" id="add"> 
<div class="row">
        <div class="col-sm-12">
                <div class="card-box">
                        <?php echo form_open('admin/manage_quotation/create', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                <div class="form-group">
                                        <label for="item_code" class="col-sm-4 control-label">Quotation No*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="quotation_no" id="quotationNo" class="form-control" placeholder="Quotation No" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="department" class="col-sm-4 control-label">Product*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="product" id="product" class="form-control" placeholder="Product" required="" onchange="getqProdcuts()" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                <input type="hidden" name="product_id" id="product_id"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Price" class="col-sm-4 control-label">Price</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="price" id="price" class="form-control" placeholder="Price" required="" parsley-trigger="change"  data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Origin" class="col-sm-4 control-label">Origin</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="origin" id="origin" class="form-control" placeholder="Origin" required="" parsley-trigger="change"  data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="description" class="col-sm-4 control-label">Description</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="description" id="description" class="form-control" placeholder="description" required="" parsley-trigger="change"  data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Tarrif Code" class="col-sm-4 control-label">Tarrif Code</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="tarrif_code" id="tarrif_code" class="form-control" placeholder="Tarrif Code" required="" parsley-trigger="change"  data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Customer" class="col-sm-4 control-label">Customer*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="customer" id="cusId" class="form-control" placeholder="Customer" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                <input type="hidden" name="customerId" id="customerId"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="supplier" class="col-sm-4 control-label">Supplier*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="supplier" id="supId" class="form-control" placeholder="Supplier" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                <input type="hidden" name="supplierId" id="supplierId"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Method" class="col-sm-4 control-label">Payment Terms*</label>
                                        <div class="col-sm-7">
                                            <select  name="payment_terms" required="" class="form-control" required="">
                                                <option value="">Please Select Terms</option>
                                                <?php if(isset($pterms)): foreach ($pterms as $ptval):?>
                                                <option value="<?php echo $ptval['terms_id'];?>"><?php echo $ptval['terms'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Address" class="col-sm-4 control-label">Conditional Field</label>
                                        <div class="col-sm-7">
                                            <textarea data-parsley-id="10" cols="73" rows="3" name="condition" id="address" style="text-transform: uppercase;"></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Method" class="col-sm-4 control-label">Method*</label>
                                        <div class="col-sm-7">
                                            <select  name="method" required="" class="form-control" required="">
                                                <option value="">Please Select Method</option>
                                                <option value="1">Email</option>
                                                <option value="2">Download</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="item_code" class="col-sm-4 control-label">Please Select</label>
                                    <div class="col-lg-4 col-md-6">
                                            <div class="checkbox checkbox-inverse">
                                                <input type="checkbox" id="checkbox6c" value="1" name="includeoption[]">
                                                <label for="checkbox6c">
                                                     Include Letter Head
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-custom">
                                                <input type="checkbox" id="checkbox11" value="2" name="includeoption[]">
                                                <label for="checkbox11">
                                                    Send as HTML Message
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input type="checkbox" id="checkbox2" value="3" name="includeoption[]">
                                                <label for="checkbox2">
                                                     Send as PDF Attachment
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-success">
                                                <input type="checkbox" id="checkbox3" value="4" name="includeoption[]">
                                                <label for="checkbox3">
                                                    Send a copy to my manager
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-info">
                                                <input type="checkbox" id="checkbox4" value="5" name="includeoption[]">
                                                <label for="checkbox4">
                                                    Send a copy to me
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-warning">
                                                <input type="checkbox" id="checkbox5" value="6" name="includeoption[]">
                                                <label for="checkbox5">
                                                    Send auto followup email after 1-15 days
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-danger">
                                                <input type="checkbox" id="checkbox6" value="7" name="includeoption[]">
                                                <label for="checkbox6">
                                                    Remind me to followup call in 1-15 days
                                                </label>
                                            </div>  
	                                </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Save
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                        Cancel
                                                </button>
                                        </div>
                                </div>
                        <?php echo form_close();?>
                </div>
        </div>
</div>					
</div> 
<!-- end Users tab -->
</div> 
</div>
</div>
</div>
<script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
<script>
    $(function() {
        //for customer
        function customerResult(item) {
              $('#customerId').val(item.value);
        }
        $('#cusId').typeahead({
            source: <?php echo $customer.','; ?>
            onSelect: customerResult
        });
        //for supplier
        function supplierResult(item) {
              $('#supplierId').val(item.value);
        }
        $('#supId').typeahead({
            source: <?php echo $customer.','; ?>
            onSelect: supplierResult
        });
        //for product
        function productResult(item) {
              $('#product_id').val(item.value);
        }
        $('#product').typeahead({
            source: <?php echo $products.','; ?>
            onSelect: productResult
        });
    });
    // get prodcut info
    function getqProdcuts()
    {    
        var pid = document.getElementById("product_id").value;
        
        var xmlhttp;

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
                        document.getElementById("price").value=jsonObject[0].original_price;
                        document.getElementById("origin").value=jsonObject[0].cname;
                        document.getElementById("description").value=jsonObject[0].description;
                        document.getElementById("tarrif_code").value=jsonObject[0].tariff_code;
                    }
            }
          }
        xmlhttp.open("GET","<?php echo base_url()?>index.php?admin/getqProdcuts/"+pid,true);
        xmlhttp.send();
    }
</script>

        
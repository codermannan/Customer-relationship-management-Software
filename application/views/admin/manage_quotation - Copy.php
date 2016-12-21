<div class="row">
        <div class="col-sm-12">
             <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Make Quotation</h3>
                </div>
                <div class="panel-body">
                <div class="card-box">
                     <?php echo form_open_multipart('admin/manage_quotation/create', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                        <div class="row">
                                <div class="col-lg-6">
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Customer</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="customer" id="cusId" class="form-control" onchange="getqCustomer();getqPeople();" placeholder="Customer" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                                <input type="hidden" name="customerId" id="customerId"/>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-6">
                                                                 <input type="text" name="com_address" id="com_address" class="form-control" placeholder="Address" parsley-trigger="change"  data-parsley-id="4">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="com_country" id="com_country" class="form-control" placeholder="Country" />
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Phone 1</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="com_phone1" id="com_phone1" class="form-control" placeholder="Phone" />
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Phone 2</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="com_phone2" id="com_phone2" class="form-control" placeholder="Phone" />
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Fax</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="com_fax" id="com_fax" class="form-control" placeholder="Fax" />
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="Contact" class="col-sm-3 control-label">Contact*</label>
                                                        <div class="col-sm-6">
                                                            <select  name="contact" id="contact" required="" class="form-control" required="" onchange="getAttnemail(this.value)">
                                                                <option value="">Please Select Contact</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Contact Email</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="attn_email" id="attn_email" class="form-control" placeholder="Contact Email" />
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Select Option</label>
                                                        <div class="col-sm-6">
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
                                        </form>
                                </div>
                                <div class="col-lg-6">
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Product</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" name="product" id="product" class="form-control" placeholder="Product" required="" onchange="getqProdcuts()" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                                <input type="hidden" name="product_id" id="product_id"/>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Price</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" name="price" id="price" class="form-control" placeholder="Price" parsley-trigger="change"  data-parsley-id="4">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Origin</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" name="origin" id="origin" class="form-control" placeholder="Origin" parsley-trigger="change"  data-parsley-id="4">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" name="description" id="description" class="form-control" placeholder="description" parsley-trigger="change"  data-parsley-id="4">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Tarrif Code</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" name="tarrif_code" id="tarrif_code" class="form-control" placeholder="Tarrif Code" parsley-trigger="change"  data-parsley-id="4">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="supplier" class="col-sm-3 control-label">Supplier*</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" name="supplier" id="supId" class="form-control" placeholder="Supplier" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                                <input type="hidden" name="supplierId" id="supplierId"/>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="Method" class="col-sm-3 control-label">Payment Terms*</label>
                                                        <div class="col-sm-6">
                                                            <select  name="payment_terms" required="" class="form-control" required="">
                                                                <option value="">Please Select Terms</option>
                                                                <?php if(isset($pterms)): foreach ($pterms as $ptval):?>
                                                                <option value="<?php echo $ptval['terms_id'];?>"><?php echo $ptval['terms'];?></option>
                                                                <?php endforeach; endif;?>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Conditional Field</label>
                                                        <div class="col-sm-6">
                                                                <textarea required class="form-control" name="condition" id="condition"></textarea>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="Method" class="col-sm-3 control-label">Method*</label>
                                                        <div class="col-sm-6">
                                                            <select  name="method" required="" class="form-control" required="">
                                                                <option value="">Please Select Method</option>
                                                                <option value="1">Email</option>
                                                                <option value="2">Download</option>
                                                            </select>
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
                        </div>
                    
                    <?php echo form_close();?>
                </div>
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
    // get prodcut info
    function getqCustomer()
    {    
        var cusid = document.getElementById("customerId").value;
        
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
                        document.getElementById("com_address").value=jsonObject[0].com_address;
                        document.getElementById("com_country").value=jsonObject[0].cname;
                        document.getElementById("com_phone1").value=jsonObject[0].com_phone1;
                        document.getElementById("com_phone2").value=jsonObject[0].com_phone2;
                        document.getElementById("com_fax").value=jsonObject[0].com_fax;
                    }
            }
          }
        xmlhttp.open("GET","<?php echo base_url()?>index.php?admin/getqCustomers/"+cusid,true);
        xmlhttp.send();
    }
    //add people
    function getqPeople()
    {        
            var pid = document.getElementById("customerId").value;
            
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

                        if (jsonObject != null){
                            $("#contact").empty();
                            var i = 0; 
                            $.each(jsonObject, function () {
                                $("#contact").append($("<option></option>").val(jsonObject[i].id).html(jsonObject[i].FullName));
                                i++;
                            });
                        }
                }
              }
            xmlhttp.open("GET","<?php echo base_url()?>index.php?admin/getqPeople/"+pid,true);
            xmlhttp.send();
    }
    //get contact email
    function getAttnemail(id)
    {      
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

                        if (jsonObject != null){
                            document.getElementById("attn_email").value=jsonObject[0].email;
                        }
                }
              }
            xmlhttp.open("GET","<?php echo base_url()?>index.php?admin/getEmailaddress/"+id,true);
            xmlhttp.send();
    }
</script>

        
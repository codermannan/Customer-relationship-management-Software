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
        <?php if(isset($edit_product) && in_array(2, $haspermission)==2):?>
                <li class="active">
                <a href="#edit" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>EDIT PRODUCT</b></span> 
                </a> 
                </li>
        <?php endif;?>
        <?php if(in_array(4, $haspermission)==4):?>        
            <li class="<?php if(!isset($edit_product)) echo 'active';?>"> 
                <a href="#list" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>PRODUCT LIST</b></span> 
                </a> 
            </li>
        <?php endif;?>
        <?php if(in_array(4, $haspermission)==4):?>
            <li class=""> 
                <a href="#dup" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>DUPLICATE LIST</b></span> 
                </a> 
            </li>
        <?php endif;?>    
        <?php if(in_array(1, $haspermission)==1):?>     
            <li class=""> 
                <a href="#add" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                    <span class="hidden-xs"><b>ADD PRODUCT</b></span> 
                </a> 
            </li>
          <?php endif;?>    
    </ul> 
<div class="tab-content"> 
    <!----EDITING FORM STARTS---->
    <?php if(isset($edit_product) && in_array(2, $haspermission)==2):?>
    <div class="tab-pane <?php if(isset($edit_product)) echo 'active';?>" id="edit">
            <div class="row">
                <div class="col-sm-12">
                <div class="card-box">
                    <?php foreach($edit_product as $urow):?>
                        <?php echo form_open('admin/product_management/edit/do_update/'.$urow['pid'], array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                <div class="form-group has-feedback">
                                        <label for="item_code" class="col-sm-4 control-label">Item Code*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="item_code" id="itemCode" class="form-control" value="<?php echo $urow['item_code'];?>" maxlength="8" placeholder="Item Code" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                            <span class="glyphicon form-control-feedback"></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="item_name" class="col-sm-4 control-label">Product Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="item_name" id="userName" value="<?php echo $urow['item_name'];?>" class="form-control" placeholder="Product Name" required="" parsley-trigger="change" data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="description" class="col-sm-4 control-label">Product Description*</label>
                                        <div class="col-sm-7">
                                            <textarea name="description" rows="5" class="form-control"><?php echo $urow['description'];?></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="category" class="col-sm-4 control-label">Product Category*</label>
                                        <div class="col-sm-7">
                                            <select name="category" required="" class="form-control" required="">
                                                <?php if(isset($cat)): foreach ($cat as $catval):?>
                                                <option value="<?php echo $catval['cat_id'];?>" <?php if ($urow['category']==$cvalue['cat_id']){?> selected <?php } ?>><?php echo $catval['cat_name'];?></option>
                                                <?php $sl++; endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="origin" class="col-sm-4 control-label">Origin*</label>
                                        <div class="col-sm-7">
                                            <select  name="origin" required="" class="form-control" required="">
                                                <option value="">Please Select Country</option>
                                                <?php if(isset($country)): foreach ($country as $cvalue):?>
                                                <option value="<?php echo $cvalue['cid'];?>" <?php if ($urow['origin']==$cvalue['cid']){?> selected <?php } ?>><?php echo $cvalue['cname'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="tariff_code" class="col-sm-4 control-label">Tariff Code</label>
                                        <div class="col-sm-7">
                                            <input type="number" name="tariff_code" class="form-control" value="<?php echo $urow['tariff_code'];?>" placeholder="Tariff Code" onkeypress="return isNumberKey(event)">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Sku" class="col-sm-4 control-label">Sku*</label>
                                        <div class="col-sm-7">
                                            <select  name="sku" id="sku" required="" class="form-control" required="" onchange="priceFormat()">
                                                <option value="">Please Select Sku</option>
                                                <?php if(isset($sku)): foreach ($sku as $sval):?>
                                                <option value="<?php echo $sval['sku'];?>"><?php echo $sval['sku'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Incoterms" class="col-sm-4 control-label">Incoterms*</label>
                                        <div class="col-sm-7">
                                            <select  name="incoterms" id="incoterms" required="" class="form-control" required="" onchange="priceFormat()">
                                                <option value="">Please Select Incoterm</option>
                                                <?php if(isset($incoterm)): foreach ($incoterm as $ival):?>
                                                <option value="<?php echo $ival['incoterm'];?>"><?php echo $ival['incoterm'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Port" class="col-sm-4 control-label">Port*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="port" id="pId" class="form-control" placeholder="Port" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                <input type="hidden" name="portId" id="portId"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="price" class="col-sm-4 control-label">Price*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" required="" parsley-trigger="change" data-parsley-id="4" onkeyup="priceFormat();">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="price" class="col-sm-4 control-label">Original Price*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="original_price" id="originalPrice" class="form-control" value="<?php echo $urow['original_price'];?>" placeholder="Original Price" required="" parsley-trigger="change" ndata-parsley-id="4" readonly="">
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
                    <?php endforeach;?>
                </div>
        </div>
            </div>
    </div>
     <?php endif;?>
  <!----EDITING FORM ENDS--->
  <!----TABLE LISTING STARTS---> 
  <?php if(in_array(4, $haspermission)==4):?>
    <div class="tab-pane <?php if(!isset($edit_product)) echo 'active';?>" id="list">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>SL#</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Origin</th>
                <th>Tariff Code</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
        <?php if(isset($products)): $sl=1; foreach ($products as $value):?>
            <tr>
                <td><?php echo $sl;?></td>
                <td><?php echo $value['item_code'];?></td>
                <td><?php echo $value['item_name'];?></td>
                <td><?php echo $value['cat_name'];?></td>
                <td><?php echo $value['cname'];?></td>
                <td><?php echo $value['tariff_code'];?></td>
                <td><?php echo $value['original_price'];?></td>
                <td><?php echo $value['status']==1?'Active':'Inactive';?></td>
                <td>
                    <?php if(in_array(2, $haspermission)==2):?>
                    <a class="table-action-btn" href="<?php echo base_url().'index.php?admin/product_management/edit/'.$value['pid']?>"><i class="md md-edit"></i></a>
                    <?php endif;?>
                    <?php if(in_array(3, $haspermission)==3):?>
                    <a class="table-action-btn" href="<?php echo base_url().'index.php?admin/product_management/delete/'.$value['pid']?>" onclick="return confirm('delete the prodcut?')"><i class="md md-close"></i></a>
                    <?php endif;?>
                </td>
            </tr>
        <?php $sl++; endforeach; endif;?>
            </tbody>
        </table>
    </div>
   <?php endif;?>
  <!----TABLE LISTING ENDS--->
   <!----DUPLICATE TABLE LISTING STARTS---> 
  <?php if(in_array(4, $haspermission)==4):?>
    <div class="tab-pane" id="dup">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>SL#</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Origin</th>
                <th>Tariff Code</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
        <?php if(isset($pro_dup)): $dsl=1; foreach ($pro_dup as $dupval):?>
            <tr>
                <td><?php echo $dsl;?></td>
                <td><?php echo $dupval['item_code'];?></td>
                <td><?php echo $dupval['item_name'];?></td>
                <td><?php echo $dupval['cat_name'];?></td>
                <td><?php echo $dupval['cname'];?></td>
                <td><?php echo $dupval['tariff_code'];?></td>
                <td><?php echo $dupval['original_price'];?></td>
                <td><?php echo $dupval['status']==1?'Active':'Inactive';?></td>
                <td>
                    <?php if(in_array(2, $haspermission)==2):?>
                    <a data-placement="top" data-toggle="tooltip" title="Modify" class="table-action-btn" href="<?php echo base_url().'index.php?admin/product_management/edit/'.$dupval['pid']?>"><i class="md md-edit"></i></a>
                    <?php endif;?>
                    <?php if(in_array(3, $haspermission)==3):?>
                    <a data-placement="top" data-toggle="tooltip" title="Delete" class="table-action-btn" href="<?php echo base_url().'index.php?admin/product_management/delete/'.$dupval['pid']?>" onclick="return confirm('delete the prodcut?')"><i class="md md-close"></i></a>
                    <?php endif;?>
                </td>
            </tr>
        <?php $dsl++; endforeach; endif;?>
            </tbody>
        </table>
    </div>
   <?php endif;?>
  <!----DUPLICATE TABLE LISTING STARTS--->
 <!----CREATION FORM STARTS---->
  <?php if(in_array(1, $haspermission)==1):?> 
    <div class="tab-pane" id="add"> 
            <div class="row">
        <div class="col-sm-12">
                <div class="card-box">
                        <?php echo form_open('admin/product_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                <div class="form-group has-feedback">
                                        <label for="item_code" class="col-sm-4 control-label">Item Code*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="item_code" id="itemCode" class="form-control" maxlength="8" placeholder="Item Code" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                            <span class="glyphicon form-control-feedback"></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="item_name" class="col-sm-4 control-label">Product Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="item_name" id="userName" class="form-control" placeholder="Product Name" required="" parsley-trigger="change" data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="description" class="col-sm-4 control-label">Product Description*</label>
                                        <div class="col-sm-7">
                                            <textarea name="description" rows="5" class="form-control"></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="category" class="col-sm-4 control-label">Product Category*</label>
                                        <div class="col-sm-7">
                                            <select name="category" required="" class="form-control" required="">
                                                <?php if(isset($cat)): foreach ($cat as $catval):?>
                                                <option value="<?php echo $catval['cat_id'];?>"><?php echo $catval['cat_name'];?></option>
                                                <?php $sl++; endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="origin" class="col-sm-4 control-label">Origin*</label>
                                        <div class="col-sm-7">
                                            <select  name="origin" required="" class="form-control" required="">
                                                <option value="">Please Select Country</option>
                                                <?php if(isset($country)): foreach ($country as $cvalue):?>
                                                <option value="<?php echo $cvalue['cid'];?>"><?php echo $cvalue['cname'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="tariff_code" class="col-sm-4 control-label">Tariff Code</label>
                                        <div class="col-sm-7">
                                            <input type="number" name="tariff_code" class="form-control" placeholder="Tariff Code" onkeypress="return isNumberKey(event)">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Sku" class="col-sm-4 control-label">Sku*</label>
                                        <div class="col-sm-7">
                                            <select  name="sku" id="sku" required="" class="form-control" required="" onchange="priceFormat()">
                                                <option value="">Please Select Sku</option>
                                                <?php if(isset($sku)): foreach ($sku as $sval):?>
                                                <option value="<?php echo $sval['sku'];?>"><?php echo $sval['sku'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Incoterms" class="col-sm-4 control-label">Incoterms*</label>
                                        <div class="col-sm-7">
                                            <select  name="incoterms" id="incoterms" required="" class="form-control" required="" onchange="priceFormat()">
                                                <option value="">Please Select Incoterm</option>
                                                <?php if(isset($incoterm)): foreach ($incoterm as $ival):?>
                                                <option value="<?php echo $ival['incoterm'];?>"><?php echo $ival['incoterm'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Port" class="col-sm-4 control-label">Port*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="port" id="pId" class="form-control" placeholder="Port" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                <input type="hidden" name="portId" id="portId"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="price" class="col-sm-4 control-label">Price*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" required="" parsley-trigger="change" data-parsley-id="4" onkeyup="priceFormat();">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="price" class="col-sm-4 control-label">Original Price*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="original_price" id="originalPrice" class="form-control" placeholder="Original Price" required="" parsley-trigger="change" ndata-parsley-id="4" readonly="">
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
    <?php endif;?>
 <!----CREATION FORM ENDS--->
</div> 
</div>
</div>
</div>
<script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
<script type="text/javascript">
    $(function(){
        $("#itemCode").keyup(function(){
            if($("#itemCode").val().match('^[a-zA-Z0-9]*$')){
                //remove warning before success
                $(".has-feedback").removeClass("has-warning");
                $(".form-control-feedback").removeClass("glyphicon-warning-sign");
                //add success
                $(".has-feedback").addClass("has-success");
                $(".form-control-feedback").addClass("glyphicon-ok");
                
            }else if (!$("#itemCode").val().match('^[a-zA-Z0-9]*$')){
                //remove success before warning
                $(".has-feedback").removeClass("has-success");
                $(".form-control-feedback").removeClass("glyphicon-ok");
                //add warning
                $(".has-feedback").addClass("has-warning");
                $(".form-control-feedback").addClass("glyphicon-warning-sign");
            }
        });
    });
    function priceFormat(){
        var sku = document.getElementById("sku").value;
        var inc = document.getElementById("incoterms").value;
        var port = document.getElementById("pId").value;
        var price = document.getElementById("price").value;
        var orprice = 'USD '+price+'/'+sku+' '+inc+' '+port
        document.getElementById("originalPrice").value=orprice;
    }
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    //for portResult
    function portResult(item) {
          $('#portId').val(item.value);
    }
    $('#pId').typeahead({
        source: <?php echo $ports.','; ?>
        onSelect: portResult
    });
    //for portResult
    function pidResult(item) {
          $('#itemCode').val(item.value);
    }
    $('#itemCode').typeahead({
        source: <?php echo $pid.','; ?>
        onSelect: pidResult
    });
</script>
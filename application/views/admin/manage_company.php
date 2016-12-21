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
                <?php if(isset($edit_company) && in_array(2, $haspermission)==2):?>
                <li class="active">
                <a href="#edit" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>EDIT COMPANY</b></span> 
                </a> 
                </li>
                <?php endif;?>
                <?php if(in_array(4, $haspermission)==4):?>
                <li class="<?php if(!isset($edit_company)) echo 'active';?>"> 
                <a href="#list" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>COMPANY LIST</b></span> 
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
                    <span class="hidden-xs"><b>ADD COMPANY</b></span> 
                </a> 
                </li>
                <?php endif;?>
            </ul> 
<div class="tab-content">
  <!----EDITING FORM STARTS---->
    <?php if(isset($edit_company) && in_array(2, $haspermission)==2):?>
        <div class="tab-pane <?php if(isset($edit_company)) echo 'active';?>" id="edit">
        <div class="row">
                <div class="col-sm-12">
                        <div class="card-box">
                                <?php foreach($edit_company as $urow):?>
                                <?php echo form_open_multipart('admin/manage_company/edit/do_update/'.$urow['com_id'], array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                        <div class="form-group">
                                                <label for="com_name" class="col-sm-4 control-label">Company Name*</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="com_name" id="comName" class="form-control" placeholder="Enter Company Name" value="<?php echo $urow['com_name'];?>" required="" parsley-trigger="change" name="nick" data-parsley-id="4" style="text-transform: uppercase;"/>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="Address" class="col-sm-4 control-label">Address</label>
                                                <div class="col-sm-7">
                                                    <textarea data-parsley-id="10" cols="73" rows="3" name="address" id="address" style="text-transform: uppercase;"><?php echo $urow['com_address'];?></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="origin" class="col-sm-4 control-label">Country*</label>
                                                <div class="col-sm-7">
                                                    <select  name="country" required="" class="form-control" required="">
                                                        <option value="">Please Select Country</option>
                                                        <?php if(isset($country)): foreach ($country as $cvalue):?>
                                                        <option value="<?php echo $cvalue['cid'];?>" <?php if ($urow['com_country']==$cvalue['cid']){?> selected <?php } ?>><?php echo $cvalue['cname'];?></option>
                                                        <?php endforeach; endif;?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="Telephone" class="col-sm-4 control-label">Telephone 1*</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="telephone1" id="mobilePrefix1" value="<?php echo $urow['com_phone1'];?>" class="form-control telephone" placeholder="Telephone 1" required>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="Telephone" class="col-sm-4 control-label">Telephone 2</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="telephone2" id="mobilePrefix2" value="<?php echo $urow['com_phone2'];?>" class="form-control telephone" placeholder="Telephone 2">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="fax" class="col-sm-4 control-label">Fax</label>
                                                <div class="col-sm-7">
                                                        <input type="text" name="fax" value="<?php echo $urow['com_fax'];?>" class="form-control telephone" placeholder="Fax">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="comType" class="col-sm-4 control-label">Company Type*</label>
                                                <div class="col-sm-7">
                                                    <select name="comType" id="ctype" required="" class="form-control">
                                                        <option value="">Please Select Type</option>
                                                        <option value="1" <?php if ($urow['com_type']==1){?> selected <?php } ?>>Wholeseller</option>
                                                        <option value="2" <?php if ($urow['com_type']==2){?> selected <?php } ?>>Importer</option>
                                                        <option value="3" <?php if ($urow['com_type']==3){?> selected <?php } ?>>Wholeseller & Importer</option>
                                                        <option value="4" <?php if ($urow['com_type']==4){?> selected <?php } ?>>Wholeseller & Retailer & Importer</option>
                                                     </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="Industry" class="col-sm-4 control-label">Industry*</label>
                                                <div class="col-sm-7">
                                                    <select name="industry" id="ctype" required="" class="form-control">
                                                        <option value="">Please Select Type</option>
                                                        <option value="1" <?php if ($urow['com_industry']==1){?> selected <?php } ?>>Stockiest</option>
                                                        <option value="2" <?php if ($urow['com_industry']==2){?> selected <?php } ?>>Printing & Packaging</option>
                                                     </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                                Update
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
    <div class="tab-pane <?php if(!isset($edit_company)) echo 'active';?>" id="list">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL#</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Fax</th>
                    <th>Type</th>
                    <th>Industry</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php if(isset($compinfo)): $sl=1; foreach ($compinfo as $value):?>
            <tr>
                <td><?php echo $sl;?></td>
                <td><?php echo $value['com_name'];?></td>
                <td><?php echo $value['com_address'];?></td>
                <td><?php echo $value['cname'];?></td>
                <td class="cp"><?php echo $value['com_phone1'];?></td>
                <td class="cp"><?php echo $value['com_phone2'];?></td>
                <td><?php echo $value['com_fax'];?></td>
                <td><?php if($value['com_type']==1):echo 'Wholeseller';elseif ($value['com_type']==2):echo 'Importer';elseif ($value['com_type']==3):echo 'Wholeseller & Importer';elseif ($value['com_type']==4):echo 'Wholeseller & Retailer & Importer';endif;?></td>
                <td><?php if($value['com_industry']==1):echo 'Stockiest';elseif ($value['com_industry']==2):echo 'Printing & Packaging';endif;?></td>
                <td>
                    <?php if(in_array(2, $haspermission)==2):?>
                    <a class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_company/edit/'.$value['com_id']?>"><i class="md md-edit"></i></a>
                    <?php endif;?>
                    <?php if(in_array(3, $haspermission)==3):?>
                    <a class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_company/delete/'.$value['com_id'].'/'.$value['com_name']?>" onclick="return confirm('company information delete?')"><i class="md md-close"></i></a>
                    <?php endif;?>
                </td>
            </tr>
            <?php $sl++; endforeach; endif;?>

            </tbody>
            </table>
    </div>
    <?php endif;?>
  <!----TABLE LISTING ENDS--->
  <!----DUPLICATE LISTING STARTS---> 
    <?php if(in_array(4, $haspermission)==4):?>
    <div class="tab-pane" id="dup">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL#</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Fax</th>
                    <th>Type</th>
                    <th>Industry</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php if(isset($com_dup)): $dsl=1; foreach ($com_dup as $dupv):?>
            <tr>
                <td><?php echo $dsl;?></td>
                <td><?php echo $dupv['com_name'];?></td>
                <td><?php echo $dupv['com_address'];?></td>
                <td><?php echo $dupv['cname'];?></td>
                <td class="cp"><?php echo $dupv['com_phone1'];?></td>
                <td class="cp"><?php echo $dupv['com_phone2'];?></td>
                <td><?php echo $dupv['com_fax'];?></td>
                <td><?php if($dupv['com_type']==1):echo 'Wholeseller';elseif ($dupv['com_type']==2):echo 'Importer';elseif ($dupv['com_type']==3):echo 'Wholeseller & Importer';elseif ($dupv['com_type']==4):echo 'Wholeseller & Retailer & Importer';endif;?></td>
                <td><?php if($dupv['com_industry']==1):echo 'Stockiest';elseif ($dupv['com_industry']==2):echo 'Printing & Packaging';endif;?></td>
                <td>
                    <?php if(in_array(2, $haspermission)==2):?>
                    <a data-placement="top" data-toggle="tooltip" title="Modify" class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_company/edit/'.$dupv['com_id']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                    <?php endif;?>
                    <?php if(in_array(3, $haspermission)==3):?>
                    <a data-placement="top" data-toggle="tooltip" title="Delete" class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_company/delete/'.$dupv['com_id']?>" onclick="return confirm('company information delete?')"><i class="md md-close"></i></a>
                    <?php endif;?>
                </td>
            </tr>
            <?php $dsl++; endforeach; endif;?>
            </tbody>
            </table>
    </div>
    <?php endif;?>
  <!----DUPLICATE LISTING ENDS--->
 <!----CREATION FORM STARTS---->
  <?php if(in_array(1, $haspermission)==1):?>
    <div class="tab-pane" id="add"> 
    <div class="row">
            <div class="col-sm-12">
                    <div class="card-box">
                            <?php echo form_open_multipart('admin/manage_company/create', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                    <div class="form-group">
                                            <label for="com_name" class="col-sm-4 control-label">Company Name*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="com_name" id="comName" class="form-control" placeholder="Enter Company Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4" style="text-transform: uppercase;"/>
                                                <input type="hidden" name="orgid" id="orgId"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Address" class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-7">
                                                <textarea data-parsley-id="10" cols="73" rows="3" name="address" id="address" style="text-transform: uppercase;"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="origin" class="col-sm-4 control-label">Country*</label>
                                            <div class="col-sm-7">
                                                <select  name="country" required="" class="form-control" required="">
                                                    <option value="">Please Select Country</option>
                                                    <?php if(isset($country)): foreach ($country as $cvalue):?>
                                                    <option value="<?php echo $cvalue['cid'];?>"><?php echo $cvalue['cname'];?></option>
                                                    <?php endforeach; endif;?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Telephone" class="col-sm-4 control-label">Telephone 1*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="telephone1" id="mobilePrefix1" class="form-control telephone" placeholder="Telephone 1" required>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Telephone" class="col-sm-4 control-label">Telephone 2</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="telephone2" id="mobilePrefix2" class="form-control telephone" placeholder="Telephone 2">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="fax" class="col-sm-4 control-label">Fax</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="fax" class="form-control telephone" placeholder="Fax">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="comType" class="col-sm-4 control-label">Company Type*</label>
                                            <div class="col-sm-7">
                                                <select name="comType" id="ctype" required="" class="form-control">
                                                    <option value="">Please Select Type</option>
                                                    <option value="1">Wholeseller</option>
                                                    <option value="2">Importer</option>
                                                    <option value="3">Wholeseller & Importer</option>
                                                    <option value="4">Wholeseller & Retailer & Importer</option>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Industry" class="col-sm-4 control-label">Industry*</label>
                                            <div class="col-sm-7">
                                                <select name="industry" id="ctype" required="" class="form-control">
                                                    <option value="">Please Select Type</option>
                                                    <option value="1">Stockiest</option>
                                                    <option value="2">Printing & Packaging</option>
                                                 </select>
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
<script src="<?php echo base_url();?>assets/js/clipboard.min.js"></script>
<script type="text/javascript">
    $(function() {
            //company augtosuggest
            function displayResult(item) {
                    $('#orgId').val(item.value);
            }
            $('#comName').typeahead({
                source: <?php echo $org.','; ?>
                onSelect: displayResult
            });
            //validation
            $('#comName').keyup(function() {
                if (this.value.match(/[^a-zA-Z0-9(). ]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z0-9(). ]/g, '');
                }
            });
            $('#address').keyup(function() {
                if (this.value.match(/[^a-zA-Z0-9-&/()@#\s ]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z0-9-&/()@#\s ]/g, '');
                }
            });
            $('.telephone').keyup(function() {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                }
            });
            //auto copy
            var clipboard = new Clipboard('.cp', {
                // The selection of the correct content is done here.
                text: function(trigger) {
                    return trigger.innerHTML;
                }
                //clipboard.js will take the entire inner content of the clicked cell.
            });
            // Re-implement the cosmetic highlighting of the cell content. This is actually done AFTER the content is copied to clipboard, but it gives a visual indication that something happened.
            clipboard.on('success', function(e) {
                var range = document.createRange();

                range.selectNodeContents(e.trigger);
                window.getSelection().addRange(range);
            });
            //--------
            
     });
</script>
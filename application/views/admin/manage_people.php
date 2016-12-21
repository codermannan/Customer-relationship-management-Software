<link rel="stylesheet" href="<?php echo base_url();?>assets/css/intlTelInput.css">
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
                <?php if(isset($edit_people) && in_array(2, $haspermission)==2):?>
                <li class="active">
                <a href="#edit" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>EDIT PEOPLE</b></span> 
                </a> 
                </li>
                <?php endif;?>
                <?php if(in_array(4, $haspermission)==4):?>
                <li class="<?php if(!isset($edit_people)) echo 'active';?>"> 
                    <a href="#list" data-toggle="tab" aria-expanded="true"> 
                        <span class="visible-xs"><i class="fa fa-home"></i></span> 
                        <span class="hidden-xs"><b>PEOPLE LIST</b></span> 
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
                    <span class="hidden-xs"><b>ADD PEOPLE</b></span> 
                </a> 
                </li>
                <?php endif;?>
            </ul> 
<div class="tab-content">
    <!----EDITING FORM STARTS---->
    <?php if(isset($edit_people) && in_array(2, $haspermission)==2):?>
        <div class="tab-pane <?php if(isset($edit_people)) echo 'active';?>" id="edit">
            <div class="row">
            <div class="col-sm-12">
                    <div class="card-box">
                        <?php foreach($edit_people as $urow):?>
                            <?php echo form_open('admin/manage_people/edit/do_update/'.$urow['id'], array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                    <div class="form-group">
                                            <label for="fullName" class="col-sm-4 control-label">Full Name*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="fullName" id="fullName" value="<?php echo $urow['FullName'];?>" class="form-control" placeholder="Enter Full Name" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="designation" class="col-sm-4 control-label">Designation*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="designation" id="userName" value="<?php echo $urow['designation'];?>" class="form-control" placeholder="Designation" required="" parsley-trigger="change" data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="department" class="col-sm-4 control-label">Department*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="department" id="userName" value="<?php echo $urow['department'];?>" class="form-control" placeholder="Department" required="" parsley-trigger="change"  data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="department" class="col-sm-4 control-label">Organization*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="organization" id="Organization" class="form-control" placeholder="Organization" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                    <input type="hidden" name="orgid" id="orgId"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="origin" class="col-sm-4 control-label">Country*</label>
                                            <div class="col-sm-7">
                                                <select  name="country" required="" class="form-control" required=""> 
                                                    <option value="">Please Select Country</option>
                                                    <?php if(isset($country)): foreach ($country as $cvalue):?>
                                                    <option value="<?php echo $cvalue['cid'];?>" <?php if ($urow['countryId']==$cvalue['cid']){?> selected <?php } ?>><?php echo $cvalue['cname'];?></option>
                                                    <?php endforeach; endif;?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="mobile" class="col-sm-4 control-label">Primary Mobile No*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="mobile1" id="mobilePrefix1" value="<?php echo $urow['mobile'];?>" placeholder="e.g. +1 702 123 4567" class="form-control mobile-number telephone" required="" parsley-trigger="change"  data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="mobile" class="col-sm-4 control-label">Secondary Mobile No</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="mobile2" id="mobilePrefix2" value="<?php echo $urow['mobile2'];?>" placeholder="e.g. +1 702 123 4567" class="form-control mobile-number telephone">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="telType" class="col-sm-4 control-label">Type*</label>
                                            <div class="col-sm-7">
                                                <select name="telType" id="ctype" required="" class="form-control">
                                                    <option value="">Please Select Type</option>
                                                    <option value="Work" <?php if ($urow['type']=='Work'){?> selected <?php } ?>>Work</option>
                                                    <option value="Home" <?php if ($urow['type']=='Home'){?> selected <?php } ?>>Home</option>
                                                    <option value="DID" <?php if ($urow['type']=='DID'){?> selected <?php } ?>>DID</option>
                                                    <option value="SIP" <?php if ($urow['type']=='SIP'){?> selected <?php } ?>>SIP</option>
                                                    <option value="Cellular" <?php if ($urow['type']=='Cellular'){?> selected <?php } ?>>Cellular</option>
                                                    <option value="Fax" <?php if ($urow['type']=='Fax'){?> selected <?php } ?>>Fax</option>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Telephone" class="col-sm-4 control-label">Telephone</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="telephone" value="<?php echo $urow['telephone'];?>" class="form-control telephone" placeholder="Telephone" required>
                                            </div>
                                    </div>
                                    <div class="form-group" id="extId">
                                            <label for="Telephone" class="col-sm-4 control-label">Extention No</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="extention" value="<?php echo $urow['extention'];?>" class="form-control telephone" placeholder="Extention">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Email*</label>
                                            <div class="col-sm-7">
                                                    <input type="email" name="email" value="<?php echo $urow['email'];?>" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email" style="text-transform: lowercase;">
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
    <div class="tab-pane <?php if(!isset($edit_people)) echo 'active';?>" id="list">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL#</th>
                    <th>Full Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Country</th>
                    <th>Organization</th>
                    <th>Mobile1</th>
                    <th>Mobile2</th>
                    <th>Telephone</th>
                    <th>E-mail</th>
                    <th>Creator</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($people)): $sl=1; foreach ($people as $value):?>
                <tr>
                    <td><?php echo $sl;?></td>
                    <td><?php echo $value['FullName'];?></td>
                    <td><?php echo $value['designation'];?></td>
                    <td><?php echo $value['department'];?></td>
                    <td><?php echo $value['cname'];?></td>
                    <td><?php echo $value['com_name'];?></td>
                    <td class="cp"><?php echo $value['mobile'];?></td>
                    <td class="cp"><?php echo $value['mobile2'];?></td>
                    <td><?php echo $value['extension'].' '.$value['telephone'];?></td>
                    <td class="cp"><?php echo $value['email'];?></td>
                    <td><?php echo $value['entryBy'];?></td>
                    <td>
                        <?php if(in_array(2, $haspermission)==2):?>
                        <a data-placement="top" data-toggle="tooltip" title="Edit" class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_people/edit/'.$value['id']?>"><i class="md md-edit"></i></a>
                        <?php endif;?>
                        <?php if(in_array(3, $haspermission)==3):?>
                        <a data-placement="top" data-toggle="tooltip" title="Delete" class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_people/delete/'.$value['id']?>" onclick="return confirm('Do you want to delete the people?')"><i class="md md-close"></i></a>
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
                    <th>Full Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Country</th>
                    <th>Organization</th>
                    <th>Mobile1</th>
                    <th>Mobile2</th>
                    <th>Telephone</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($p_dup)): $dsl=1; foreach ($p_dup as $dupv):?>
                <tr>
                    <td><?php echo $dsl;?></td>
                    <td><?php echo $dupv['FullName'];?></td>
                    <td><?php echo $dupv['designation'];?></td>
                    <td><?php echo $dupv['department'];?></td>
                    <td><?php echo $dupv['cname'];?></td>
                    <td><?php echo $dupv['com_name'];?></td>
                    <td class="cp"><?php echo $dupv['mobile'];?></td>
                    <td class="cp"><?php echo $dupv['mobile2'];?></td>
                    <td><?php echo $dupv['extension'].' '.$dupv['telephone'];?></td>
                    <td class="cp"><?php echo $dupv['email'];?></td>
                    <td>
                        <?php if(in_array(2, $haspermission)==2):?>
                        <a data-placement="top" data-toggle="tooltip" title="Modify" class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_people/edit/'.$dupv['id']?>"><i class="md md-edit"></i></a>
                        <?php endif;?>
                        <?php if(in_array(3, $haspermission)==3):?>
                        <a data-placement="top" data-toggle="tooltip" title="Delete" class="table-action-btn" href="<?php echo base_url().'index.php?admin/manage_people/delete/'.$dupv['id']?>" onclick="return confirm('Do you want to delete the people?')"><i class="md md-close"></i></a>
                        <?php endif;?>
                    </td>
                </tr>
                <?php $dsl++; endforeach; endif;?>
                </tbody>
                </table>
    <?php endif;?>
    </div>
    <!----DUPLICATE LISTING ENDS--->
 <!----CREATION FORM STARTS---->
   <?php if(in_array(1, $haspermission)==1):?>
    <div class="tab-pane" id="add"> 
            <div class="row">
            <div class="col-sm-12">
                    <div class="card-box">
                            <?php echo form_open('admin/manage_people/create', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                    <div class="form-group">
                                            <label for="fullName" class="col-sm-4 control-label">Full Name*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Enter Full Name" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="designation" class="col-sm-4 control-label">Designation*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="designation" id="userName" class="form-control" placeholder="Designation" required="" parsley-trigger="change" data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="department" class="col-sm-4 control-label">Department*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="department" id="userName" class="form-control" placeholder="Department" required="" parsley-trigger="change"  data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="department" class="col-sm-4 control-label">Organization*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="organization" id="Organization" class="form-control" placeholder="Organization" required="" parsley-trigger="change"  data-parsley-id="4" data-provide="typeahead">
                                                    <input type="hidden" name="orgid" id="orgId"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="origin" class="col-sm-4 control-label">Country*</label>
                                            <div class="col-sm-7">
                                                <!--onchange="getCountrycode(this.value);-->
                                                <select  name="country" required="" class="form-control" required=""> 
                                                    <option value="">Please Select Country</option>
                                                    <?php if(isset($country)): foreach ($country as $cvalue):?>
                                                    <option value="<?php echo $cvalue['cid'];?>"><?php echo $cvalue['cname'];?></option>
                                                    <?php endforeach; endif;?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="mobile" class="col-sm-4 control-label">Primary Mobile No*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="mobile1" id="mobilePrefix1" placeholder="e.g. +1 702 123 4567" class="form-control mobile-number telephone" required="" parsley-trigger="change"  data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="mobile" class="col-sm-4 control-label">Secondary Mobile No</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="mobile2" id="mobilePrefix2" placeholder="e.g. +1 702 123 4567" class="form-control mobile-number telephone">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="telType" class="col-sm-4 control-label">Type*</label>
                                            <div class="col-sm-7">
                                                <select name="telType" id="ctype" required="" class="form-control">
                                                    <option value="">Please Select Type</option>
                                                    <option value="Work">Work</option>
                                                    <option value="Home">Home</option>
                                                    <option value="DID">DID</option>
                                                    <option value="SIP">SIP</option>
                                                    <option value="Cellular">Cellular</option>
                                                    <option value="Fax">Fax</option>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Telephone" class="col-sm-4 control-label">Telephone</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="telephone" class="form-control telephone" placeholder="Telephone" required>
                                            </div>
                                    </div>
                                    <div class="form-group" id="extId">
                                            <label for="Telephone" class="col-sm-4 control-label">Extention No</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="extention" class="form-control telephone" placeholder="Extention">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Email*</label>
                                            <div class="col-sm-7">
                                                    <input type="email" name="email" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email" style="text-transform: lowercase;">
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
<script src="<?php echo base_url();?>assets/js/intlTelInput.js"></script> 
<script>
    $(function() {
        function displayResult(item) {
              $('#orgId').val(item.value);
        }
        $('#Organization').typeahead({
            source: <?php echo $org.','; ?>
            onSelect: displayResult
        });
        //extension
        $('#extId').hide();
        $('#ctype').change(function () {
            if($('#ctype').val() == 'Work') {
                $('#extId').show();
            }else{
                $('#extId').hide();
            }
        });
        //validation 
        $('#fullName').keyup(function() {
            if (this.value.match(/[^a-zA-Z ]/g)) {
                this.value = this.value.replace(/[^a-zA-Z ]/g, '');
            }
        });
        $('.telephone').keyup(function() {
                if (this.value.match(/[^0-9+]/g)) {
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
        //mobile number with flag
        $(".mobile-number").intlTelInput({
            allowExtensions: true,
            autoFormat: false,
            autoHideDialCode: false,
            autoPlaceholder: false,
            defaultCountry: "auto",
            ipinfoToken: "yolo",
            nationalMode: false,
            numberType: "MOBILE",
            //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            preferredCountries: ['bd', 'jp'],
            preventInvalidNumbers: true,
            utilsScript: "<?php echo base_url();?>assets/utils.js"
         });
        // datatable
    });
    
    function getCountrycode(id){
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
                            document.getElementById("mobilePrefix1").value=jsonObject[0].prefix;
                            document.getElementById("mobilePrefix2").value=jsonObject[0].prefix;
                        }
                }
              }
            xmlhttp.open("GET","<?php echo base_url()?>index.php?setting/getAjaxccode/"+id,true);
            xmlhttp.send();
        
    }
    
</script>

        
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
            <?php if(isset($edit_user) && in_array(2, $haspermission)==2):?>
                <li class="active">
                <a href="#edit" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>EDIT USERS</b></span> 
                </a> 
                </li>
                <?php endif;?>
                <?php if(in_array(4, $haspermission)==4):?>
                <li class="<?php if(!isset($edit_user)) echo 'active';?>"> 
                <a href="#list" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>USERS LIST</b></span> 
                </a> 
                </li> 
                <?php endif;?>
                <?php if(in_array(1, $haspermission)==1):?>
                <li class=""> 
                <a href="#add" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                    <span class="hidden-xs"><b>ADD USER</b></span> 
                </a> 
                </li>
                <?php endif;?>
        </ul> 
<div class="tab-content"> 
    <!----EDITING FORM STARTS---->
      <?php if(isset($edit_user) && in_array(2, $haspermission)==2):?>
      <div class="tab-pane <?php if(isset($edit_user)) echo 'active';?>" id="edit">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                        <?php foreach($edit_user as $urow):?>
                        <?php echo form_open('user/user_management/edit/do_update/'.$urow['id'], array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                <div class="form-group">
                                        <label for="fullName" class="col-sm-4 control-label">Full Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="fullName" id="fullName" value="<?php echo $urow['real_name'];?>" class="form-control" placeholder="Enter Full Name" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="userName" class="col-sm-4 control-label">User Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="userName" id="userName" value="<?php echo $urow['user_id'];?>" class="form-control" placeholder="Enter user name" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                        </div>
                                </div>
                                 <?php if($this->session->userdata('access_level')==1):?>
                                <div class="form-group has-feedback">
                                        <label for="hori-pass1" class="col-sm-4 control-label">Password*</label>
                                        <div class="col-sm-7">
                                                <input name="password" id="hori-pass1" type="password" placeholder="Password" required class="form-control">
                                                <span class="glyphicon form-control-feedback"></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="hori-pass2"class="col-sm-4 control-label">Confirm Password *</label>
                                        <div class="col-sm-7">
                                                <input data-parsley-equalto="#hori-pass1" type="password" required placeholder="Password" class="form-control" id="hori-pass2">
                                        </div>
                                </div>
                                <?php endif;?>
                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Email*</label>
                                        <div class="col-sm-7">
                                                <input type="email" name="email" value="<?php echo $urow['email'];?>" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="mobile" class="col-sm-4 control-label">Mobile</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="mobile" id="mobilePrefix1" value="<?php echo $urow['mobile'];?>" placeholder="e.g. +8801814724520" class="form-control mobile-number telephone" required="" parsley-trigger="change"  data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Telephone" class="col-sm-4 control-label">Telephone</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="telephone" value="<?php echo $urow['telephone'];?>" class="form-control" placeholder="Telephone">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="department" class="col-sm-4 control-label">Department*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="department" value="<?php echo $urow['department'];?>" id="department" class="form-control" placeholder="Department" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="designation" class="col-sm-4 control-label">Designation*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="designation" id="designation" value="<?php echo $urow['designation'];?>" class="form-control" placeholder="Designation" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                        </div>
                                </div>
                                <?php if($this->session->userdata('access_level')==1 || $this->session->userdata('access_level')==2):?>
                                <div class="form-group">
                                        <label for="reportingManager" class="col-sm-4 control-label">Reporting Manager*</label>
                                        <div class="col-sm-7">
                                            <select name="rmanager" required="" class="form-control">
                                                <option value="">Please Select Manager</option>
                                                <option value="0">None</option>
                                                <?php 
                                                if(isset($user)): 
                                                    foreach ($user as $uval):
                                                        if($uval['access_level']==3):
                                                 ?>
                                                <option value="<?php echo $uval['user_id'];?>" <?php if ($urow['user_id']==$uval['user_id']){?> selected <?php } ?>><?php echo $uval['real_name'];?></option>
                                                <?php 
                                                        endif;
                                                    endforeach; 
                                                    endif;
                                                 ?>
                                                </select>
                                        </div>
                                </div>
                                <?php endif;?>
                                <?php if($this->session->userdata('access_level')==1):?>
                                <div class="form-group">
                                        <label for="accessLevel" class="col-sm-4 control-label">Access Level*</label>
                                        <div class="col-sm-7">
                                            <select name="accessLevel" required="" class="form-control">
                                                <option value="">Please Select Access Level</option>
                                                <option value="1"  <?php if ($urow['access_level']==1){?> selected <?php } ?>>Admin</option>
                                                <option value="2"  <?php if ($urow['access_level']==2){?> selected <?php } ?>>Back Office</option>
                                                <option value="3"  <?php if ($urow['access_level']==3){?> selected <?php } ?>>Manager</option>
                                                <option value="4"  <?php if ($urow['access_level']==4){?> selected <?php } ?>>Executive</option>
                                            </select>
                                        </div>
                                </div>
                                 <?php endif;?>
                                <div class="form-group">
                                        <label for="assignedCompany" class="col-sm-4 control-label">Assigned Company*</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="ompanyName" id="comName"  class="form-control" placeholder="Enter Company Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4" style="text-transform: uppercase;"/>
                                            <input type="hidden" name="assignedCompany" id="orgId"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="Status" class="col-sm-4 control-label">Status*</label>
                                        <div class="col-sm-7">
                                            <select name="userStatus" required="" class="form-control">
                                                <option value="1" <?php if ($urow['status']==1){?> selected <?php } ?>>Active</option>
                                                <?php if($this->session->userdata('access_level')==1):?>
                                                <option value="2" <?php if ($urow['status']==2){?> selected <?php } ?>>Inactive</option>
                                                <option value="3" <?php if ($urow['status']==3){?> selected <?php } ?>>Suspend</option>
                                                <?php endif;?>
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
    <div class="tab-pane <?php if(!isset($edit_user)) echo 'active';?>" id="list">
        <table id="datatable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SL#</th>
            <th>User login</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th>Manager Name</th>
            <th>Access Level</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            if(isset($user)): $sl=1; foreach ($user as $value):
                $mname = $this->Search_Model->getSinglefield('users', 'real_name', 'user_id', $value['reporting_manager']);
        ?>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $value['user_id'];?></td>
            <td><?php echo $value['real_name'];?></td>
            <td class="cp"><?php echo $value['mobile'];?></td>
            <td class="cp"><?php echo $value['email'];?></td>
            <td><?php echo $mname[0]['real_name'];?></td>
            <td><?php if($value['access_level']==1): echo 'Admin';
                      elseif($value['access_level']==2): echo 'Back Office';
                      elseif($value['access_level']==3): echo 'Manager';
                      elseif($value['access_level']==4): echo 'Executive';endif;?></td>
            <td>
                <?php if(in_array(2, $haspermission)==2):?>
                <a class="table-action-btn" href="<?php echo base_url().'index.php?user/user_management/edit/'.$value['id']?>"><i class="md md-edit"></i></a>
                <?php endif;?>
                <?php if(in_array(3, $haspermission)==3):?>
                <a class="table-action-btn" href="<?php echo base_url().'index.php?user/user_management/delete/'.$value['id']?>" onclick="return confirm('user information delete?')"><i class="md md-close"></i></a>
                <?php endif;?>
            </td>
        </tr>
        <?php $sl++; endforeach; endif;?>

        </tbody>
        </table>
    </div>
    <?php endif;?>
 <!----TABLE LISTING ENDS--->
 <!----CREATION FORM STARTS---->
<?php if(in_array(1, $haspermission)==1):?>
    <div class="tab-pane" id="add"> 
        <div class="row">
            <div class="col-sm-12">
                    <div class="card-box">
                            <?php echo form_open('user/user_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                    <div class="form-group">
                                            <label for="fullName" class="col-sm-4 control-label">Full Name*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Enter Full Name" required="" parsley-trigger="change" data-parsley-id="4" style="text-transform: uppercase;">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="userName" class="col-sm-4 control-label">User Name*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="userName" id="userName" class="form-control" placeholder="Enter user name" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                            <label for="hori-pass1" class="col-sm-4 control-label">Password*</label>
                                            <div class="col-sm-7">
                                                    <input name="password" id="hori-pass1" type="password" placeholder="Password" required class="form-control">
                                                    <span class="glyphicon form-control-feedback"></span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="hori-pass2"class="col-sm-4 control-label">Confirm Password *</label>
                                            <div class="col-sm-7">
                                                    <input data-parsley-equalto="#hori-pass1" type="password" required placeholder="Password" class="form-control" id="hori-pass2">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Email*</label>
                                            <div class="col-sm-7">
                                                    <input type="email" name="email" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="mobile" class="col-sm-4 control-label">Mobile</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="mobile" id="mobilePrefix1" placeholder="e.g. +8801814724520" class="form-control mobile-number telephone" required="" parsley-trigger="change"  data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Telephone" class="col-sm-4 control-label">Telephone</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="telephone" class="form-control" placeholder="Telephone">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="department" class="col-sm-4 control-label">Department*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="department" id="userName" class="form-control" placeholder="Department" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="designation" class="col-sm-4 control-label">Designation*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="designation" id="userName" class="form-control" placeholder="Designation" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="reportingManager" class="col-sm-4 control-label">Reporting Manager*</label>
                                            <div class="col-sm-7">
                                                <select name="rmanager" required="" class="form-control">
                                                    <option value="">Please Select Manager</option>
                                                    <option value="0">None</option>
                                                    <?php 
                                                    if(isset($user)): 
                                                        foreach ($user as $uval):
                                                            if($uval['access_level']==3):
                                                     ?>
                                                    <option value="<?php echo $uval['user_id'];?>"><?php echo $uval['real_name'];?></option>
                                                    <?php 
                                                            endif;
                                                        endforeach; 
                                                        endif;
                                                     ?>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="accessLevel" class="col-sm-4 control-label">Access Level*</label>
                                            <div class="col-sm-7">
                                                <select name="accessLevel" required="" class="form-control">
                                                    <option value="">Please Select Access Level</option>
                                                    <?php if($this->session->userdata('access_level')==1):?>
                                                    <option value="1">Admin</option>
                                                    <?php endif;?>
                                                    <option value="2">Back Office</option>
                                                    <option value="3">Manager</option>
                                                    <option value="4">Executive</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="assignedCompany" class="col-sm-4 control-label">Assigned Company*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="ompanyName" id="comName" class="form-control" placeholder="Enter Company Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4" style="text-transform: uppercase;"/>
                                                <input type="hidden" name="assignedCompany" id="orgId"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Status" class="col-sm-4 control-label">Status*</label>
                                            <div class="col-sm-7">
                                                <select name="userStatus" required="" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                    <option value="3">Suspend</option>
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
<script src="<?php echo base_url();?>assets/js/intlTelInput.js"></script> 
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
        $('#fullName').keyup(function() {
            if (this.value.match(/[^a-zA-Z ]/g)) {
                this.value = this.value.replace(/[^a-zA-Z ]/g, '');
            }
        });
        $("#hori-pass1").keyup(function(){
                if($("#hori-pass1").val().length>7){
                    //add success
                    $('.has-feedback').removeClass('has-warning').addClass('has-success');
                    $('.form-control-feedback').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
                }else if ($("#hori-pass1").val().length<7){
                    $('.has-feedback').removeClass('has-success').addClass('has-warning');
                    $('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-warning-sign');
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
        //
        
    });
</script>
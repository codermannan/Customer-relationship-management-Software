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
                <?php if(isset($edit_todo) && in_array(2, $haspermission)==2):?>
                <li class="active">
                <a href="#edit" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>EDIT TODO</b></span> 
                </a> 
                </li>
                <?php endif;?>
                <?php if(in_array(4, $haspermission)==4):?>
                <li class="<?php if(!isset($edit_todo)) echo 'active';?>"> 
                <a href="#list" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs"><b>TODO LIST</b></span> 
                </a> 
                </li> 
                <?php endif;?>
                <?php if(in_array(1, $haspermission)==1):?>
                <li class=""> 
                <a href="#add" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                    <span class="hidden-xs"><b>ADD TODO</b></span> 
                </a> 
                </li>
                <?php endif;?>
            </ul> 
<div class="tab-content">
  <!----EDITING FORM STARTS---->
    <?php if(isset($edit_todo) && in_array(2, $haspermission)==2):?>
        <div class="tab-pane <?php if(isset($edit_todo)) echo 'active';?>" id="edit">
        <div class="row">
                <div class="col-sm-12">
                        <div class="card-box">
                                <?php foreach($edit_todo as $urow):?>
                                <?php echo form_open_multipart('admin/todo_management/edit/do_update/'.$urow['id'], array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                     <div class="form-group">
                                            <label for="fax" class="col-sm-4 control-label">Title*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="title" required="" class="form-control telephone" placeholder="title" value="<?php echo $urow['title'];?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Description" class="col-sm-4 control-label">Description</label>
                                            <div class="col-sm-7">
                                                <textarea data-parsley-id="10" cols="73" rows="3" name="description" id="address" style="text-transform: uppercase;"><?php echo $urow['description'];?></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Client" class="col-sm-4 control-label">Client*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="com_name" id="comName" class="form-control" placeholder="Enter Client Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4" style="text-transform: uppercase;"/>
                                                <input type="hidden" name="orgid" id="orgId"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Start Date" class="col-sm-4 control-label">Start Date*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="start_date" required="" class="form-control datepickerFrom" placeholder="mm/dd/yyyy" data-parsley-id="14" value="<?php echo $urow['start_date'];?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Due Date" class="col-sm-4 control-label">Due Date*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="due_date" required="" class="form-control datepickerFrom" placeholder="mm/dd/yyyy" data-parsley-id="14" value="<?php echo $urow['due_date'];?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Assigned To" class="col-sm-4 control-label">Assigned To*</label>
                                            <div class="col-sm-7">
                                                <select name="assignedto" required="" class="form-control">
                                                    <option value="">Please Select Executives</option>
                                                    <?php 
                                                    if(isset($user)): 
                                                        foreach ($user as $uval):
                                                            if($uval['access_level']==4):
                                                     ?>
                                                    <option value="<?php echo $uval['user_id'];?>" <?php if ($urow['assignedto']==$uval['user_id']){?> selected <?php } ?>><?php echo $uval['real_name'];?></option>
                                                    <?php 
                                                            endif;
                                                        endforeach; 
                                                        endif;
                                                     ?>
                                                    </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Priority" class="col-sm-4 control-label">Priority*</label>
                                            <div class="col-sm-7">
                                                <select name="priority" id="ctype" required="" class="form-control">
                                                    <option value="">Please Select Priority</option>
                                                    <option value="1" <?php if ($urow['priority']==1){?> selected <?php } ?>>Normal</option>
                                                    <option value="2" <?php if ($urow['priority']==2){?> selected <?php } ?>>Urgent</option>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Status" class="col-sm-4 control-label">Status*</label>
                                            <div class="col-sm-7">
                                                <select name="status" id="status" required="" class="form-control">
                                                    <option value="">Please Select Status</option>
                                                    <option value="1" <?php if ($urow['status']==1){?> selected <?php } ?>>In Progress</option>
                                                    <option value="2" <?php if ($urow['status']==2){?> selected <?php } ?>>On Hold</option>
                                                    <option value="3" <?php if ($urow['status']==3){?> selected <?php } ?>>Completed</option>
                                                    <option value="4" <?php if ($urow['status']==4){?> selected <?php } ?>>Cancelled</option>
                                                 </select>
                                            </div>
                                    </div>
                                        <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="Update" class="btn btn-primary waves-effect waves-light">
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
    <div class="tab-pane <?php if(!isset($edit_todo)) echo 'active';?>" id="list">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL#</th>
                    <th>Job No</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Assign To</th>
                    <th>Assign By</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
            <?php if(isset($todo)): $sl=1; foreach ($todo as $value):?>
            <tr>
                <td><?php echo $sl;?></td>
                <td><?php echo $value['job_no'];?></td>
                <td><?php echo $value['title'];?></td>
                <td><?php echo $value['start_date'];?></td>
                <td><?php echo $value['due_date'];?></td>
                <td><?php echo $value['assignedto'];?></td>
                <td><?php echo $value['assignedby'];?></td>
                <td><?php if($value['priority']==1):echo 'Normal';elseif ($value['priority']==2):echo 'Urgent';endif;?></td>
                <td>
                <?php 
                    if(date('Y-m-d',time())>$value['due_date']):
                        echo '<div class="label label-table label-warning">Incompleted</div>';
                    elseif($value['status']==1):
                        echo '<div class="label label-table label-default">In Progress</div>';
                    elseif($value['status']==2):
                        echo '<div class="label label-table label-inverse">On Hold</div>';
                    elseif($value['status']==3):
                        echo '<div class="label label-table label-success">Completed</div>';
                    elseif($value['status']==4):
                        echo '<div class="label label-table label-danger">Cancelled</div>';
                    endif;
                 ?>
                </td>
                <td>
                <?php if($this->session->userdata('access_level')<>4):?>
                    <button class="btn btn-purple waves-effect waves-light btn-xs" type="button" data-toggle="modal" data-target="#con-close-modal" onclick="setStatus(<?php echo $value['id'];?>);">Action</button>
                <?php endif;?>
                </td>
                <td>
                    <?php if(in_array(2, $haspermission)==2):?>
                    <a class="table-action-btn" href="<?php echo base_url().'index.php?admin/todo_management/edit/'.$value['id']?>"><i class="md md-edit"></i></a>
                    <?php endif;?>
                    <?php if(in_array(3, $haspermission)==3):?>
                    <a class="table-action-btn" href="<?php echo base_url().'index.php?admin/todo_management/delete/'.$value['id']?>" onclick="return confirm('Todo information delete?')"><i class="md md-close"></i></a>
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
                            <?php echo form_open_multipart('admin/todo_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                    <div class="form-group">
                                            <label for="fax" class="col-sm-4 control-label">Title*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="title" name="title" required="" class="form-control telephone" placeholder="title">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Description" class="col-sm-4 control-label">Description</label>
                                            <div class="col-sm-7">
                                                <textarea data-parsley-id="10" cols="73" rows="3" name="description" id="address" style="text-transform: uppercase;"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Client" class="col-sm-4 control-label">Client*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="com_name" id="comName" class="form-control" placeholder="Enter Client Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4" style="text-transform: uppercase;"/>
                                                <input type="hidden" name="orgid" id="orgId"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Start Date" class="col-sm-4 control-label">Start Date*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="start_date" required="" class="form-control datepickerFrom" placeholder="mm/dd/yyyy" data-parsley-id="14">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Due Date" class="col-sm-4 control-label">Due Date*</label>
                                            <div class="col-sm-7">
                                                    <input type="text" name="due_date" required="" class="form-control datepickerFrom" placeholder="mm/dd/yyyy" data-parsley-id="14">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Assigned To" class="col-sm-4 control-label">Assigned To*</label>
                                            <div class="col-sm-7">
                                                <select name="assignedto" required="" class="form-control">
                                                    <option value="">Please Select Executives</option>
                                                    <?php 
                                                    if(isset($user)): 
                                                        foreach ($user as $uval):
                                                            if($uval['access_level']==4):
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
                                            <label for="Priority" class="col-sm-4 control-label">Priority*</label>
                                            <div class="col-sm-7">
                                                <select name="priority" id="ctype" required="" class="form-control">
                                                    <option value="">Please Select Priority</option>
                                                    <option value="1">Normal</option>
                                                    <option value="2">Urgent</option>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="Status" class="col-sm-4 control-label">Status*</label>
                                            <div class="col-sm-7">
                                                <select name="status" id="status" required="" class="form-control">
                                                    <option value="">Please Select Status</option>
                                                    <option value="1">In Progress</option>
                                                    <option value="2">On Hold</option>
                                                    <option value="3">Completed</option>
                                                    <option value="4">Cancelled</option>
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
<!-- action modal-->
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                        <h4 class="modal-title">Expense Bill</h4> 
                    </div> 
                    <?php echo form_open('admin/todo_management/action', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                    <input type="hidden" name="tid" id="tid"/>
                    <div class="modal-body">
                        <div class="row" id="pay"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">Status*</label> 
                                    <select class="form-control" name="statusUpdate" id="statusUpdate">
                                        <option value="">Please Select Status</option>
                                        <option value="1">In Progress</option>
                                        <option value="2">On Hold</option>
                                        <option value="3">Completed</option>
                                        <option value="4">Cancelled</option>
                                    </select>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer"> 
                         <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                         <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close();?>
                </div> 
            </div>
 </div><!-- /.modal -->
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
     function setStatus(tid){
           document.getElementById("tid").value=tid;
    }
</script>
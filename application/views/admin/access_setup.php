<div class="row">
    <div class="col-lg-12">
        <?php if ($this->session->flashdata('insert_message')){?>
            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('insert_message');?></div>
        <?php }else if($this->session->flashdata('update_message')) {?>
             <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('update_message');?></div>
        <?php }else if($this->session->flashdata('delete_message')) {?>
             <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('delete_message');?></div>
        <?php }else if($this->session->flashdata('dup_message')) {?>
             <div class="alert alert-da" role="alert"><?php echo $this->session->flashdata('dup_message');?></div>
        <?php } ?>  
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12"> 
<div class="search-result-box m-t-40">
<ul class="nav nav-tabs"> 
    <?php if(isset($edit_access)):?>
    <li class="active">
    <a href="#edit" data-toggle="tab" aria-expanded="true"> 
        <span class="visible-xs"><i class="fa fa-home"></i></span> 
        <span class="hidden-xs"><b>EDIT ACCESS</b></span> 
    </a> 
    </li>
    <?php endif;?>
    <li class="<?php if(!isset($edit_access)) echo 'active';?>"> 
    <a href="#list" data-toggle="tab" aria-expanded="true"> 
        <span class="visible-xs"><i class="fa fa-home"></i></span> 
        <span class="hidden-xs"><b>ACCESS LIST</b></span> 
    </a> 
    </li> 
    <li class=""> 
    <a href="#add" data-toggle="tab" aria-expanded="false"> 
        <span class="visible-xs"><i class="fa fa-user"></i></span> 
        <span class="hidden-xs"><b>ACCESS SETUP</b></span> 
    </a> 
    </li>
</ul> 
<div class="tab-content"> 
    <!----EDITING FORM STARTS---->
    <?php if(isset($edit_access)):?>
     <div class="tab-pane <?php if(isset($edit_access)) echo 'active';?>" id="edit">
        <div class="row">
        <div class="col-sm-12">
                <div class="card-box">
                        <?php foreach($edit_access as $urow):?>
                        <?php echo form_open('user/access_management/edit/do_update/'.$urow['id'], array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                <div class="form-group">
                                        <label for="accessLevel" class="col-sm-4 control-label">User Role*</label>
                                        <div class="col-sm-7">
                                            <select name="accessLevel" required="" class="form-control">
                                                <option value="">Please Select Role</option>
                                                <option value="1" <?php if ($urow['role_id']==1){?> selected <?php } ?>>Admin</option>
                                                <option value="2" <?php if ($urow['role_id']==2){?> selected <?php } ?>>Back Office</option>
                                                <option value="3" <?php if ($urow['role_id']==3){?> selected <?php } ?>>Manager</option>
                                                <option value="4" <?php if ($urow['role_id']==4){?> selected <?php } ?>>Executive</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="menu" class="col-sm-4 control-label">Menu*</label>
                                        <div class="col-sm-7">
                                            <select name="menu" required="" class="form-control">
                                                <option value="">Please Select Menu</option>
                                                <?php if(isset($menue)): foreach ($menue as $mvalue):?>
                                                <option value="<?php echo $mvalue['menu_id'];?>" <?php if ($urow['menu_id']==$mvalue['menu_id']){?> selected <?php } ?>><?php echo $mvalue['menu_name'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="menu" class="col-sm-4 control-label">Permissions*</label>
                                        <div class="col-sm-7">
                                            <div class="checkbox checkbox-primary checkbox-inline">
                                                <input type="checkbox" name="permission[]" value="1" id="inlineCheckbox1">
                                                <label for="inlineCheckbox1"> ADD </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" name="permission[]" value="2" id="inlineCheckbox2">
                                                <label for="inlineCheckbox2"> EDIT </label>
                                            </div>
                                            <div class="checkbox checkbox-danger checkbox-inline">
                                                <input type="checkbox" name="permission[]" value="3" id="inlineCheckbox3">
                                                <label for="inlineCheckbox3"> DELETE </label>
                                            </div>
                                            <div class="checkbox checkbox-info checkbox-inline">
                                                <input type="checkbox" name="permission[]" value="4" id="inlineCheckbox4">
                                                <label for="inlineCheckbox4"> LIST </label>
                                            </div>
                                            <div class="checkbox checkbox-warning checkbox-inline">
                                                <input type="checkbox" name="permission[]" value="5" id="inlineCheckbox5">
                                                <label for="inlineCheckbox5"> VIEW </label>
                                            </div>
                                            <div class="checkbox checkbox-pink checkbox-inline">
                                                <input type="checkbox" name="permission[]" value="6" id="inlineCheckbox6">
                                                <label for="inlineCheckbox6"> SEARCH </label>
                                            </div>
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
    <div class="tab-pane <?php if(!isset($edit_access)) echo 'active';?>" id="list">
        <table id="datatable" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Role Name</th>
        <th>Menu Name</th>
        <th>Permission</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($access)): $sl=1; foreach ($access as $value):?>
    <tr>
        <td><?php if($value['role_id']==1): echo 'Admin';
                  elseif($value['role_id']==2): echo 'Back Office';
                  elseif($value['role_id']==3): echo 'Manager';
                  elseif($value['role_id']==4): echo 'Executive';endif;?></td>
        <td><?php echo $value['menu_name'];?></td>
        <td><?php 
              $p = json_decode($value['permission']);
              if(in_array("1", $p)): echo 'ADD |';endif;
              if(in_array("2", $p)): echo 'EDIT |';endif;
              if(in_array("3", $p)): echo 'DELETE |';endif;
              if(in_array("4", $p)): echo 'LIST |';endif;
              if(in_array("5", $p)): echo 'VIEW |';endif;
              if(in_array("6", $p)): echo 'SEARCH ';endif;
        ?>
        </td>
        <td>
            <a class="table-action-btn" href="<?php echo base_url().'index.php?user/access_management/edit/'.$value['id']?>"><i class="md md-edit"></i></a>
                        <a class="table-action-btn" href="<?php echo base_url().'index.php?user/access_management/delete/'.$value['id']?>" onclick="return confirm('User permission delete?')"><i class="md md-close"></i></a>
        </td>
    </tr>
    <?php endforeach; endif;?>

    </tbody>
    </table>
    </div>
 <!----TABLE LISTING ENDS--->
 <!----CREATION FORM STARTS---->
    <div class="tab-pane" id="add"> 
    <div class="row">
            <div class="col-sm-12">
                    <div class="card-box">
                            <?php echo form_open('user/access_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                    <div class="form-group">
                                            <label for="accessLevel" class="col-sm-4 control-label">User Role*</label>
                                            <div class="col-sm-7">
                                                <select name="accessLevel" required="" class="form-control">
                                                    <option value="">Please Select Role</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Back Office</option>
                                                    <option value="3">Manager</option>
                                                    <option value="4">Executive</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="menu" class="col-sm-4 control-label">Menu*</label>
                                            <div class="col-sm-7">
                                                <select name="menu" required="" class="form-control">
                                                    <option value="">Please Select Menu</option>
                                                    <?php if(isset($menue)): foreach ($menue as $mvalue):?>
                                                    <option value="<?php echo $mvalue['menu_id'];?>"><?php echo $mvalue['menu_name'];?></option>
                                                    <?php endforeach; endif;?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="menu" class="col-sm-4 control-label">Permissions*</label>
                                            <div class="col-sm-7">
                                                <div class="checkbox checkbox-primary checkbox-inline">
                                                    <input type="checkbox" name="permission[]" value="1" id="inlineCheckbox1">
                                                    <label for="inlineCheckbox1"> ADD </label>
                                                </div>
                                                <div class="checkbox checkbox-success checkbox-inline">
                                                    <input type="checkbox" name="permission[]" value="2" id="inlineCheckbox2">
                                                    <label for="inlineCheckbox2"> EDIT </label>
                                                </div>
                                                <div class="checkbox checkbox-danger checkbox-inline">
                                                    <input type="checkbox" name="permission[]" value="3" id="inlineCheckbox3">
                                                    <label for="inlineCheckbox3"> DELETE </label>
                                                </div>
                                                <div class="checkbox checkbox-info checkbox-inline">
                                                    <input type="checkbox" name="permission[]" value="4" id="inlineCheckbox4">
                                                    <label for="inlineCheckbox4"> LIST </label>
                                                </div>
                                                <div class="checkbox checkbox-warning checkbox-inline">
                                                    <input type="checkbox" name="permission[]" value="5" id="inlineCheckbox5">
                                                    <label for="inlineCheckbox5"> VIEW </label>
                                                </div>
                                                <div class="checkbox checkbox-pink checkbox-inline">
                                                    <input type="checkbox" name="permission[]" value="6" id="inlineCheckbox6">
                                                    <label for="inlineCheckbox6"> SEARCH </label>
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
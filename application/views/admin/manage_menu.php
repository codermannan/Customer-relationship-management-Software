<div class="row">
        <div class="col-lg-12"> 
<div class="search-result-box m-t-40">
<ul class="nav nav-tabs"> 
<li class="active"> 
<a href="#list" data-toggle="tab" aria-expanded="true"> 
    <span class="visible-xs"><i class="fa fa-home"></i></span> 
    <span class="hidden-xs"><b>MENU LIST</b></span> 
</a> 
</li> 
<li class=""> 
<a href="#add" data-toggle="tab" aria-expanded="false"> 
    <span class="visible-xs"><i class="fa fa-user"></i></span> 
    <span class="hidden-xs"><b>ADD MENU</b></span> 
</a> 
</li>
</ul> 
<div class="tab-content"> 
<div class="tab-pane active" id="list">
<table id="datatable" class="table table-striped table-bordered">
<thead>
<tr>
    <th>Menu ID</th>
    <th>Menu Name</th>
    <th>Parent Menu</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
<?php if(isset($menu)): $sl=1; foreach ($menu as $value):?>
<tr>
    <td><?php echo $value['menu_id'];?></td>
    <td><?php echo $value['menu_name'];?></td>
    <td><?php if($value['sub_menu']==0): echo 'Parent';
              elseif($value['sub_menu']==7): echo 'Users';endif;?></td>
    <td></td>
    <td></td>
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
                        <?php echo form_open('user/menu_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                <div class="form-group">
                                        <label for="menuName" class="col-sm-4 control-label">Menu Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="menuName" id="userName" class="form-control" placeholder="Enter Menu Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="parentMenu" class="col-sm-4 control-label">Parent Menu*</label>
                                        <div class="col-sm-7">
                                            <select name="parentMenu" required="" class="form-control">
                                                <option value="0">Parent Menu</option>
                                                <?php if(isset($menu)): foreach ($menu as $value):?>
                                                <option value="<?php echo $value['menu_id'];?>"><?php echo $value['menu_name'];?></option>
                                                <?php endforeach; endif;?>
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
<!-- end Users tab -->
</div> 
</div>
</div>
</div>

<div class="row">
        <div class="col-lg-12"> 
<div class="search-result-box m-t-40">
<ul class="nav nav-tabs"> 
<li class="active"> 
<a href="#list" data-toggle="tab" aria-expanded="true"> 
    <span class="visible-xs"><i class="fa fa-home"></i></span> 
    <span class="hidden-xs"><b>CATEGORY LIST</b></span> 
</a> 
</li> 
<li class=""> 
<a href="#add" data-toggle="tab" aria-expanded="false"> 
    <span class="visible-xs"><i class="fa fa-user"></i></span> 
    <span class="hidden-xs"><b>ADD CATEGORY</b></span> 
</a> 
</li>
</ul> 
<div class="tab-content"> 
<div class="tab-pane active" id="list">
<table id="datatable" class="table table-striped table-bordered">
<thead>
<tr>
    <th>SL#</th>
    <th>Category Name</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php if(isset($cat)): $sl=1; foreach ($cat as $value):?>
<tr>
    <td><?php echo $sl;?></td>
    <td><?php echo $value['cat_name'];?></td>
    <td><?php echo $value['status']==1?'Active':'Inactive';?></td>
    <td>
        <a class="table-action-btn" href="#"><i class="md md-edit"></i></a>
        <a class="table-action-btn" href="#"><i class="md md-close"></i></a>
    </td>
</tr>
<?php $sl++; endforeach; endif;?>

</tbody>
</table>
</div>
<!-- end All results tab -->
<!-- Users tab -->
<div class="tab-pane" id="add"> 
<div class="row">
        <div class="col-sm-12">
                <div class="card-box">
                        <?php echo form_open_multipart('admin/category_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                <div class="form-group">
                                        <label for="cat_name" class="col-sm-4 control-label">Category Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="cat_name" id="userName" class="form-control" placeholder="Enter Category Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-7">
                                                <select name="status" required="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
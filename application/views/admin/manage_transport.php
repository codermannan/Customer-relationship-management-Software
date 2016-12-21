
<div class="row">
        <div class="col-lg-12"> 
<div class="search-result-box m-t-40">
<ul class="nav nav-tabs"> 
<li class="active"> 
<a href="#list" data-toggle="tab" aria-expanded="true"> 
    <span class="visible-xs"><i class="fa fa-home"></i></span> 
    <span class="hidden-xs"><b>TRANSPORT LIST</b></span> 
</a> 
</li> 
<li class=""> 
<a href="#add" data-toggle="tab" aria-expanded="false"> 
    <span class="visible-xs"><i class="fa fa-user"></i></span> 
    <span class="hidden-xs"><b>ADD TRANSPORT</b></span> 
</a> 
</li>
</ul> 
<div class="tab-content"> 
<div class="tab-pane active" id="list">
<table id="datatable" class="table table-striped table-bordered">
<thead>
<tr>
    <th>SL#</th>
    <th>Transport Type</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php if(isset($trmode)): $sl=1; foreach ($trmode as $value):?>
<tr>
    <td><?php echo $sl;?></td>
    <td><?php echo $value['transport_mode'];?></td>
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
                        <?php echo form_open_multipart('setting/transport_management/create', array("class"=>"form-horizontal data-parsley-validate novalidate"));?>
                                <div class="form-group">
                                        <label for="TransportName" class="col-sm-4 control-label">Transport Name*</label>
                                        <div class="col-sm-7">
                                                <input type="text" name="transport_mode" id="userName" class="form-control" placeholder="Enter Transport Name" required="" parsley-trigger="change" name="nick" data-parsley-id="4">
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
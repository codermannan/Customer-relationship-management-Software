<script type="text/javascript">
        var count = 1;
        function addMoreEmpRows(frm) {
            count++;
            var recRow = '<tr id="trid'+count+'"><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="exp_type[' + count + ']" data-parsley-id="28"><option value="">Please Select</option><option value="1">Transport</option><option value="2">Misc</option></select></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter From" class="form-control" id="dstFrom" name="dst_from[' + count + ']"></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter To" class="form-control" id="dstFrom" name="dst_to[' + count + ']"></td><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="trans_mode[' + count + ']"><option value="">Please Select</option><option value="1">Bike</option><option value="2">Bus</option><option value="3">Train</option><option value="4">Ferry</option><option value="5">Rickshaw</option></select></td><td class="footable-visible" style="width: 121px;"><input type="text" id="datepicker3" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" name="from_date[' + count + ']"></td><td class="footable-visible" style="width: 121px;"><input type="text" id="datepicker4" placeholder="mm/dd/yyyy" class="form-control datepickerTo" name="to_date[' + count + ']"></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Purpose" class="form-control" id="Purpose" name="purpose[' + count + ']"></td><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="currency[' + count + ']"><option value="">Please Select</option><option value="1">AUD</option><option value="2">BRL</option><option value="3">CAD</option><option value="4">CZK</option><option value="5">DKK</option><option value="6">EUR</option><option value="7">HKD</option><option value="8">HUF</option><option value="9">ILS</option><option value="10">JPY</option><option value="11">MYR</option><option value="12">MXN</option><option value="13">NOK</option><option value="14">NZD</option><option value="15">PHP</option><option value="16">PLN</option><option value="17">GBP</option><option value="18">SGD</option><option value="19">SEK</option><option value="20">CHF</option><option value="21">TWD</option><option value="22">THB</option><option value="23">TRY</option><option value="24">USD</option><option value="25">BDT</option></select></td><td class="footable-visible" style="width: 121px;"><input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Amount" class="form-control" id="amount" name="amount[' + count + ']"></td><td class="footable-visible" style="width: 121px;"><select class="form-control" required="" name="ravailable[' + count + ']" data-parsley-id="28"><option value="">Please Select</option><option value="1">Yes</option><option value="0">No</option></select></td><td style="text-align: center;"><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times" onclick="removeRow('+count+')"></button></td></tr>';
           
            $('#demo-foo-addrow tbody').append(recRow);
            
            $( ".datepickerFrom,.datepickerTo").datepicker({
                changeMonth: true,//this option for allowing user to select month
                changeYear: true,
                dateFormat: 'dd-mm-yy'//this option for allowing user to select from year range
              });
        }
        
        function removeRow(id){
            $('#trid'+id).remove();
        }
</script>
<div class="row">
        <div class="col-lg-12"> 
<div class="search-result-box m-t-40">
<ul class="nav nav-tabs"> 
<li class="active"> 
<a href="#list" data-toggle="tab" aria-expanded="true"> 
    <span class="visible-xs"><i class="fa fa-home"></i></span> 
    <span class="hidden-xs"><b>EXPENSE LIST</b></span> 
</a> 
</li> 
<li class=""> 
<a href="#add" data-toggle="tab" aria-expanded="false"> 
    <span class="visible-xs"><i class="fa fa-user"></i></span> 
    <span class="hidden-xs"><b>ADD EXPENSE</b></span> 
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
                                <table data-page-size="7" class="table table-striped m-b-0 table-hover toggle-circle tablet breakpoint footable-loaded footable no-paging" id="demo-foo-addrow">
                                <thead>
                                    <tr>
                                        <th data-toggle="true" data-sort-initial="true" class="footable-visible footable-sortable" style="text-align: center;">Type<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-sorted-desc" style="text-align: center;">From<span class="footable-sort-indicator"></span></th>
                                        <th class="footable-visible footable-sortable footable-sorted-desc" style="text-align: center;">To<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone" class="footable-visible footable-sortable footable-last-column" style="text-align: center;">Mode<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Date From<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Date To<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Purpose<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Currency<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Amount<span class="footable-sort-indicator"></span></th>
                                        <th data-hide="phone, tablet" class="footable-sortable" style="text-align: center;">Receipt Available<span class="footable-sort-indicator"></span></th>
                                        <th><button onclick="addMoreEmpRows(this.form);" class="demo-delete-row btn fa-plus btn-xs btn-icon fa fa-times btn btn-lg btn-default"></button></td></th>
                                    </tr>
                                </thead>
                                <?php 
                                    $attributes = array("name"=>"exp_form","class"=>"form-horizontal data-parsley-validate novalidate");
                                    echo form_open_multipart('admin/expense_management/create',$attributes);
                                ?>
                                <tbody>
                                    <tr style="display: table-row;" class="footable-even">
                                        <td class="footable-visible" style="width: 121px;">
                                            <select class="form-control" required="" name="exp_type[1]" data-parsley-id="28">
                                                <option value="">Please Select</option>
                                                <option value="1">Transport</option>
                                                <option value="2">Misc</option>
                                            </select>
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter From" class="form-control" id="dstFrom" name="dst_from[1]">
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Enter To" class="form-control" id="dstTo" name="dst_to[1]">
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <select name="trans_mode[1]" required="" class="form-control">
                                                <option value="">Please Select</option>
                                                <?php if(isset($mode)): foreach ($mode as $mvalue):?>
                                                <option value="<?php echo $mvalue['id'];?>"><?php echo $mvalue['transport_mode'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <input type="text" id="datepicker1" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" name="from_date[1]">
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <input type="text" id="datepicker2" placeholder="mm/dd/yyyy" class="form-control datepickerTo" name="to_date[1]">
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Purpose" class="form-control" id="purpose" name="purpose[1]">
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <select name="currency[1]" required="" class="form-control">
                                                <option value="">Please Select</option>
                                                <?php if(isset($cur)): foreach ($cur as $cvalue):?>
                                                <option value="<?php echo $cvalue['id'];?>"><?php echo $cvalue['code'];?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <input type="text" data-parsley-id="8" parsley-trigger="change" required="" placeholder="Amount" class="form-control" id="dstTo" name="amount[1]">
                                        </td>
                                        <td class="footable-visible" style="width: 121px;">
                                            <select class="form-control" required="" name="ravailable[1]" data-parsley-id="28">
                                                <option value="">Please Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </td>
                                        <td style="text-align: center;" class="footable-visible footable-first-column"><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td>
                                    </tr>
                                </tbody>
                        </table>
                        <div class="pad-btm form-inline" style="text-align:center;">
                                <div class="row">
                                        <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                                                </div>
                                        </div>

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











<div class="row">
    <div class="col-lg-12">
        <?php if ($this->session->flashdata('app_message')){?>
            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('app_message');?></div>
        <?php }else if($this->session->flashdata('delete_message')) {?>
             <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('delete_message');?></div>
        <?php } ?>
              
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">              
<div class="col-lg-12">
     <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Orders List Panel</h3>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>PFI No</th>
                    <th>Supplier</th>
                    <th>Customer</th>
                    <th>Order Date</th>
                    <th>Payment Terms</th>
                    <th>Order Total</th>
                    <th>Commission Total</th>
                    <th>Order Status</th>
                    <th>Commission Status</th>
                    <th>Action</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($order)): $sl=1; foreach ($order as $value):
                        $cus_name = $this->Search_Model->getSinglefield('setup_company', 'com_name', 'com_id', $value['customer_id']);
                ?>
                <tr>
                    <td><?php echo $value['order_no'];?></td>
                    <td><?php echo $value['com_name'];?></td>
                    <td><?php echo $cus_name[0]['com_name'];?></td>
                    <td><?php echo date('d-m-Y',  strtotime($value['ord_date']));?></td>
                    <td><?php echo $value['terms'];?></td>
                    <td><?php echo $value['total'];?></td>
                    <td><?php echo $value['commission_total'];?></td>
                    <td>
                    <?php 
                        if($value['order_status']==1):
                            echo '<div class="label label-table label-warning">Placed</div>';
                        elseif($value['order_status']==2):
                            echo '<div class="label label-table label-info">LC ISSUED</div>';
                        elseif($value['order_status']==3):
                            echo '<div class="label label-table btn-purple">CONSIGNEE REVOKED</div>';
                        elseif($value['order_status']==4):
                            echo '<div class="label label-table label-inverse">SHIPPER CANCELLED</div>';
                        elseif($value['order_status']==5):
                            echo '<div class="label label-table label-danger">LC EXPIRED</div>';
                        elseif($value['order_status']==6):
                            echo '<div class="label label-table label-success">SHIPPED</div>';
                        endif;
                     ?>
                    </td>
                    <td>
                    <?php 
                        if($value['commission_status']==1):
                            echo '<div class="label label-table label-warning">Unpaid</div>';
                        elseif($value['commission_status']==2):
                            echo '<div class="label label-table label-success"> PAID</div>';
                        elseif($value['commission_status']==3):
                            echo '<div class="label label-table label-info">OFFSET</div>';
                        elseif($value['commission_status']==4):
                            echo '<div class="label label-table label-danger"> LOSS</div>';
                        endif;
                     ?>
                    </td>
                    <td>
                        <?php if($this->session->userdata('access_level')<>4):?>
                            <button class="btn btn-purple waves-effect waves-light btn-xs" type="button" data-toggle="modal" data-target="#con-close-modal" onclick="getId(<?php echo $value['id'];?>);">Action</button>
                        <?php endif;?>
                     </td>
                     <td>
                        <?php if(in_array(2, $haspermission)==2):?>
                         <a data-placement="top" data-toggle="tooltip" title="Edit"  class="on-default edit-row" href="#"><i class="fa fa-pencil"></i></a>
                        <?php endif;?>
                        <?php if(in_array(3, $haspermission)==3):?>
                        <a data-placement="top" data-toggle="tooltip" title="Delete"  class="on-default remove-row" href="<?php echo base_url().'index.php?admin/manage_orders/delete/'.$value['id']?>" onclick="return confirm('Do you want to delete the order?')"><i class="fa fa-trash-o"></i></a>
                        <?php endif;?>
                    </td>
                </tr>
                <?php $sl++; endforeach; endif;?>

                </tbody>
                </table>
            </div>
            <div style="text-align: right;" class="panel-footer">
            </div>
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
</div>
<!-- action modal-->
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                        <h4 class="modal-title">Order Status</h4> 
                    </div> 
                    <?php echo form_open('admin/manage_orders/action', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                    <input type="hidden" name="oid" id="oid"/>
                    <div class="modal-body">
                        <div class="row" id="pay"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">Order Status*</label> 
                                    <select class="form-control" name="order_status" id="orderStatus" onchange="setStatus(this.value)">
                                        <option value="">Please Select Status</option>
                                        <option value="2">LC ISSUED</option>
                                        <option value="3">CONSIGNEE REVOKED</option>
                                        <option value="4">SHIPPER CANCELLED</option>
                                        <option value="5">LC EXPIRED</option>
                                        <option value="6">SHIPPED</option>
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        <div id="lc" style="display: none;">
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">LC Number</label> 
                                    <input type="text" placeholder="LC Number" class="form-control" name="lc_number" data-parsley-id="8">
                                </div> 
                            </div> 
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">LC Issue Date</label> 
                                    <input type="text" data-parsley-id="14" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" name="lc_issue_date">
                                </div> 
                            </div> 
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">Bank Name</label> 
                                    <input type="text" placeholder="LC Bank" class="form-control" name="lc_bank" data-parsley-id="8">
                                </div> 
                            </div> 
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">Last date of Shipment</label> 
                                    <input type="text" data-parsley-id="14" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" name="ldate_shipment">
                                </div> 
                            </div> 
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">LC Expire Date</label> 
                                    <input type="text" data-parsley-id="14" placeholder="mm/dd/yyyy" class="form-control datepickerFrom" name="lc_exp_date">
                                </div> 
                            </div> 
                        </div>
                        </div>
                        <div id="vi" style="display: none;">
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group no-margin"> 
                                    <label for="field-7" class="control-label" style="text-align: left;">Vessel Info</label> 
                                    <textarea name="vessel_info" class="form-control autogrow" id="field-7" placeholder="Vessel Info" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                </div> 
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
 <script>
     function setStatus(sid){
       if(sid==2){
            document.getElementById("vi").style.display = "none";
            document.getElementById("lc").style.display = "block";
        }else if(sid==6){
            document.getElementById("lc").style.display = "none";
            document.getElementById("vi").style.display = "block";
        }else{
            document.getElementById("lc").style.display = "none";
            document.getElementById("vi").style.display = "none";
        }
    }
    function getId(id){
           document.getElementById("oid").value=id;
    }
</script>
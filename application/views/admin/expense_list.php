<div class="row">              
    <div class="col-lg-12">
     <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Expense List Panel</h3>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Bill No</th>
                    <th>User</th>
                    <th>Submitted Date</th>
                    <th>Amount</th>
                    <th>Reject Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($expense)): $sl=1; foreach ($expense as $value):?>
                <tr>
                    <td><a data-toggle="modal" data-target="#custom-width-modal" onclick="expdetails(<?php echo $value['bill_no'];?>);"><?php echo $value['bill_no'];?></a></td>
                    <td><?php echo $value['user_id'];?></td>
                    <td><?php echo date('d-m-Y',  strtotime($value['created_date']));?></td>
                    <td><?php echo $value['code'].' '.$value['total_amount'];?></td>
                    <td><?php echo $value['reason'];?></td>
                    <td>
                    <?php 
                        if($value['status']==0):
                            echo '<div class="label label-table label-warning"> Unpaid</div>';
                        elseif($value['status']==1):
                            echo '<div class="label label-table label-inverse"> Approved</div>';
                        elseif($value['status']==2):
                            echo '<div class="label label-table label-success">Paid</div>';
                        elseif($value['status']==3):
                            echo '<div class="label label-table label-danger">Rejected</div>';
                        endif;
                     ?>
                    </td>
                    <td>
                        <?php if($this->session->userdata('access_level')<>4):?>
                            <button class="btn btn-purple waves-effect waves-light btn-xs" type="button" data-toggle="modal" data-target="#con-close-modal" onclick="getStatus(<?php echo $value['status'];?>,<?php echo $value['exp_id'];?>);">Action</button>
                        <?php endif;?>
                    </td>
                    <td>
                        <a class="on-default edit-row" href="#"><i class="fa fa-pencil"></i></a>
                        <a class="on-default remove-row" href="#"><i class="fa fa-trash-o"></i></a>
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
                        <h4 class="modal-title">Expense Bill</h4> 
                    </div> 
                    <?php echo form_open('admin/expense_management/action', array("class"=>"form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                        <input type="hidden" name="expid" id="expId"/>
                    <div class="modal-body">
                        <div class="row" id="pay" style="display: none;"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">Payment</label> 
                                    <select class="form-control" name="payment" id="payment">
                                        <option value="">Please Select</option>
                                        <option value="2">Pay</option>
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        <div id="act" style="display: none;">
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label" style="text-align: left;">Action</label> 
                                    <select class="form-control" name="action" id="Action">
                                        <option value="">Please Select</option>
                                        <option value="1">Approve</option>
                                        <option value="3">Reject</option>
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group no-margin"> 
                                    <label for="field-7" class="control-label" style="text-align: left;">Reason</label> 
                                    <textarea name="reason" class="form-control autogrow" id="field-7" placeholder="Write reject reason" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
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
 <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Expense Bill Details</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="datatable_info">
                        <thead>
                        <tr role="row">
                            <th>Date</th>
                            <th>Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Mode</th>
                            <th>Purpose</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Receipt</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
<!-- jquery ajax-->
<script>
    function getStatus(bno,eid){
           document.getElementById("expId").value=eid;
        if(bno==0){
            document.getElementById("pay").style.display = "none";
            document.getElementById("act").style.display = "block";
        }else if(bno==1){
            document.getElementById("act").style.display = "none";
            document.getElementById("pay").style.display = "block";
        }
    }
    //exp details
    function expdetails(bid)
    {  
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
                      $('#myTable tbody').empty();
                       
                       var jsonObject = JSON.parse(xmlhttp.responseText);
                        
                        if (jsonObject != null)
                        {
                            for(var i = 0; i < jsonObject.length; i++) {
                                var type = jsonObject[i].exp_type==1?'Transport':'Misc';
                                var receipt = jsonObject[i].receipt_available==1?'Yes':'No';
                                $('#myTable tbody').append('<tr><td>'+jsonObject[i].from_date+'</td><td>'+type+'</td><td>'+jsonObject[i].dst_from+'</td><td>'+jsonObject[i].dst_to+'</td><td>'+jsonObject[i].transport_mode+'</td><td>'+jsonObject[i].purpose+'</td><td>'+jsonObject[i].exp_details+'</td><td>'+jsonObject[i].code+' '+jsonObject[i].amount+'</td><td>'+receipt+'</td></tr>');
                            }
                            
                        }
                }
              }
            xmlhttp.open("GET","<?php echo base_url()?>index.php?admin/expensebillDetails/"+bid,true);
            xmlhttp.send();
    }

</script>
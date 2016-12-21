<div class="row">              
<div class="col-lg-12">
     <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Commission List Panel</h3>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>PFI No</th>
                    <th>Supplier</th>
                    <th>Customer</th>
                    <th>Commission Total</th>
                    <th>Commission Status</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($commission)): $sl=1; foreach ($commission as $value):
                        $cus_name = $this->Search_Model->getSinglefield('setup_company', 'com_name', 'com_id', $value['customer_id']);
                ?>
                <tr>
                    <td><?php echo $value['order_no'];?></td>
                    <td><?php echo $value['com_name'];?></td>
                    <td><?php echo $cus_name[0]['com_name'];?></td>
                    <td><?php echo $value['commission_total'];?></td>
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
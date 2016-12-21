<div class="row">              
    <div class="col-lg-12">
     <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Quotes</h3>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>QUOTATION</th>
                    <th>DATE</th>    
                    <th>TIME</th>
                    <th>CONSIGNEE</th>
                    <th>PEOPLE</th>
                    <th>PRODUCT</th>
                    <th>CREATOR</th>
                    <th>MODE</th>
                    <th>ACTION</th>
                    <th>REMARK</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($quotation)): foreach ($quotation as $value):?>
                        <tr>
                            <td><?php echo $value['quotation_no'];?></td>
                            <td><?php echo date('d-m-Y',  strtotime($value['qdate']));?></td>
                            <td><?php echo date('h:m:s',  strtotime($value['entryDate']));?></td>
                            <td><?php echo $value['com_name'];?></td>
                            <td><?php echo $value['FullName'];?></td>
                            <td><?php echo $value['item_name'];?></td>
                            <td><?php echo $value['userId'];?></td>
                            <td><?php echo $value['method']==1?'Email':'Download';?></td>
                            <td><?php echo $value['status']==0?'SEND NEW':'SEND DUPLICATE';?></td>
                            <td><a href="<?php echo base_url().'uploads/quotation/'.$value['quotation_no'].'.pdf'?>" download="<?php $value['quotation_no'];?>"><?php echo $value['quotation_no'].'.pdf'?></a></td>
                            <td>
                                <a class="table-action-btn" href="#"><i class="md md-edit"></i></a>
                                <a class="table-action-btn" href="#"><i class="md md-close"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; endif;?>
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
<html>
    <head>
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                    $opt = json_decode($qcontent[0]['includeoption']);
                 ?>
                    <?php foreach ($qcontent as $value):?>
                    <?php if(in_array(1, $opt)==1):?>
                    <div class="clearfix">
                        <div style="text-align: left; width: 50%; float: left;">
                            <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                             </address>
                        </div>
                        <div style="text-align: left; width: 49%; float: left; text-align: right;">
                            <h4><img src="<?php echo base_url()?>assets/images/logo_dark.png" alt="velonic"></h4>
                        </div>
                    </div>
                    <hr>
                    <?php endif;?>
                    <div class="row">
                        <div style="text-align: left; width: 50%; float: left;">
                            <address>
                            <strong><?php echo $value['com_name'];?></strong><br>
                                <?php echo str_replace( ',', '<br />', $value['com_address'] );?><br>
                                <?php echo $value['com_phone1'];?><br>
                                <?php if($value['com_phone2']<>NULL):?><abbr title="Phone">P:</abbr><?php endif;?><?php echo $value['com_phone2'];?><br>
                                <?php if($value['com_fax']<>NULL):?><abbr title="Fax">P:</abbr><?php endif;?><?php echo $value['com_fax'];?>
                            </address>
                        </div>
                        <div style="text-align: left; width: 49%; float: left; text-align: right;">
                            <address>
                                Quotation #<strong><?php echo $value['quotation_no'];?></strong><br> 
                                Date:<?php echo $value['qdate'];?><br> 
                                Exp. Date:<?php echo $value['exp_date'];?><br> 
                            </address>
                        </div>
                  </div>
                  <div class="row">
                            <address>
                            <strong>Attention</strong><br> 
                            <?php echo $value['FullName'];?><br> 
                            <?php if($value['designation']<>NULL):?><?php echo $value['designation'];?><br><?php endif;?> 
                             <?php if($value['department']<>NULL):?><?php echo $value['department'];?><br><?php endif;?>
                             <?php if($value['mobile']<>NULL):?>Mobile 1 :<?php echo $value['mobile'];?><br><?php endif;?>
                             <?php if($value['mobile2']<>NULL):?>Mobile 2 :<?php echo $value['mobile2'];?><br><?php endif;?>
                             <?php if($value['telephone']<>NULL):?>Telephone:<?php echo $value['extension'].$value['telephone'];?><br><?php endif;?>
                             <?php if($value['email']<>NULL):?>Email :<?php echo $value['email'];?><br><?php endif;?>
                            </address>
                 </div> 
                 <div class="m-h-50"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table border="1" style="width: 100%;">
                                    <thead>
                                        <tr><th>Product Name</th>
                                        <th>Price</th>
                                        <th>Origin</th>
                                        <th>Tariff Code</th>
                                    </tr></thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $value['item_name'];?></td>
                                            <td><?php echo $value['original_price'];?></td>
                                            <td><?php echo $value['cname'];?></td>
                                            <td><?php echo $value['tariff_code'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                   <div class="m-h-50"></div>
                    <div class="row">
                        <h5><strong>Payment Terms :&nbsp;&nbsp;</strong><?php echo $value['terms'];?></h5>
                        <h5><strong>Note :&nbsp;&nbsp;</strong><?php echo $value['note'];?></h5>
                    </div>
                 <?php endforeach;?> 
            </div>
       </div>
    </body>
</html>


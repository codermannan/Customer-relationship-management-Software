<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title"><?php echo date('d-m-Y h:m:s',  time());?></li>
                            <?php //$menu = $this->crud_model->getMenu(); foreach ($menu as $value):?>
                            <li>
                                <a href="<?php echo base_url();?>index.php?admin/dashboard" class="waves-effect"><i class="ti-home"></i> <span> Dashboard</span> </a>
                            </li>
                            <?php //endforeach;?>
                           <li>
                                <a href="<?php echo base_url();?>index.php?admin/manage_company" class="waves-effect"><i class="ti-paint-bucket"></i><span> Companies </span> </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php?admin/manage_people" class="waves-effect"><i class="ti-user"></i><span> People </span> </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php?admin/manage_quotation" class="waves-effect"><i class="ti-pencil-alt"></i><span> Quotations </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-pencil-alt2"></i> <span> Orders </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url();?>index.php?admin/manage_orders">Place Order</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?admin/manage_orders/list">Order List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="ti-user"></i><span> Customers </span> </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="ti-pencil-alt"></i><span> Commissions </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-user"></i> <span> Products </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url();?>index.php?admin/product_management">Products</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?admin/category_management">Product Categories</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="icon-settings"></i> <span> Settings </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url();?>index.php?setting/currency_management">Currencies</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/sku_management">Product SKU</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/incoterm_management">Incoterm</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/pterms_management">Payment Terms</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/ports_management">PORTS</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/city_management">Cities</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/freight_management">Freight</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?setting/transport_management">Transport</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-user"></i> <span> Users </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url();?>index.php?user/user_management">User Accounts Setup</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?user/menu">Menu Setup</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?user/access">Access Setup</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-pencil-alt"></i> <span> Expense Memo </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url();?>index.php?admin/expense_management">Create Expense Memo</a></li>
                                    <li><a href="<?php echo base_url();?>index.php?admin/expense_management/list">Expense Memo List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="ti-pencil-alt"></i><span> Reports </span> </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="ti-pencil-alt"></i><span> Templates </span> </a>
                            </li>
                           
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="text-muted menu-title"><?php echo date('d-m-Y h:m:s',  time());?></li>
                            <?php 
                                $menu = $this->crud_model->getMenu(); 
                                foreach ($menu as $value):
                                    $smenu = $this->crud_model->getSubmenu($value['menu_id']);
                                    if($value['sub_menu']==0):
                            ?>
                            <li>
                                <a href="<?php if($value['menu_id']==$smenu[0]['sub_menu']):echo '#';else: echo base_url().'index.php?'.$value['menu_file'];endif;?>" class="waves-effect"><i class="<?php echo $value['css_class'];?>"></i> <span><?php echo $value['menu_name'];?></span> </a>
                                 <?php
                                         if($value['menu_id']==$smenu[0]['sub_menu']):    
                                 ?>
                                        <ul class="list-unstyled">
                                            <?php foreach ($smenu as $sval): ?>
                                            <li><a href="<?php echo base_url();?>index.php?<?php echo $sval['menu_file'];?>"><?php echo $sval['menu_name'];?></a></li>
                                            <?php endforeach;?>
                                        </ul>
                                        <?php endif;?>
                            </li>
                            <?php 
                                    endif;
                                endforeach;
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/detect.js"></script>
        <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url();?>assets/js/waves.js"></script>
        <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>


        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>


        <?php
		//////////LOADING SYSTEM SETTINGS FOR ALL PAGES AND ACCOUNTS/////////
		
		$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
		$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
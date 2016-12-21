<?php
$system_name = $this->db->get_where('settings',array('type'=>'system_name'))->row()->description;
$system_title= $this->db->get_where('settings',array('type'=>'system_title'))->row()->description;
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Business Management Software">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon_1.ico">

    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/plugins/bootstrapvalidator/src/css/bootstrapValidator.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
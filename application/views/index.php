
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if ( function_exists( 'date_default_timezone_set' ) )
date_default_timezone_set('Asia/Dhaka');
?>
<html>
	<?php include 'header.php';?>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
                <?php include 'topbar.php';?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'navigation.php';?>
			<!-- Left Sidebar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
            <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                            <div class="container">
                                <?php include $this->session->userdata('login_type').'/'.$page_name.'.php';?>
                            </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    <ul class="nav">
                        <li class="profile img">
                            <img class="img-circle onlineu" alt="user-img" src="<?php echo base_url();?>assets/images/users/avatar-1.jpg"></img>
                            <img class="img-circle onlineu" alt="user-img" src="<?php echo base_url();?>assets/images/users/avatar-2.jpg"></img>
                            <img class="img-circle onlineu" alt="user-img" src="<?php echo base_url();?>assets/images/users/avatar-3.jpg"></img>
                            <img class="img-circle onlineu" alt="user-img" src="<?php echo base_url();?>assets/images/users/avatar-4.jpg"></img>
                            <img class="img-circle onlineu" alt="user-img" src="<?php echo base_url();?>assets/images/users/avatar-5.jpg"></img>
                        </li>
                    </ul>
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <?php include 'rightnavigation.php';?>
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->
        <?php include 'footer.php';?>
	
	</body>
</html>
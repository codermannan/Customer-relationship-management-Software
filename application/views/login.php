<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A Datastate Solutions' Product">
  <meta name="author" content="coder.mannan">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">
  <?php include 'includes.php';?>
  <title><?php echo get_phrase('login');?> | <?php echo $system_title;?></title>
</head>

<body>
    <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Sign In to <strong class="text-custom">T.M International</strong> </h3>
            </div>
            <div class="panel-body">
            <?php echo form_open('login',array('class'=>'form-horizontal m-t-20'));?>   
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="username" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <?php echo form_close();?> 
            </div>   
            </div>   
        </div>   
    	<script>
            var resizefunc = [];
        </script>

</body>
</html>

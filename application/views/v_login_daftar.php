<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <style>
  div{
	  border-radius: 7px;
  }
	.account-wall
	{
		margin-top: 20px;
		padding: 40px 0px 20px 0px;
		background-color: rgba(247, 247, 247, 0.8); //#f7f7f7
		-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	}
	.form-signin
	{
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
	}
	.form-signin .form-signin-heading, .form-signin .checkbox
	{
		margin-bottom: 10px;
	}
	.form-signin .checkbox
	{
		font-weight: normal;
		background-color: rgba(247, 247, 247, 0.7);
	}
	.form-signin .form-control
	{
		position: relative;
		font-size: 16px;
		height: auto;
		padding: 10px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.form-signin .form-control:focus
	{
		z-index: 2;
	}
	.form-signin input[type="text"]
	{
		margin-bottom: -1px;
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
		background-color: rgba(247, 247, 247, 0.7);
	}
	.form-signin input[type="password"]
	{
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		background-color: rgba(247, 247, 247, 0.7);
	}
	.profile-img
	{
		width: 96px;
		height: 96px;
		margin: 0 auto 10px;
		display: block;
		-moz-border-radius: 50%;
		-webkit-border-radius: 50%;
		border-radius: 50%;
	}
	
	body {
	  background-image: url("<?php echo base_url();?>assets/dist/img/grouping.jpeg");
	  background-color: rgba(204, 204, 204,0.8);
	  min-height: 400px;
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	  position: relative;
	}
  </style>
</head>
<body class="skin-purple-light">
 <!-- <div class="wrapper">-->
	
  <!--<header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"></span><b>SCOP</b>
    </a>
    <nav class="navbar navbar-static-top" >
      <div style="text-align:center;">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div  style="padding-top: 15px;"><b>SMART COOPERATIVE ORIENTED PROBLEMS</b></div>
		
      </div>
    </nav>
  </header>-->
  
   <!-- <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="">
          <a href="<?php //echo base_url(); ?>">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
		<li class="">
          <a href="<?php// echo base_url(); ?>login">
            <i class="fa fa-key"></i> <span>Login</span>
          </a>
        </li>
		<li class="active">
          <a href="<?php// echo base_url(); ?>login/daftar">
            <i class="fa fa-sign-in"></i> <span>Daftar</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>-->

   <!-- <div class="content-wrapper">-->
    
    <!-- Main content -->
	 <!-- <section class="content" >-->
	<section>
		<div class="register-box">  
			<div class="account-wall"><h5 class="login-box-msg"><b>Silahkan daftar terlebih dahulu</b></h5>
				<form action="<?php echo base_url('login/aksi_daftar'); ?>" method="post" class="form-signin">
				  <div class="form-group has-feedback">
					<input type="text" name="user_nim" class="form-control" placeholder="NIM">
					<span class="fa fa-cog form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="text" name="user_fullname" class="form-control" placeholder="Full name">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<div class="input-group">
						<select class="form-control select2" name="user_semester" style="background-color: rgba(247, 247, 247, 0.7);">
						<option>-- Pilih Semester --</option>
						<?php 
							for($x=1; $x<=10; $x++){
								echo "<option value=\"$x\">$x</option>";
							}
						?>
						</select>
						<div class="input-group-addon" style="background-color: rgba(247, 247, 247, 0.7);">
						  <i class="fa fa-clock-o"></i>
						</div>
					</div>
				  </div>
				  <div class="form-group has-feedback">
					<input type="email" name="user_email" class="form-control" placeholder="Email" style="background-color: rgba(247, 247, 247, 0.7);">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" name="user_password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" name="user_password2" class="form-control" placeholder="Retype password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<button type="submit" class="btn btn-lg btn-primary btn-block btn-flat">Daftar</button>
				  </div>
				</form>
			</div>
		</div>
    </section>
	
   <!-- </div>
  <footer class="main-footer"  style="text-align:center;">
    <div class="pull-right hidden-xs">
    </div>
    <strong><small>Copyright &copy; 2019</small></strong> 
  </footer>
</div>-->

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
</body>
</html>
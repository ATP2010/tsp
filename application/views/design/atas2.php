<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>IT Desk Control</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="icon" href="<?php echo base_url();?>assets/dist/img/favicon.ico" type="image/gif">
		<!-- Bootstrap 3.3.4 -->
		<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
		<!-- FontAwesome 4.3.0 -->
		<link href="<?php echo base_url();?>assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    
		<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
		<!-- Ionicons 2.0.0 -->
		<link href="<?php echo base_url();?>assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
		<!-- <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />     -->

		<link href="<?=base_url('assets/dist/css/style.css');?>" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<!-- AdminLTE Skins. Choose a skin from the css/skins 
			folder instead of downloading all of them to reduce the load. -->
		<link href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		<!-- iCheck -->
		<link href="<?php echo base_url();?>assets/plugins/iCheck/flat/red.css" rel="stylesheet" type="text/css" />
		<!-- Morris chart -->
		<link href="<?php echo base_url();?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
		<!-- jvectormap -->
		<link href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
		<!-- Date Picker -->
		<link href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
		<!-- Daterange picker -->
		<link href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
		<!-- bootstrap wysihtml5 - text editor -->
		<link href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery 2.1.4 -->
		<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap 3.3.2 JS -->
		<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<!-- Slimscroll -->
		<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<!-- FastClick -->
		<script src='<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js'></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url();?>assets/dist/js/app.min.js" type="text/javascript"></script>    
		<!-- Date picker JS -->
		<script src='<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js'></script>
		  
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url();?>assets/dist/js/demo.js" type="text/javascript"></script>
		<!-- export table to excel-->
		<script src="<?php echo base_url();?>assets/plugins/exportexcel/jquery.btechco.excelexport.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/exportexcel/jquery.base64.js"></script>
		<!-- <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery.table2excel.js"></script> -->
		<!-- <script src="<?php echo base_url();?>assets/plugins/jQuery/tombol_export.js"></script> -->
		  

		
	</head>

	<body class="skin-red sidebar-mini">
	<div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IT</b>DC</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>IT</b> DeskControl</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
      
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image" />
                    <p><?php echo $this->session->userdata('nama');?>
                      <br><?php echo $this->session->userdata('jabatan');?>
                    </p>
                  </li>
                  <!-- Menu Body -->
               
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url()?>awal/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
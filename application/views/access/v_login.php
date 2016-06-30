<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>IT DESK CONTROL</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/dist/css/style.css');?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=base_url('assets/plugins/iCheck/square/blue.css');?>" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
      function cekform()
      {
        if (!$("#userid").val())
        {
          alert ('Userid masih kosong')
          $("#userid").focus();
          return false;
        }
        if (!$("#password").val())
        {
          alert ('Password masih kosong')
          $("#password").focus();
          return false;
        }
      }
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="bgform">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url();?>"><b>IT</b> Desk</a>
      <br/>
        <small>Manage Problem</small>
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <p class="login-box-msg">Please input user and password</p>
        <form action="<?=base_url('awal/login');?>" method="post" onsubmit="return cekform();">
          <div class="form-group has-feedback">
              <input type="text" name="userid" 
                     class="form-control" placeholder="Userid" id="userid">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" 
                     class="form-control" placeholder="Password" id="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <?php
            $info = $this->session->flashdata('info');
            if (!empty($info)) {
              echo $info;
            }
          ?>
          <div class="row">
            <div class="col-xs-8">    
              
            </div><!-- /.col -->
          </div>
          <div class="row">
              <div class="col-xs-12">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
              </div><!-- /.col -->
          </div>
        
        <a href="" onclick="alert('Hubungi Divisi IT !');">Lupa Password?</a><br>
        <div class="social-auth-links text-center">
          <p><b>ATP &copy; 2016</b></p>

          <!-- <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-refresh"></i> Info !</h4>
                    Wajib menggunakan Chrome / Firefox
                  </div> -->

        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->
      
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/plugins/iCheck/icheck.min.js');?>" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
  
</html>


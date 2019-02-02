<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Missies.id | Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('./assets');?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('./assets');?>/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url('.');?>"><b>Missies</b>.id</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="username">
          <span class="glyphicon glyphicon-user form-control-feedback" required></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" value="loginValidation" name="loginValidation" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url('./assets');?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url('./assets');?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

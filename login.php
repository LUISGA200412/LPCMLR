<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Liga Picapiedras CMLR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>

div.margen {
  margin-top:5px;
}
h2{
	text-align:center;
}
</style>

</head>
<body class="hold-transition login-page">
<div class="login-box margen">
  <h2>
    <a href="index1.php"><b>Liga Picapiedras CMLR</b></a>
  </h2>
  <!-- /.login-logo -->
  <div class="login-box-body"> 
    <p class="login-box-msg">Ingrese Los Datos Para Iniciar la Sección </p>

    <form action="AdministraEntrada.php" method="post">
       
	  <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Cédula Identidad" min="1" max="9999999999" required name="cedula">
        <span class="glyphicon fa  fa-credit-card form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" required name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="Password" class="form-control" placeholder="Password" required name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">
 
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block pull-center   ">Sign In</button>

  		</div>
 
 
        <!-- /.col -->
      </div>
    </form>
          <p></p>
          <a href="CambiaPassword.php" class="text-center">
          <button type="submit" class="btn btn-danger btn-block ">Olvidastes tu Password</button></a>
   		  <p></p>
    	  <a href="register.php" class="text-center">    
		  <button type="submit" class="btn btn-primary btn-block ">Registrate como nuevo Miembro</button></a> 
<!--
    <div class="social-auth-links text-center">
      <p>- O -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
-->    
    <!-- /.social-auth-links -->

    <!--<a href="#">Olvide mi Password</a><br> -->

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
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

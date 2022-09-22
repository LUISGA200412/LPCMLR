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
    <a href="index.php"><b>Liga Picapiedras CMLR</b></a>
  </h2>
  <!-- /.login-logo -->
  <div class="login-box-body"> 
    <p class="login-box-msg">Ingrese Los Datos</p>
 
    <form method="post">


	  <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Cédula Identidad" min="1" max="9999999999" required name="cedula">
        <span class="glyphicon fa  fa-credit-card form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" required name="customer_email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

   <!--   <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre" required name="customer_name">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
  -->    
      <div class="row" >
 
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="send" class="btn btn-success btn-block pull-left   ">Enviar mensaje</button>
      <br><br>

  		</div>
  
      </div>

    <?php
   
             //  print_r($_GET);

    if (isset($_POST['send'])){
        
        $header     = $_POST['customer_email'];
        //$from_name  = $_POST['customer_name'];
        $cedula 	= $_POST['cedula'];

 		  include("conexion.php");
		
  		 
		$sql = "SELECT count(*) as EXISTE FROM jugadores_lpcmlr where 
		ced_jugador = '$cedula' and correo_jugador = '$header'  ";
		$result=mysqli_query($mysqli,$sql);
		while($mostrar=mysqli_fetch_array($result))
		{ 
			$EXISTE = $mostrar['EXISTE'];
		}

		if (empty($EXISTE)) {
			/*echo "<script> alert('Correo $header / $cedula Invalido o NO EXISTEN');
			location.href ='CambiaPassword.php';
			</script>";*/
			echo "<strong>  
			 Cédula $cedula o Email $header NO EXISTEN  </strong>";
		}
		else
		{	
		  $d=mt_rand(123456,999999);

		  $sql1="UPDATE `jugadores_lpcmlr` SET `password`= $d WHERE ced_jugador = '$cedula' ";

				if ($mysqli->query($sql1) === FALSE) 
				{
			
			  	echo "Error: " . $sql1 . "<br>" . $mysqli->error;
				}
				else
				{
					/*echo  "<p style='color:red;font-size:20px'><b>Su Nuevo Password es ==> $d</b></p>";
*/
				echo "<script> alert('Su Nuevo Password es ==> $d');
					location.href ='index.php';
					</script>"; 
					
/*
					echo "<script>alert( 
					<p style='color:red;font-size:20px'><b>Su Nuevo Password es ==> $d</b>);
					location.href ='index.php';
					</script>";*/
				}
  		}
  	}
    ?>
    </form>
      <h5>
    	<a href="index.php"><b>	Regresar al Menu Anterior</b></a>
  		</h5>
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

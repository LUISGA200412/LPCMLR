<!DOCTYPE html> 
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<style>

table.logotipo {
  margin-left:250px;
  width: 700px; 
}

</style>
  <link rel="stylesheet" href="dist/css/skins/skin-white.css">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
<?php
		include("barradenavegacion.php");
?>
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
  	<div class="content-wrapper">
    	<section class="content">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

  <?php 
//print_r($_POST);
//print_r($_GET);

    $CEDULA 	=	$_GET["cedula"];
//    $PERFIL 	=	$_GET["perfil"];
    $NOMBRE 	=	utf8_encode($_POST["nombre"]);
    $NAC 		=	$_POST["nacionalidad"];
    $FECHANAC  	=	$_POST["fechanac"];
    $DIRECCION 	=	$_POST["direccion"];
    $TELEFONO 	=	$_POST["telefono"];
    $CORREO 	=	$_POST["correo"];
    $PASSWORD 	=	$_POST["password"];
   
    include ("conexion.php");

    $sql="UPDATE jugadores_lpcmlr set

    ced_jugador		  = '$CEDULA', 
    nombre_jugador    = '$NOMBRE', 
    nacionalidad	  = '$NAC', 
    fecha_nac		  = '$FECHANAC', 
    direccion         = '$DIRECCION', 
    telefono_jugador  = '$TELEFONO',
    correo_jugador    = '$CORREO',
    password 		  = '$PASSWORD'
                                                     
    where ced_jugador = $CEDULA ";

    if (mysqli_query($mysqli, $sql)) 
    {
//    	if ($PERFIL == 1) 
//    	{
/*	     	echo "<br><br><br><br><br><br>";
	        echo "<center style='color:#e77b16'><h1>El Registro ha sido Modificado</h1>";   
	        echo "<center style='color:#e77b16'>";

	        echo "<form
	        	   action='PerfilAdministrador.php'>";
	                 
	                echo "<input 
	                type='submit'
	                value='Regresar al Menu Anterior'>";
	                echo "<input 
	                type='hidden'
	                value='1'
	                name='perfil'>";
	                echo "<input 
	                type='hidden' 
	                value='$CEDULA'
	                name='cedula'>";
	                echo "</form>";*/
//		}
//		else
//		{
			echo "<br><br><br><br><br><br>";
	        echo "<center style='color:#e77b16'><h1>El Registro ha sido Modificado</h1>";   
	        echo "<center style='color:#e77b16'>";

	        echo "<form
	        	   action='PerfilJugador.php'>";
	                echo "<input 
	                type='submit'
	                value='Regresar al Menu Anterior'>";
	                echo "<input 
	                type='hidden'
	                value='1'
	                name='perfil'>";
	                echo "<input 
	                type='hidden' 
	                value='$CEDULA'
	                name='cedula'>";
	                echo "</form>";		
//	    }	                
	}
	else
	{
    	echo "Error updating record: ".mysqli_error($mysqli);
	}
	
?>


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

    	</section>
  	</div>
</div>
  <!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="fvbowling.net">Federación Venezolana de Bowling</a>.</strong> All rights reserved.
  </footer>
  
<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>
</html>

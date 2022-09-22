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
  <link rel="stylesheet" href="css/admin.css">


</head>
 
<body>
<div >

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 

<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
 

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 


<?php
  /*           
	$cedula    = $_GET['cedula'];
	$nombre  = $_GET['nombre'];*/
 

include ("conexion.php");

$sql1 = "SELECT idtorneo,status_torneo FROM `torneo` order by idtorneo DESC LIMIT 1";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
			$idtorneo = $rows1['idtorneo'];			
			$statustorneo = $rows1['status_torneo'];	
			$idtorneo++;
		}

if ($statustorneo == 2 ) 
{

echo
"<script>
	location.href ='AbrirTorneo.php';
</script>"; 
} 
else
{
	echo "<center style='color:#e77b16'>";
	echo "<h2>
		    <a href='PerfilAdministrador.php' method='GET'><b>Liga Picapiedras CMLR</b><br>
		    Modúlo de Administradores<br>
		    Regresar al Menu Anterior</a>

		  
 <br><br>

 NO SE PUEDE GENERAR UN NUEVO TORNEO HASTA QUE SE CIERRE EL TORNEO ACTUAL</h2>";

}			       


  ?>

<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

  
<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->
 
</div>

<!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

 

</body>
</html>
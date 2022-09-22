<!DOCTYPE html> 
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 

</head>
 
<body >
<div >

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
  	<div >
    	<section  >

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
	        	   action='ActalizaJugadoresAdministrador.php'>";
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

<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>

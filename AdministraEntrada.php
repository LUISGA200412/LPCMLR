<!DOCTYPE html> 
<html> 
<head>
</head>
<body class="layout-boxed skin-green">
<!-- desde aqui se ponenlos codigos -->
	<div style="color:red;font-size:20px; ">
 <?php 

include ("conexion.php"); 

//print_r($_POST);

$email     = $_POST['email'];
$cedula    = $_POST['cedula'];
$password   = $_POST['password'];

$existe=0;


$sql="SELECT count(*) as EXISTE FROM jugadores_lpcmlr WHERE 
	ced_jugador = $cedula ";
 	$result=mysqli_query($mysqli,$sql);
	while($mostrar=mysqli_fetch_array($result))
 	{
 		$existe = $mostrar['EXISTE'];
 	}	

//echo $existe;

if ( $existe == 0)
{
	echo "<script>	alert('Jugador/a no existe');							
					location.href='login.php';	
				  </script>";		
}
else
{	
	$existe=0;
	$sql1="SELECT count(*) as EXISTE1 FROM jugadores_lpcmlr WHERE 
	correo_jugador = '$email' and ced_jugador = $cedula and password = '$password'   ";
 	$result1=mysqli_query($mysqli,$sql1);
	while($mostrar1=mysqli_fetch_array($result1))
 	{
 		$existe = $mostrar1['EXISTE1'];
 	}
	
	if ( $existe == 0)
	{
		echo "<script>	alert('Correo no es Valido');	
					location.href='login.php';	
				  </script>";		
	}


	$sql="SELECT * FROM jugadores_lpcmlr WHERE 
	correo_jugador = '$email' and ced_jugador = '$cedula'  ";
 	$result=mysqli_query($mysqli,$sql);
	while($mostrar=mysqli_fetch_array($result))
 	{
 		$nombre = $mostrar['nombre_jugador'];
  		$cedula = $mostrar['ced_jugador'];
		$foto 	= $mostrar['fotojugador'];
 	}	
		
	if (!empty($cedula) )
	{
  		if ( $cedula== 3718104 or $cedula== 6109860 or 
  			 $cedula== 9435845 or $cedula== 9062327 )
  		{	
			echo "<script>								
					location.href='lockscreen.php?cedula=$cedula&password=$password';	
				  </script>";				  
  		}
  		else
  		{
    		echo "<script>								
					location.href='PerfilJugador.php?cedula=$cedula';
				  </script>";
  		}		
	}
	else
	{
		echo "<script>
		alert('Verifica tu Email y Password');
            location.href ='login.php';
            </script>"; 
 	}	

}
 
?>   
</body>
</html>

  <?php 
// print_r($_POST);

  
$cedula = $_POST["cedula"];
$nombre = strtoupper($_POST["nombre"]); 
$sexo = $_POST["sexo"];
$email  = $_POST["email"];

$password = $_POST["pass1"];

$fec=date('Y-m-d');

  

 
include("conexion.php");

  

		$TOT = 0;
		$sql = "SELECT count(*) as hay FROM jugadores_lpcmlr
		 where ced_jugador = $cedula ";
		$result=mysqli_query($mysqli,$sql); 
		while($mostrar=mysqli_fetch_array($result))
		{   
		 	$TOT =  $mostrar['hay'];
		}


if ( $TOT > 0 ) 
{
echo 
    "<script>
    alert(
    'JUGADOR YA EXISTE');
    location.href = 'register.php';
            </script>"; 
}
else 
{ 
	
	$sql = " INSERT INTO `jugadores_lpcmlr`
	(`identidad`, 
	`idclub`, 
	`idcategoria`, 
	`idsubcategoria`, 
	`ced_jugador`, 
	`nombre_jugador`, 
	`sexo`, 
	`fecha_nac`, 
	`nacionalidad`, 
	`direccion`, 
	`numcarnet`, 
	`fecha_categoria_desde`, 
	`fecha_categoria_hasta`, 
	`fecha_inscripcion_fvb`, 
	`correo_jugador`, 
	`telefono_jugador`, 
	`profesion`, 
	`estudios`, 
	`destresas`, 
	`notas`, 
	`password`, 
	`cupo`, 
	`idstatus`, 
	`fotojugador`) 
	VALUES (
	'5',
	'4',
	'3',
	'1',
	'$cedula',
	'$nombre',
	'$sexo',
	'$fec',
	'1',
	'',
	'1',
	'$fec',
	'$fec',
	'$fec',
	'$email',
	'0',
	'',
	'',
	'',
	'',
	'$password',
	'0',
	'1',
	'')
	   		";

	if ($mysqli->query($sql) === TRUE) 
	{
		 
  	   echo 
    		"<script>
    			alert(' EL JUGADOR/A HA SIDO INCLUIDO .....  Hemos enviado un correo a la direccion $email para que active su cuenta.... gracias');
    			location.href ='register.php';
            </script>"; 
 	} 
	else 
	{
  		echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
	 		   
} 	

	
?>
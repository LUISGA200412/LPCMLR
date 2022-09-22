<!DOCTYPE html> 
<html>  
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


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
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
  	<div class="content-wrapper">
    	<section class="content">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 


<?php 
include("conexion.php");

/*
print_r($_POST["cedula"]);
echo "<br>";
print_r($_POST["nombre"]);
echo "<br>";
print_r($_POST["fechacarga"]);
echo "<br>";
print_r($_POST["lineajugada"]);
echo "<br>";
*/




$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$fechacarga = $_POST["fechacarga"];
$lineajugada = $_POST["lineajugada"];


 
 $categoria   = $_POST["categoria"];
 $subcategoria   = $_POST["subcategoria"];
 $torneo   = $_POST["torneo"];
 $pais		=$_POST["pais"];
 $ciudad	=$_POST["ciudad"];    
 $bolera	=$_POST["bolera"]; 
 $numlineasfec  = $_POST["numlineas"];
  $sexo  = $_POST["sexo"];



$i=0;
foreach ($lineajugada as $key ) 
{
   
     $score   = $key;
     $i++;

     if (empty($score) )
     {
     	$linea[$i] = 0;
     	$score   = 0;
     }
     else
     {
 		$linea[$i] = $key;
     }
    
  //echo "<br> $score $i $linea[$i]";
 }

 		$li=0;
	 	for ($j=1; $j < $numlineasfec+1; $j++) 
	 	{ 

			echo "<br> lineas de $linea[$j] $j";

	 
				$score   = $linea[$j];
 
 				$li++;
 				 
				$sql = "INSERT INTO `lineas`(`idpais`, `idciudad`, `idbolera`, `idtorneo`, `idcategoria`, `idsubcategoria`, `ced_jugador`, `sexo`, `idlineas`, `score`, `num_cancha`, `fecha_linea`, `final`, `idequipo`)
 		 		VALUES 
 		 		(
		 		 	'$pais',
		 		 	'$ciudad',
		 		 	'$bolera',
					'$torneo',
		 		 	'$categoria',
		 		 	'$subcategoria',
					'$cedula',
					'$sexo',
					'$li',
					'$linea[$j]',
		 		 	'0',
		 		 	'$fechacarga',
		 		 	'0',
		 		 	'1'
		 		 )
					";

				if ($mysqli->query($sql) === FALSE) 
				{			
			  		echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
		}




echo "<script>
alert(
	'Lineas del Jugador $nombre Cargadas Safisfactoriamente');
	location.href ='CargarLineasIndividual.php';
	</script>";

//	window.history.back();



?>

</body>
</html>
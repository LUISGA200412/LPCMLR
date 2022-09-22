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
//$jugadas = $_POST["jugadas"];
$fechacarga = $_POST["fechacarga"];
$lineajugada = $_POST["lineajugada"];


 
 $categoria   = $_POST["categoria"];
 $subcategoria   = $_POST["subcategoria"];
 $torneo   = $_POST["torneo"];
 $pais		=$_POST["pais"];
 $ciudad	=$_POST["ciudad"];    
 $bolera	=$_POST["bolera"]; 
 $idequipo  = $_POST["equipo"];
 $numlineasfec  = $_POST["numlineas"];


 foreach ($cedula as $key ) {
     $ced[] = $key;
 }
 
 foreach ($nombre as $key ) {
     $nom[] = $key;
 }
 
 //foreach ($jugadas as $key ) {
 //    $jug[] = $key;
// }

 //foreach ($fechasjugada as $key ) {
 //    $fecjug[] = $key;
 // }

$i=0;
 foreach ($lineajugada as $key ) {
   
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

//$fec = date('Y/m/d');
//echo $fec;

$desde=0; 
for ($i=0; $i < 2; $i++) { 
//echo "<br> $ced[$i] $nom[$i] $jug[$i]  $fecjug[]";

//	$sql1 = " delete from lineas where 
//	ced_jugador = $ced[$i] and idtorneo = $torneo";

//	$resultado1 = $mysqli->query($sql1);
	$desde++;

	if ($desde == 1) 
	{
		$j=0;$rr=0;$rr1=0;$rr2=0;$rr3=0;
		$sql1 = "SELECT * FROM jugadores_lpcmlr where ced_jugador =  $ced[$i]  ";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
			$sexo = $rows1['sexo'];
		}


	 	$li = 0;
	 	$rr =  $numlineasfec;
	 	$rr1 =  $rr + 1;

	 	for ($j=1; $j < $rr1; $j++) 
	 	{ 

			//echo "<br> lineas de $nom[$i] $linea[$j] $j";

			//if (!empty($linea[$j]) )
			//{
				$score   = $linea[$j];
 
 				$li++;
 				 
				//if ($li > $numlineasfec) {
				//	$li = 0;
				//	 break;

				$sql = "INSERT INTO `lineas`(`idpais`, `idciudad`, `idbolera`, `idtorneo`, `idcategoria`, `idsubcategoria`, `ced_jugador`, `sexo`, `idlineas`, `score`, `num_cancha`, `fecha_linea`, `final`, `idequipo`,`tipo_torneo`)
 		 		VALUES 
 		 		(
		 		 	'$pais',
		 		 	'$ciudad',
		 		 	'$bolera',
					'$torneo',
		 		 	'$categoria',
		 		 	'$subcategoria',
					'$ced[$i]',
					'$sexo',
					'$li',
					'$linea[$j]',
		 		 	'0',
		 		 	'$fechacarga',
		 		 	'0',
		 		 	'$idequipo',
		 		 	'2'
		 		 )
					";

				if ($mysqli->query($sql) === FALSE) 
				{
			
			  	echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
			//}
		}
	}

	if ($desde == 2) 
	{
 		$j=0;$rr=0;$rr1=0;$rr2=0;$rr3=0;
		$sql1 = "SELECT * FROM jugadores_lpcmlr where ced_jugador =  $ced[$i]  ";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
			$sexo = $rows1['sexo'];
		}


	 	$li = 0;
	 	$rr1 = $numlineasfec;
	 	$rr1 = $rr1 + 1;
	 	//echo "<br> $rr1";
	 	$rr2 = $numlineasfec * 2 ;
	 	$rr3 = $rr2 + 1;
 	 	//echo "<br> $rr3";
	 	for ($j=$rr1; $j < $rr3; $j++) 
	 	{ 
		//echo "<br> lineas de $nom[$i] $linea[$j] $j ";

			//if (!empty($linea[$j]) )
			//{
				$score   = $linea[$j];
 
 				$li++;
 				
				//if ($li > $numlineasfec) {
				//	$li = 0;
				//	 break;
				// } 

				$sql = "INSERT INTO `lineas`(`idpais`, `idciudad`, `idbolera`, `idtorneo`, `idcategoria`, `idsubcategoria`, `ced_jugador`, `sexo`, `idlineas`, `score`, `num_cancha`, `fecha_linea`, `final`, `idequipo`,`tipo_torneo`)
 		 		VALUES 
 		 		(
		 		 	'$pais',
		 		 	'$ciudad',
		 		 	'$bolera',
					'$torneo',
		 		 	'$categoria',
		 		 	'$subcategoria',
					'$ced[$i]',
					'$sexo',
					'$li',
					'$linea[$j]',
		 		 	'0',
		 		 	'$fechacarga',
		 		 	'0',
		 		 	'$idequipo',
		 		 	'2'
		 		 )
					";

				if ($mysqli->query($sql) === FALSE) 
				{
			
			  	echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
			//}
		}
	}
}

echo "<script>
alert(
	'Lineas de los Jugadores $nom[0] y $nom[1] Cargadas Safisfactoriamente');
	location.href ='CargarLineasParejas.php';
	</script>";

//	window.history.back();



?>

</body>
</html>
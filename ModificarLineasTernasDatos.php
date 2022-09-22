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

 
/*print_r($_POST["cedula"]);
echo "<br>";
print_r($_POST["nombre"]);
echo "<br>";
print_r($_POST["jugadas"]);
echo "<br>";
print_r($_POST["lineajugada"]);
echo "<br>";*/
 

$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$jugadas = $_POST["jugadas"];
$fechasjugada = $_POST["fechas"];
$lineajugada = $_POST["lineajugada"];

$fec = $fechasjugada;

$categoria   = $_POST["categoria"];
$subcategoria   = $_POST["subcategoria"];
$torneo   = $_POST["torneo"];
$pais		=$_POST["pais"];
$ciudad	=$_POST["ciudad"];    
$bolera	=$_POST["bolera"]; 
$idequipo  = $_POST["equipo"];
$numlineasfec = $_POST["numlineas"];

 foreach ($cedula as $key ) {
     $ced[] = $key;
 }
 
 foreach ($nombre as $key ) {
     $nom[] = $key;
 }
 
 foreach ($jugadas as $key ) {
     $jug[] = $key;
 }

 
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
    
   //echo "<br> $score $i";
 }


$sql11 = "SELECT count(*) as jugada FROM lineas where idequipo = $idequipo  and idtorneo = $torneo and fecha_linea = '$fec' group by ced_jugador LIMIT 1  ";
$result11=mysqli_query($mysqli,$sql11); 
while($mostrar11=mysqli_fetch_array($result11))
{
	$numlineasfec = $mostrar11['jugada'];
}

//echo "numero de lineas $numlineasfec";

$desde=0;$i=0;
for ($i=0; $i < 3; $i++) { 
//echo "<br> $ced[$i] $nom[$i] $jug[$i]  $fechasjugada <br>";

//	$sql1 = " delete from lineas where 
//	ced_jugador = $ced[$i] and idtorneo = $torneo";


	$desde++;

	if ($desde == 1) 
	{
		$j=0;$rr=0;$rr1=0;$rr2=0;$rr3=0;
	 	$li = 0;
	 	//$rr =  $numlineasfec;
	 	$rr1 =  $numlineasfec + 1;

	 	for ($j=1; $j < $rr1; $j++) 
	 	{
 			//if (!empty($linea[$j]) )
			//{

				$score   = $linea[$j];
  				
  				$li++;

  				//if ($li > $numlineasfec) {
				//	$li = 0;
				//	 break;
				//}
			
	//echo "<br> se actualiza al jugador $ced[$i] equipo $idequipo torneo = $torneo linea $li score $linea[$j] fecha $fec numero lineas=$numlineasfec<br>";

				$sql = "UPDATE lineas SET 
						score = $score
				        where ced_jugador = $ced[$i] 
   				        and idtorneo = $torneo
				        and idequipo = $idequipo 
				        and idlineas = $li 
				        and fecha_linea = '$fec' ";

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
	 	$li = 0;
	 	$rr1 = $numlineasfec;
	 	$rr1 = $rr1 + 1;
	 	//echo "<br> $rr1";
	 	$rr2 = $numlineasfec * 2 ;
	 	$rr3 = $rr2 + 1;
 	 	//echo "<br> $rr3";
	 	for ($j=$rr1; $j < $rr3; $j++) 
	 	{

 			//if (!empty($linea[$j]) )
			//{
 			
				$score   = $linea[$j];
 				$li++;
				
				//if ($li > $numlineasfec) {
				//	$li = 0;
				//	 break;
				//}

				$sql = "UPDATE lineas SET 
						score = $score
				        where ced_jugador = $ced[$i]
   				        and idtorneo = $torneo	         
				        and idequipo = $idequipo 
				        and idlineas = $li 
				        and fecha_linea = '$fec' ";

				if ($mysqli->query($sql) === FALSE) 
				{
			
			  	echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
			//}
		}
	}
	
	if ($desde == 3) 
	{
		$j=0;$rr=0;$rr1=0;$rr2=0;$rr3=0;
	 	$li = 0;
	 	$rr = ($numlineasfec * 2);
	 	$rr1 = $rr + 1;
	 	$rr2 = ($numlineasfec * 3);
	 	$rr3 = $rr2 + 1;
	 	for ($j=$rr1; $j < $rr3; $j++) 
	 	{  


			//if (!empty($linea[$j]) )
			//{
				$score   = $linea[$j];
 				$li++;

				//if ($li > $numlineasfec) {
				//	$li = 0;
				//	 break;
				//}

				$sql = "UPDATE lineas SET 
						score = $score
				        where ced_jugador = $ced[$i] 
   				        and idtorneo = $torneo
   				        and idequipo = $idequipo 
				        and idlineas = $li 
				        and fecha_linea = '$fec' ";

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
	'Lineas de los Jugadores $nom[0],$nom[1] y $nom[2] Cargadas Safisfactoriamente');
	location.href ='ModificarLineasTernas.php';
	</script>";

//	window.history.back();



?>

</body>
</html>
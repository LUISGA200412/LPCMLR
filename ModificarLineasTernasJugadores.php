<!DOCTYPE html> 
<html> 
<head>   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Liga Picapiedras CMLR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<style>

body { 
  background-color: #ecf0f5;
}

</style>
</head>

<body >

<div align="center">
 
<?php

include("conexion.php");


	$idequipo   = $_POST["cequipo"];
	$fechalinea = $_POST["cfecha"];	


$sql = "SELECT * FROM equipo 
		where idequipo = $idequipo   ";
$result=mysqli_query($mysqli,$sql); 
while($mostrar=mysqli_fetch_array($result))
{
	$nombreequipo = $mostrar['nombre_equipo'];
}

$jug=0;
$sql = "SELECT count(*) as jugada FROM lineas where idequipo = $idequipo and fecha_linea='$fechalinea'  ";
$result=mysqli_query($mysqli,$sql); 
while($mostrar=mysqli_fetch_array($result))
{
	$jug = $mostrar['jugada'];
}

//echo "$jug $fechacarga";

if ($jug == 0) 
{
echo "<script>
alert(
	'Equipo NO tiene lineas Cargadas para la fecha $fechalinea dirijase al Modulo Cargar Lineas');
	location.href ='PerfilAdministrador.php';
	</script>";
}


/*
	$cod            = $_POST["CODIGO"];
	$unmail         = explode(".", $cod); 
	$cedula       = $unmail[0];
	$nomjugador   = $unmail[1];
	$categoria   = $unmail[2];
	$scategoria   = $unmail[3];
	$torneo   = $unmail[4];
	$tipo   = $unmail[5];
	$idequipo  = $unmail[6];

	$torneo   = $_POST["torneo"];
	$pais		=$_POST["pais"];
	$ciudad	=$_POST["ciudad"];    
	$bolera	=$_POST["bolera"]; 
*/
		include("conexion.php");




		$sql1a = "SELECT count(*) as NTORNEOS,min(idcategoria) AS MINCAT,max(idcategoria) AS MAXCAT,min(idsubcategoria) AS MINSCAT,max(idsubcategoria) AS MAXSCAT FROM torneo where status_torneo = 1 order by idtorneo 
			DESC LIMIT 1";
		$resultado1a = $mysqli->query($sql1a);
		while($rows1a = $resultado1a->fetch_assoc())
		{
			if ($rows1a['NTORNEOS'] > 1) 
			{
				$sql1b = "SELECT min(idcategoria) AS MINCAT,max(idcategoria) AS MAXCAT,min(idsubcategoria) AS MINSCAT,max(idsubcategoria) AS MAXSCAT FROM torneo where status_torneo = 1";
				$resultado1b = $mysqli->query($sql1b);
				while($rows1b = $resultado1b->fetch_assoc())
				{
					
				$desdecategoria=$rows1b['MINCAT'];
				$hastacategoria=$rows1b['MAXCAT'];
				$desdesubcategoria=$rows1b['MINSCAT'];
				$hastasubcategoria=$rows1b['MAXSCAT'];
				}
			}
			else
			{
					$desdecategoria=$rows1a['MINCAT'];
					$hastacategoria=$rows1a['MAXCAT'];
					$desdesubcategoria=$rows1a['MINSCAT'];
					$hastasubcategoria=$rows1a['MAXSCAT'];
			}				
		}

 

		if ($desdecategoria == 7) {
			$rangodcat = 1;
			$rangohcat = 6;
		} else {
			$rangodcat = $desdecategoria;
			$rangohcat = $hastacategoria;
		}

		if ($desdesubcategoria == 7) {
			$rangodsub = 1;
			$rangohsub = 6;
		} else {
			$rangodsub = $desdesubcategoria;
			$rangohsub = $hastasubcategoria;
		}	
 
				
					



		$sql1 = "SELECT * FROM torneo where status_torneo = 1 order by idtorneo 
			DESC LIMIT 1";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
		$idtorneo = $rows1['idtorneo'];
		$numlineasfecha = $rows1['num_linea_fecha'];	
		$idpais = $rows1['idpais'];	
		$idciudad = $rows1['idciudad'];	
		$idbolera = $rows1['idbolera'];	
		$nomtorneo = $rows1['nombre_torneo'];	
		$idcategoria = $rows1['idcategoria'];	
		$idsubcategoria = $rows1['idsubcategoria'];
		$fecdesde = date_create($rows1['fecha_torneo_desde']);
		$fechasta = date_create($rows1['fecha_torneo_hasta']);
		}

		$fecd = date_format($fecdesde,"d/m/Y");
		$fech = date_format($fechasta,"d/m/Y");
		$sql11 = "SELECT * FROM categorias where 
		idcategoria = $idcategoria";
		$resultado11 = $mysqli->query($sql11);
		while($rows11 = $resultado11->fetch_assoc())
		{
			$nomcategoria = $rows11['nombre_categoria'];	
		}


		if ($idsubcategoria == 7) {
			$nomsubcategoria ="TODAS";
		}
		else
		{
			$sqlz = "SELECT * FROM subcategorias where idcategoria=$idcategoria AND idsubcategoria = $idsubcategoria";

				$resultz=mysqli_query($mysqli,$sqlz); 
				while($mostrarz=mysqli_fetch_array($resultz))
				{                  
					$nomsubcategoria = $mostrarz['nombre_subcategoria'];    
				}
		}		


		$sql13 = "SELECT * FROM bolera where 
		idbolera = $idbolera and idpais = $idpais and idciudad = $idciudad";
		$resultado13 = $mysqli->query($sql13);
		while($rows13 = $resultado13->fetch_assoc())
		{
		$nombolera = $rows13['nombre_bolera'];	
		}		
  ?>

    

            <p style="color:red;font-size:15px;">
            	<?php
            	echo "Se Modifican las líneas del Torneo";
            	?>
            </p>       
            <p style="color:blue;font-size:16px;">
            	<?php
            	  	echo $nomtorneo;
            	?>
            </p>       
			
			<p style="color:red;  font-size:12px;">
            	<?php
            	echo "Realizado en la Bolera ".$nombolera."<br>";
            	echo "desde el ".$fecd." Hasta el ".$fech;
            	?>
            </p> 
 
<div>                             
<a>
	<h2>
    <?php
	
	$f = date_create($fechalinea);
    $ff = date_format($f,'d/m/Y');

    echo "Se Modificaran las lines del Equipo $nombreequipo Efectuadas el día $ff";
    ?>
	</h2>
</a>
</div>

<form action="ModificarLineasTernasDatos.php" method="POST"> 	


<?php
   
$jug = array(); 
 

$sql11 = "SELECT count(*) as jugada FROM lineas where idequipo = $idequipo  and fecha_linea = '$fechalinea' GROUP by ced_jugador  ";


$result11=mysqli_query($mysqli,$sql11); 
while($mostrar11=mysqli_fetch_array($result11))
{
	$jug[] = $mostrar11['jugada'];
 
}

if (is_null($jug) ) {
	$cuantas = 0;
}
else
{
$cuantas = count($jug);
}

$sql1 = "SELECT * FROM equipojugadores where 
 			idequipo = $idequipo 
			order by ced_jugador  ";
       
$result1=mysqli_query($mysqli,$sql1); 
while($mostrar1=mysqli_fetch_array($result1))
{
	$ced[] = $mostrar1['ced_jugador'];
	$nom[] = $mostrar1['nombre_jugador'];
}
 
$iq=0;
for ($iq=0; $iq < 3 ; $iq++) 
{ 

	$cedula = $ced[$iq];
	$nombre = $nom[$iq];
	if ($cuantas > 0) 
	{
		$jugada = $jug[$iq];
		//$jugadafecha = $fecha_linea[$iq]; 	 
 	 
	} 
	else
	{
		$jugada=0;
	}


echo "<input type='hidden' name='cedula[]' 
value='$cedula'>"; 
echo "<input type='hidden' name='nombre[]' 
value='$nombre'>";
echo "<input type='hidden' name='jugadas[]' 
value='$jugada'>";
echo "<input type='hidden' name='fechas' 
value='$fechalinea'>";

	$snombre = utf8_encode($nombre);
	
	echo"<h4 style='color:green;'>       
	     Del Jugador $snombre   
	     </h3>";   
 
  	$i=0;$lineasjugadas=0;$ww=0;$ww1=0;		
	$sqlq = "SELECT * FROM lineas where 
      		ced_jugador = $cedula  and 
      		idequipo = $idequipo and 
      		fecha_linea = '$fechalinea'
			order by idlineas ";

    $resultq=mysqli_query($mysqli,$sqlq); 
	while($mostrarq=mysqli_fetch_array($resultq))
    {
    	$lineasjugadas++;
    	$categoria =$mostrarq['idcategoria'];
    	$scategoria =$mostrarq['idsubcategoria'];
        		
    	$score[$lineasjugadas] =$mostrarq['score'];
    	$cancha[$lineasjugadas] =$mostrarq['num_cancha'];
    	$fecha[$lineasjugadas] =$mostrarq['fecha_linea'];
    }

 
 

///print_r($l);
//echo "<br>";
//print_r($ll);
if ($lineasjugadas==0) 
{
  $ww=0;
  for ($i=1; $i < $numlineasfecha+1; $i++) 
  {       				


 	if ($i < $numlineasfecha+1) 
    {
    	$ww1 = $i;
    }
   	else
   	{
   		$ww1 = $i;	
    }

if ($i > $numlineasfecha) 
{
	echo "&nbsp&nbsp Línea$ww1   		 
   		   	<input type='number'  min='0' max='300' name='lineajugada[]' value='' readonly>";
}
else
{
		echo "&nbsp&nbsp Línea$ww1   		 
   		   	<input type='number'  min='0' max='300' name='lineajugada[]' value='' >";
}


/*	echo "&nbsp&nbsp Línea$ww1   		 
   		   	<input type='number'  min='0' max='300' name='lineajugada[]' >";
   		// max='300' name='linea$ww1'  >";
   		echo "Cancha<input type='number' class='hola' size='2' min='1' max='50' name='cancha$ww1'>"; */
   		$ww1++;
  } // termina for
}
else
{
	$ww=0; 
	for ($i=1; $i <$lineasjugadas+1; $i++) 
    {        				
 
  	  
  	  if ($i < $numlineasfecha+1) 
      {
      	$ww1 = $i;
      }
      else
      {
      	$ww1 = $i;	
      }





	$xx=$score[$i];
	$xy=$cancha[$i];
 	
 	echo "&nbsp&nbspLínea $ww1
   	<input type='number'  min='0' max='300' name='lineajugada[]' value='$xx'>";
   	
   	/*echo "Cancha<input type='number' class='hola' min='1' max='50' name='cancha$ww1' value='$xy'>";*/
    $ww++;

    } // termina el for
    
    if ($lineasjugadas < $numlineasfecha+1 )
    {
    	$j=0;
  		for ($i=1; $i <$numlineasfecha+1-$lineasjugadas; $i++)
		{ 
			if ($i==1) 
    		{
 		        $ww=0;
          	}

			$j= $lineasjugadas + $i;
			if ($j < $numlineasfecha+1) 
			{
             	$ww1 = $j;
		    }
		    else
		   	{
		   		$ww1 = $j;	
		    }

if ($j > $numlineasfecha) 
{
	echo "&nbsp&nbspLínea $ww1   		 
   		   	<input type='number'  min='0' max='300' name='lineajugada[]' value='' readonly>";
}
else
{
		echo "&nbsp&nbspLínea $ww1
		<input type='number' min='0' max='300'
		name='lineajugada[]' >";
}


 
	   	$ww++;
    	} // termina el for	
    }				
}

}   


?>
 
<br><br>
        <div class="form-group" >
          <button type="submit"  class="btn btn-danger">Modificar</button>
        </div>


<input type="hidden" name="torneo" value="<?php echo
$idtorneo; ?> "> 
<input type="hidden" name="pais" value="<?php echo $idpais; ?> "> 
<input type="hidden" name="ciudad" value="<?php echo 
$idciudad; ?> "> 
<input type="hidden" name="bolera" value="<?php echo 
$idbolera; ?> "> 
<input type="hidden" name="categoria" value="<?php echo 
$idcategoria; ?> ">
<input type="hidden" name="subcategoria" value="<?php echo$idsubcategoria; ?> "> 
<input type="hidden" name="equipo" value="<?php echo $idequipo; ?> "> 
<input type="hidden" name="numlineas" value="<?php echo $numlineasfecha; ?> ">
</form>

<div>
  <h2>
    <a href="ModificarLineasTernas.php"> 
    Regresar al Menu Anterior</a>
  </h2>
</div>



</div>

 
 

</body>
</html>

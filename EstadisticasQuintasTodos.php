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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<link rel="stylesheet" href="css/misestilos.css">
<link rel="stylesheet" href="css/acordeon.css">

 

<style>
td.oro{
	background:gold;
}
td.plata{
	background:silver;
}
td.bronce{
	background:#CD7F32;
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
 <span class="ir-arriba fa  fa-arrow-up"></span>
 
  	<div class="content-wrapper">
    	<section class="content">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 
<?php 


include("conexion.php");

$cod    = $_POST["TORNEO"];
$unmail = explode(".", $cod); 
$idtorneo = $unmail[0];
$nomtorneo = $unmail[1];
$idbolera = $unmail[2];
$idciudad = $unmail[3];
$fecdesde = date_create($unmail[4]);
$fechasta = date_create($unmail[5]);	
$tipotorneo = $unmail[6];	

	$fecd = date_format($fecdesde,"d/m/Y");
	$fech = date_format($fechasta,"d/m/Y");

$sql="SELECT * from bolera where idciudad = $idciudad  
and idbolera = $idbolera ";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
  $nombrebolera = $mostrar['nombre_bolera'];
}


$sql1 = "SELECT * FROM torneo where idtorneo = $idtorneo ";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
		$idtorneo = $rows1['idtorneo'];	
		$idpais = $rows1['idpais'];	
		$idciudad = $rows1['idciudad'];	
		$idbolera = $rows1['idbolera'];	
		$nomtorneo = $rows1['nombre_torneo'];	
		$idcategoria = $rows1['idcategoria'];	
		$idsubcategoria = $rows1['idsubcategoria'];
		$fecdesde = date_create($rows1['fecha_torneo_desde']);
		$fechasta = date_create($rows1['fecha_torneo_hasta']);
		}


$sql="select sum(score) as TOTAL,idequipo from `lineas` where score > 0 and idtorneo = $idtorneo and tipo_torneo = 5 group by idequipo order by sum(score) DESC";
		
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
  $TOTAL = $mostrar['TOTAL']; 
}
//echo "adskjhfjghf $TOTAL";

if (empty($TOTAL)) {
	echo "<script> alert('No Hay Informacion para el Torneo ==> $nomtorneo');
		location.href ='index.php';
		</script>";
} 

?>



<table class="table table-bordered table-condensed table-striped">
<caption class="text-center">
	<h3> 
		<strong><font color="black"><?php echo $nomtorneo; ?></font> 
		</strong> 
	</h3>
	<h4> 
		<strong><font color="black"><?php echo " Efectuado en la Bolera de/el : $nombrebolera"; ?></font> 
		</strong> 
	</h4>
	<h5> 
		<strong><font color="black"><?php echo " Desde el : $fecd Hasta el : $fech"; ?></font></strong> 
	</h5>
	 
	<strong><font color="black">Resultado Quintas</font></strong><br>

   <tr>
    <th>&nbsp;</th>
    <th class="hidden-xs text-center">Jugador</th>
   <th class="hidden-xs text-center"></th>
    
	    <th class="hidden-xs text-center">L1</th>
        <th class="hidden-xs text-center">L2</th>
        <th class="hidden-xs text-center">L3</th>
        <th class="hidden-xs text-center">L4</th>
        <th class="hidden-xs text-center">L5</th>
        <th class="hidden-xs text-center">L6</th>
        <th class="hidden-xs text-center">L7</th>
        <th class="hidden-xs text-center">L8</th>
        <th class="hidden-xs text-center">L9</th>
        <th class="hidden-xs text-center">L10</th>
        <th class="hidden-xs text-center">L11</th>
        <th class="hidden-xs text-center">L12</th>
        <th class="hidden-xs text-center">L13</th>
        <th class="hidden-xs text-center">L14</th>
        <th class="hidden-xs text-center">L15</th>
        <th class="hidden-xs text-center">L16</th>
        <th class="hidden-xs text-center">L17</th>
        <th class="hidden-xs text-center">L18</th>
        <th class="hidden-xs text-center">L19</th>
        <th class="hidden-xs text-center">L20</th>

        

        <th class="text-center">Total</th>
    	<th class="text-center">Promedio</th>
		<tr><td colspan="14"></td></tr>
  </tr>

<?php

/*$sqlW="SELECT count(*) as CUANTOSHAY FROM `equipo` WHERE tipo_torneo = 3";
$resultW=mysqli_query($mysqli,$sqlW);
while($mostrarW=mysqli_fetch_array($resultW))
{ 
	$TOTALDEEQUIPOS 	= $mostrarW['CUANTOSHAY']; 
}	
*/
//echo "<br> $TOTALDEEQUIPOS <br>";

$j=0;$suma=0;$jugadas=0;$swequipo=0;$totlineas=0;$s=0;
		 		$totlineasjugador=0;
$parejas = array();
$par = array();
$sumapar = array();
//for ($i=1; $i < $TOTALDEEQUIPOS+1; $i++) 
//{
	$parejas = array();
	$par = array();
	$sumapar = array();
//		echo "<br> $i <br>";
		$sql="select sum(score) as TOTAL,idequipo from `lineas` where score > 0 and idtorneo = $idtorneo and tipo_torneo = 5 group by idequipo order by sum(score) DESC";
		
		$result=mysqli_query($mysqli,$sql);
		while($mostrar=mysqli_fetch_array($result))
		{ 
				$parejas = array();
	$par = array();
	$sumapar = array();

			$TOTAL 		= $mostrar['TOTAL']; 
			$EQUIPO 	= $mostrar['idequipo'];
//		echo "<br> $EQUIPO <br>";	

/*			$sql1="select * from equipo where 
			idequipo = $EQUIPO and tipo_torneo = 3";
	 		$result1=mysqli_query($mysqli,$sql1);
			while($mostrar1=mysqli_fetch_array($result1))
			{ 
				$NOMBREEQUIPO	= $mostrar1['nombre_equipo']; 
//				echo "<br> $NOMBREEQUIPO <br>";
			}
*/
			$NOMBREEQUIPO	= 'Total Equipo';

	 

			$sqlq="select * from `lineas` where  idequipo = $EQUIPO and idtorneo = $idtorneo and tipo_torneo = 5 group by ced_jugador";

			$resultq=mysqli_query($mysqli,$sqlq);
			while($mostrarq=mysqli_fetch_array($resultq))
			{ 
				$CEDULA	= $mostrarq['ced_jugador'];
				//$NOMBRE	= $mostrarq['nombre_jugador'];

				$sql11="SELECT * FROM jugadores_lpcmlr WHERE ced_jugador = $CEDULA";
	 			$result11=mysqli_query($mysqli,$sql11);
				while($mostrar11=mysqli_fetch_array($result11))
				{
				$NOMBRE	= $mostrar11['nombre_jugador'];
				}

				array_push($par, "$TOTAL", "$EQUIPO", "$NOMBREEQUIPO", 
				"$CEDULA", "$NOMBRE");
			} 
		//}

//echo "<br> imprimo el par ";
//print_r($par);
//echo "<br> =============== ";
		$s = count($par);
		if ($s==0) {
			exit();
		}
//print_r($par);
		$promedioequipo= $par[0];
		$idequipo= $par[1];
		$nombrequipo= $par[2];
		$cedula1= $par[3];
		$nombrejugador1= $par[4];
		$cedula2= $par[8];
		$nombrejugador2= $par[9];
		$cedula3= $par[13];
		$nombrejugador3= $par[14];
		$cedula4= $par[18];
		$nombrejugador4= $par[19];
		$cedula4= $par[23];
		$nombrejugador4= $par[24];		
	 

		array_push($parejas, "$promedioequipo", 
			"$idequipo", "$nombrequipo", 
			"$cedula1", "$nombrejugador1", 
			"$cedula2", "$nombrejugador2", 
			"$cedula3", "$nombrejugador3", 
			"$cedula4", "$nombrejugador4", 
			"$cedula5", "$nombrejugador5");


	
	$s = count($parejas);
	if ($s==0) {
		exit();
	}
//	print_r($parejas);	

	foreach ($parejas as $key => $value) 
	{
		$todos[] = $value;		
	}
		$cedu[1] = $todos[3];
		$nomb[1] = $todos[4];
		$cedu[2] = $todos[5];
		$nomb[2] = $todos[6];
		$cedu[3] = $todos[7];
		$nomb[3] = $todos[8];
		$cedu[4] = $todos[9];
		$nomb[4] = $todos[10];		
		$cedu[5] = $todos[11];
		$nomb[5] = $todos[12];	

	$j = $j + 1;

	$sumapar = array();

	for ($ix=1; $ix < 6; $ix++) 
	{ 
		
//		echo "<br>  cedula $cedu[$ix] <br>";
//		echo "<br>  nombre $nomb[$ix] <br>";
	
		echo "<tr>";

			$sql111="SELECT * FROM jugadores_lpcmlr WHERE 
			ced_jugador = $cedu[$ix]";
			$result111=mysqli_query($mysqli,$sql111);
			while($mostrar111=mysqli_fetch_array($result111))
			{
				$codid=$mostrar111['identidad'];
			}
			$sql112="SELECT * FROM entidades WHERE 
			identidad =$codid";
			$result112=mysqli_query($mysqli,$sql112);
			while($mostrar112=mysqli_fetch_array($result112))
			{
			  $nombrecorto=$mostrar112['nombre_corto'];
			  $escudo=$mostrar112['escudo'];
			}
//	score > 0 and
			$sql1="SELECT * FROM lineas WHERE 
		 ced_jugador=$cedu[$ix] and idequipo > 0 and idtorneo = $idtorneo and tipo_torneo = 5 order by fecha_linea, idlineas";
		$result1=mysqli_query($mysqli,$sql1);
		while($mostrar1=mysqli_fetch_array($result1))
		{ 
			$score 	= $mostrar1['score'];
			
			$jugadas++;
			if ($jugadas==1) 
			{
				if ($j ==1) 
				{
					echo "<td style='vertical-align:middle;' class='oro'>$j</td>
						 <td style='vertical-align:middle'>$nomb[$ix]</td>
						 <td align='center'></td>";	
				}
				if ($j ==2) 
				{
					echo "<td style='vertical-align:middle;' class='plata'>$j</td>
						 <td style='vertical-align:middle'>$nomb[$ix]</td>
						 <td align='center'></td>";	
					
				}
				if ($j ==3) 
				{
					echo "<td style='vertical-align:middle;' class='bronce'>$j</td>
						 <td style='vertical-align:middle'>$nomb[$ix]</td>
						 <td align='center'></td>";	
					
				}
				if ($j >3) 
				{
					echo "<td style='vertical-align:middle;'>$j</td>
						 <td style='vertical-align:middle'>$nomb[$ix]</td>
						 <td align='center'></td>";	
					
				}
									
					
			}

			$suma = $suma +	$score;

			if ($score > 0 ) 
			{
		 		$totlineas++;
		 		$totlineasjugador++;

			}
	 
			
			echo "<td style='vertical-align:middle' align='center'>$score</td>";
		}		

		if ($jugadas < 20) 
		{
			$poner = 20 - $jugadas;
			for ($ii=0; $ii < $poner; $ii++) 
			{ 
				echo "<td align='center'></td>";
			}
			echo "<td align='center'>$suma</td>";
			
			//echo "<br suma > $suma  jugadas > $jugadas";

			if ($suma > 0) {
				//$projuga = $suma / $jugadas;
				$projuga = $suma / $totlineasjugador;

				echo "<td align='center'>";
				echo number_format((float)$projuga, 5, ',', '');
			}
			else
			{
				echo "<td align='center'>";
				
			}
			 
			echo "</td>";
			
		}
//		echo "jugadas $jugadas";
if ($jugadas ==20) 
		{
		
			echo "<td align='center'>$suma</td>";

			//$projuga = $suma / 20;
			if ($totlineasjugador>0) {
				$projuga = $suma / $totlineasjugador;
			}
			else
			{
				$projuga = 0;
			}
			
			echo "<td align='center'>";
			echo number_format((float)$projuga, 5, ',', ''); 
			echo "</td>";
			
		}
		

		$jugadas=0;$suma=0;$totlineasjugador=0;
		echo "</tr>";

	}
	

	$sqlp="SELECT sum(score) as sumapar FROM `lineas` WHERE score > 0 and `idequipo` = $idequipo and idtorneo = $idtorneo and tipo_torneo = 5 group by fecha_linea, idlineas";
	$resultp=mysqli_query($mysqli,$sqlp);
	while($mostrarp=mysqli_fetch_array($resultp))
	{ 
		$sumapar[] 	= $mostrarp['sumapar'];
	}
 
	$spar = count($sumapar);
 
	$totalequipo=0;
	echo "<td align='center'></td>";
	echo "<th class='hidden-xs text-center'>$nombrequipo</th>";
	echo "<th class='hidden-xs text-center'></th>";
		//echo "<th class='hidden-xs text-center'>$nombrecorto</th>";

			$poner = 20 - $spar;
 
 			for ($iiq=0; $iiq < $spar; $iiq++) 
			{ 
				$totall= $sumapar[$iiq];

 				$totalequipo = $totalequipo + $sumapar[$iiq];

				echo "<th class='hidden-xs text-center'>$totall</th>";
			}

			if ($poner < 21) 
			{
				$poner1 = 21 - $spar;
				for ($ii=0; $ii <$poner1-1 ; $ii++) 
				{ 
					echo "<td align='center'></td>";
				}
			}


$promedio = $totalequipo / $totlineas ;			
echo "<td align='center' ><b>$totalequipo</b></td>";
echo "<td align='center' >";
		echo "<strong>";
		echo number_format((float)$promedio, 5,',','');
		echo "</strong>";
echo "</td>";


		echo "</tr>";
$suma=0;
$totlineas=0;
unset($parejas);
unset($todos);
unset($sumapar);
$totalequipo=0;


}
			
?>
</table>


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

    	</section>
  	</div>

 
  <!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

  <!-- Main Footer -->
<?php
include("Footer.php");
?>
  
<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
 
<script src="arriba.js"></script>

</body>
</html>
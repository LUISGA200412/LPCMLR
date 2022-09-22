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
table.logotipo {
  margin-left:250px;
  width: 700px; 
}
</style>

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
  
	<div class="content-wrapper">
		<section class="content">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

<span class="ir-arriba fa  fa-arrow-up"></span>

<?php

	include ("conexion.php");

//print_r($_POST);

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


$sw=0; 
$sql="select avg(score) as PROMEDIO, count(*) as LINEAS,
sum(score) as SUMATOTAL, `ced_jugador`, idequipo from `lineas` where  sexo = 2 and score > 0 and idtorneo = $idtorneo group by `ced_jugador` order by avg(score) DESC";

$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{ 

 $dd[] =$mostrar['ced_jugador']."-".$mostrar['SUMATOTAL']."-".$mostrar['LINEAS']."-".$mostrar['PROMEDIO']."-".$mostrar['idequipo'] ;
 $sw++;
}

if (empty($dd)) {
	echo "<script> alert('No Hay Informacion para el Torneo ==> $nomtorneo');
		location.href ='index.php';
		</script>";
}

$a=0;
foreach ($dd as $key  ) 
{
	$ss = $key;
	$unmail = explode("-", $key); 
	$cedula = $unmail[0];
	$suma = $unmail[1];
	$lineas = $unmail[2];
	$promedio = $unmail[3];
	$idequipo = $unmail[4];	

//echo "<br> $ss $cedula $suma $lineas $promedio 
//$idequipo <br>";

if ($lineas >15) {

 	$PROMEDIO[$a] = $promedio; 
	$LINEAS[$a] 	= $lineas; 
	$SUMATOTAL[$a] = $suma; 	
	$CEDULA[$a] 	= $cedula;
	$IDEQUIPO[$a] 	= $idequipo;	
	$a++;
}
else
{
	$PROMEDIOm[] = $promedio; 
	$LINEASm[] 	= $lineas; 
	$SUMATOTALm[] = $suma; 	
	$CEDULAm[] 	= $cedula;
	$IDEQUIPOm[] 	= $idequipo;	
}
}

$ii=count($CEDULAm);

for ($i=0; $i < $ii; $i++) 
{ 
		
	 $promedio= $PROMEDIOm[$i]; 
	 $lineas=$LINEASm[$i]; 
	 $suma=$SUMATOTALm[$i]; 	
	 $cedula=$CEDULAm[$i];
	 $idequipo=$IDEQUIPOm[$i];

//echo "<br> $i $cedula $lineas $suma $promedio 
//$idequipo <br>";

	$PROMEDIO[$a] = $promedio; 
	$LINEAS[$a] 	= $lineas; 
	$SUMATOTAL[$a] = $suma; 	
	$CEDULA[$a] 	= $cedula;
	$IDEQUIPO[$a] 	= $idequipo;

		$a++;
}

$ii=count($CEDULA);

//echo "<br>sfghgfhghghgh<< $ii";

for ($i=0; $i < $ii; $i++) { 
 	
	 $promedio= $PROMEDIO[$i]; 
	 $lineas=$LINEAS[$i]; 
	 $suma=$SUMATOTAL[$i]; 	
	 $cedula=$CEDULA[$i];
	 $idequipo=$IDEQUIPO[$i];



	$PROMEDIO[$a] = $promedio; 
	$LINEAS[$a] 	= $lineas; 
	$SUMATOTAL[$a] = $suma; 	
	$CEDULA[$a] 	= $cedula;
	$IDEQUIPO[$a] 	= $idequipo;

//echo "<br> $i $cedula $lineas $suma $promedio 
//$idequipo <br>";
}

$ii=count($CEDULA);
//echo "<br> $ii";

for ($i=0; $i < $ii; $i++) { 
 	
	 $promedio= $PROMEDIO[$i]; 
	 $lineas=$LINEAS[$i]; 
	 $suma=$SUMATOTAL[$i]; 	
	 $cedula=$CEDULA[$i];
 	 $idequipo=$IDEQUIPO[$i];



	$PROMEDIO[$a] = $promedio; 
	$LINEAS[$a] 	= $lineas; 
	$SUMATOTAL[$a] = $suma; 	
	$CEDULA[$a] 	= $cedula;
	$IDEQUIPO[$a] 	= $idequipo;

		 $a++;
//echo "<br> $i $cedula $lineas $suma $promedio  <br>";
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
	 
	<strong><font color="black">Individual Femenino</font></strong><br>
   <tr>
    <th>&nbsp;</th>
    
    <th align="center">JUGADOR</th>
    <!--<th align="center">Equipo</th>-->
    <th align="center"></th> 
    
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
		<tr><td colspan="24"></td></tr>
  </tr>
  
<?php
	
$j=0;
	for ($i=0; $i < $sw ; $i++) 
	{ 
		
		$promedio = $PROMEDIO[$i];
		$lineas = $LINEAS[$i];  
		$sumatotal = $SUMATOTAL[$i]; 
		$cedula = $CEDULA[$i];
		$idequipo = $IDEQUIPO[$i];

		$suma=0;$jugadas=0;$totlineas=0;

		//echo "<br> qwere $sw $i $idequipo ";
 
				$sql11="SELECT * FROM jugadores_lpcmlr WHERE 
				`ced_jugador`=$cedula and sexo=2";
	 			$result11=mysqli_query($mysqli,$sql11);
				while($mostrar11=mysqli_fetch_array($result11))
				{
					$nombrejugador=utf8_decode($mostrar11['nombre_jugador']);
					$codid=$mostrar11['identidad'];
					$foto=$mostrar11['fotojugador'];
					//$j = $j +1;
				}
/*				$sql111="SELECT * FROM entidades WHERE 
				identidad = 5";
				$result111=mysqli_query($mysqli,$sql111);
				while($mostrar111=mysqli_fetch_array($result111))
				{
					$nombrecorto
					=$mostrar111['nombre_corto'];
					$escudo
					=$mostrar111['escudo'];
				}
*/
/*
				$sql111="SELECT * FROM equipo WHERE 
				idequipo = $idequipo";
				$result111=mysqli_query($mysqli,$sql111);
				while($mostrar111=mysqli_fetch_array($result111))
				{
					$nombrecorto
					=$mostrar111['nombre_equipo'];
					//$escudo
					//=$mostrar111['escudo'];
				}
*/




		$sql1="SELECT * FROM `lineas` WHERE 
		`ced_jugador`=$cedula and sexo = 2 and 
		idtorneo = $idtorneo order by fecha_linea, idlineas";
		echo "<tr>";	

		$result1=mysqli_query($mysqli,$sql1);
		while($mostrar1=mysqli_fetch_array($result1))
		{ 

			$idequipo 	= $mostrar1['idequipo'];

			$score 	= $mostrar1['score'];

			$suma = $suma +	$score;

			if ($score > 0 ) 
			{
		 		$totlineas++;
			}


		//	$suma = $mostrar1['score'] + $suma;

			$jugadas++;
			if ($jugadas==1) 
			{
				
				$j++;

				if ($i ==0) {
					echo "
					<td  style='vertical-align:middle;' class='oro'>$j</td>
					<td width='25%' style='vertical-align:middle;'>
					$nombrejugador</td>";

					echo '<td align="center"> ' .
					     '<img width="50" height="50"  src = "data:image/png;base64,' . base64_encode($foto) . '" />'
					      . '</td>';

					//echo '<td align="center"> ' .
					 //    $nombrecorto . ' &nbsp;<img src = "data:image/png;base64,' . base64_encode($escudo) . '" />'
					  //    . '</td>';			
				}
				if ($i ==1) {
					echo "
					<td style='vertical-align:middle;' class='plata'>$j</td>
					<td style='vertical-align:middle;'>
					$nombrejugador</td>";
					echo '<td  align="center"> ' .
					     '<img width="50" height="50" src = "data:image/png;base64,' . base64_encode($foto) . '" />'
					      . '</td>';

				//	echo '<td align="center">' . $nombrecorto . ' &nbsp;<img src = "data:image/png;base64,' . base64_encode($escudo) . '" />'
					//      . '</td>';
				}

				if ($i ==2) {
					echo "
					<td style='vertical-align:middle;' class='bronce'>$j</td>
					<td style='vertical-align:middle;'>
					$nombrejugador</td>";
					echo '<td align="center"> ' .
					     '<img width="50" height="50" src = "data:image/png;base64,' .  base64_encode($foto) . '" />'
					      . '</td>';

					//echo '<td align="center">' .
					//      $nombrecorto . ' &nbsp;<img width="50" height="50" src = "data:image/png;base64,' . base64_encode($escudo) . '" />'
					//      . '</td>';
				}

				if ($i > 2) 
				{
					echo "
					<td style='vertical-align:middle;' align='center'>$j</td>
					<td style='vertical-align:middle;'>
					$nombrejugador</td>";
					echo '<td align="center"> ' .
					     '<img width="50" height="50" src = "data:image/png;base64,' . base64_encode($foto) . '" />'
					      . '</td>';
				}
			 
		 	}
			
		//	ECHO "<br> escribo linea $jugadas y $score y  ";
			echo "<td style='vertical-align:middle;' align='center'>";
			echo $score;
			
			echo "</td>";
		}		

			if ($jugadas < 20) 
			{
				$poner = 20 - $jugadas;
				for ($ii=0; $ii <$poner ; $ii++) 
				{ 
					echo "<td style='vertical-align:middle;' align='center'>&nbsp</td>";
				}
			}

if ($totlineas > 0) {
	//$promedio = $suma / $totlineas;
}
else
{
	//$promedio = 0;
}


				echo "
					
					<td align='center' style='vertical-align:middle;'>$sumatotal</td>";

					echo "<td align='center' style='vertical-align:middle;'>";
 echo number_format((float)$promedio, 2, ',', ''); 



					echo "</td>";
		      		
				
			echo "</tr>";	
			$jugadas=0;$suma=0;$totlineas=0;
		
	
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



<script src="acordeon.js"></script>
 
<script src="arriba.js"></script>


</body>
</html>
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

  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- iCheck 
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css"> -->

  <!-- Morris chart 
  <link rel="stylesheet" href="plugins/morris/morris.css">
  -->

  <!-- jvectormap 
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->

  <!-- Date Picker 
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> -->

  <!-- bootstrap wysihtml5 - text editor 
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
  
  
<link rel="stylesheet" href="css/misestilos.css">
<link rel="stylesheet" href="css/acordeon.css">

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
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

<table class="table table-bordered table-condensed table-striped">
   <tr>
    	<th class="text-center" colspan="7">
    		<h1> MEJORES SERIES MASCULINAS </h1> 
    	</th>
   </tr>
   <tr>
    	<th class="text-center">JUGADOR</th>
    	<th class="text-center"></th>  
		<th class="text-center">NOMBRE TORNEO</th>    	
		<th class="text-center">FECHA</th>    	
		<th class="text-center">LINEAS JUGADAS</th>	
    	<th class="text-center">SERIE</th>
		<th class="text-center">PROMEDIO</th>    	
   </tr>

<?php
include("conexion.php");

$j=0;$suma=0;$jugadas=0;$swequipo=0;$totlineas=0;$s=0;
$parejas = array();
$par = array();
$sumapar = array();
$sqlq="select avg(score) as PROMEDIO, count(*) as LINEAS,fecha_linea,idtorneo,sum(score) as SUMATOTAL, `ced_jugador`, idequipo from `lineas` where sexo = 1 and  score > 0 group by `ced_jugador`, fecha_linea order by avg(score) DESC  LIMIT 3";

$resultq=mysqli_query($mysqli,$sqlq);
while($mostrarq=mysqli_fetch_array($resultq))
{ 
	$CEDULA		= $mostrarq['ced_jugador'];
	$PROMEDIO 	= $mostrarq['PROMEDIO'];
	$LINEAS		= $mostrarq['LINEAS'];
	$FECHALINEA	= $mostrarq['fecha_linea'];
	$IDTORNEO	= $mostrarq['idtorneo'];	
	$TOTALPINES	= $mostrarq['SUMATOTAL'];
	$FECHALINEA = date("d/m/Y", strtotime($FECHALINEA));

	$sql11="SELECT * FROM jugadores_lpcmlr 
	WHERE ced_jugador = $CEDULA";
	$result11=mysqli_query($mysqli,$sql11);
	while($mostrar11=mysqli_fetch_array($result11))
	{
		$NOMBRE	= utf8_decode($mostrar11['nombre_jugador']);
	}

	$sql11="SELECT * FROM torneo 
	WHERE idtorneo = $IDTORNEO";
	$result11=mysqli_query($mysqli,$sql11);
	while($mostrar11=mysqli_fetch_array($result11))
	{
		$NOMBRETORNEO	= $mostrar11['nombre_torneo'];
	}

	array_push($par, 

	"$CEDULA", "$NOMBRE", "$PROMEDIO",
	"$LINEAS", "$FECHALINEA", "$NOMBRETORNEO",
	"$TOTALPINES");
} 
 
$cedula1= $par[0];
$nombrejugador1= $par[1];
$promedio1= $par[2];
$lineas1= $par[3];
$fechalinea1= $par[4];
$nombretorneo1= $par[5];
$totalpines1= $par[6];

$cedula2= $par[7];
$nombrejugador2= $par[8];
$promedio2= $par[9];
$lineas2= $par[10];
$fechalinea2= $par[11];
$nombretorneo2= $par[12];
$totalpines2= $par[13];

$cedula3= $par[14];
$nombrejugador3= $par[15];
$promedio3= $par[16];
$lineas3= $par[17];
$fechalinea3= $par[18];
$nombretorneo3= $par[19];
$totalpines3= $par[20];

array_push($parejas,  
	"$cedula1", "$nombrejugador1", "$promedio1",
	"$lineas1", "$fechalinea1", "$nombretorneo1",
	"$totalpines1",
	"$cedula2", "$nombrejugador2", "$promedio2",
	"$lineas2", "$fechalinea2", "$nombretorneo2",
	"$totalpines2",
	"$cedula3", "$nombrejugador3", "$promedio3",
	"$lineas3", "$fechalinea3", "$nombretorneo3",
	"$totalpines3");

//	print_r($par);	

foreach ($parejas as $key => $value) 
{ 
	$todos[] = $value;	
}
 
$cedula[1]			= $todos[0];
$nombrejugador[1]	= $todos[1];
$promedio[1]		= $todos[2];
$lineas[1]			= $todos[3];
$fechalinea[1]		= $todos[4];
$nombretorneo[1]	= $todos[5];
$totalpines[1]		= $todos[6];

$cedula[2]			= $todos[7];
$nombrejugador[2]	= $todos[8];
$promedio[2]		= $todos[9];
$lineas[2]			= $todos[10];
$fechalinea[2]		= $todos[11];
$nombretorneo[2]	= $todos[12];
$totalpines[2]		= $todos[13];

$cedula[3]			= $todos[14];
$nombrejugador[3]	= $todos[15];
$promedio[3]		= $todos[16];
$lineas[3]			= $todos[17];
$fechalinea[3]		= $todos[18];
$nombretorneo[3]	= $todos[19];
$totalpines[3]		= $todos[20];

$j = 1;



for ($ix=1; $ix < 4; $ix++) 
{ 

	$sql="SELECT * FROM jugadores_lpcmlr WHERE 
	ced_jugador = $cedula[$ix]";
	$result=mysqli_query($mysqli,$sql);
	while($mostrar=mysqli_fetch_array($result))
	{
		$foto =	$mostrar['fotojugador'];
	}	

	echo "<tr>";

		echo "<td width='20%'>
				$nombrejugador[$ix]
		</td>";

		echo '<td> ' .
		'<img width="50" height="50"  src = "data:image/png;base64,' . base64_encode($foto) . '" />'
					      . '
		</td>';

		echo "<td>
				$nombretorneo[$ix]
		</td>";			
		echo "<td align='center'>
				$fechalinea[$ix]
		</td>";	
		echo "<td align='center'>
				$lineas[$ix]
		</td>";				
		echo "<td align='center'>
				$totalpines[$ix]
		</td>";
		echo "<td align='center'>
				$promedio[$ix]
		</td>";		
	echo "</tr>";


}

?>

</table>
 
<!------------    FEMENINO   -------------------------->

<table class="table table-bordered table-condensed table-striped">
   <tr>
    	<th class="text-center" colspan="7">
    		<h1> MEJORES SERIES FEMENINA </h1> 
    	</th>
   </tr>
   <tr>
    	<th class="text-center">JUGADOR</th>
    	<th class="text-center"></th>  
		<th class="text-center">NOMBRE TORNEO</th>    	
		<th class="text-center">FECHA</th>    	
		<th class="text-center">LINEAS JUGADAS</th>	
    	<th class="text-center">SERIE</th>
		<th class="text-center">PROMEDIO</th>    	
   </tr>
<?php
include("conexion.php");
unset($par);
unset($parejas);
unset($todos);
unset($sumapar); 

$j=0;$suma=0;$jugadas=0;$swequipo=0;$totlineas=0;$s=0;
$parejas = array();
$par = array();
$sumapar = array();

$sqlq="select avg(score) as PROMEDIO, count(*) as LINEAS,fecha_linea,idtorneo,sum(score) as SUMATOTAL, `ced_jugador`, idequipo from `lineas` where sexo = 2 and  score > 0 group by `ced_jugador`, fecha_linea order by avg(score) DESC  LIMIT 3";

$resultq=mysqli_query($mysqli,$sqlq);
while($mostrarq=mysqli_fetch_array($resultq))
{ 
	$CEDULA		= $mostrarq['ced_jugador'];
	$PROMEDIO 	= $mostrarq['PROMEDIO'];
	$LINEAS		= $mostrarq['LINEAS'];
	$FECHALINEA	= $mostrarq['fecha_linea'];
	$IDTORNEO	= $mostrarq['idtorneo'];	
	$TOTALPINES	= $mostrarq['SUMATOTAL'];
	$FECHALINEA = date("d/m/Y", strtotime($FECHALINEA));

	$sql11="SELECT * FROM jugadores_lpcmlr 
	WHERE ced_jugador = $CEDULA";
	$result11=mysqli_query($mysqli,$sql11);
	while($mostrar11=mysqli_fetch_array($result11))
	{
		$NOMBRE	= utf8_decode($mostrar11['nombre_jugador']);
	}

	$sql11="SELECT * FROM torneo 
	WHERE idtorneo = $IDTORNEO";
	$result11=mysqli_query($mysqli,$sql11);
	while($mostrar11=mysqli_fetch_array($result11))
	{
		$NOMBRETORNEO	= $mostrar11['nombre_torneo'];
	}

	array_push($par, 

	"$CEDULA", "$NOMBRE", "$PROMEDIO",
	"$LINEAS", "$FECHALINEA", "$NOMBRETORNEO",
	"$TOTALPINES");
} 
 
$cedula1= $par[0];
$nombrejugador1= $par[1];
$promedio1= $par[2];
$lineas1= $par[3];
$fechalinea1= $par[4];
$nombretorneo1= $par[5];
$totalpines1= $par[6];

$cedula2= $par[7];
$nombrejugador2= $par[8];
$promedio2= $par[9];
$lineas2= $par[10];
$fechalinea2= $par[11];
$nombretorneo2= $par[12];
$totalpines2= $par[13];

$cedula3= $par[14];
$nombrejugador3= $par[15];
$promedio3= $par[16];
$lineas3= $par[17];
$fechalinea3= $par[18];
$nombretorneo3= $par[19];
$totalpines3= $par[20];

array_push($parejas,  
	"$cedula1", "$nombrejugador1", "$promedio1",
	"$lineas1", "$fechalinea1", "$nombretorneo1",
	"$totalpines1",
	"$cedula2", "$nombrejugador2", "$promedio2",
	"$lineas2", "$fechalinea2", "$nombretorneo2",
	"$totalpines2",
	"$cedula3", "$nombrejugador3", "$promedio3",
	"$lineas3", "$fechalinea3", "$nombretorneo3",
	"$totalpines3");

//	print_r($par);	

foreach ($parejas as $key => $value) 
{ 
	$todos[] = $value;	
}
 
$cedula[1]			= $todos[0];
$nombrejugador[1]	= $todos[1];
$promedio[1]		= $todos[2];
$lineas[1]			= $todos[3];
$fechalinea[1]		= $todos[4];
$nombretorneo[1]	= $todos[5];
$totalpines[1]		= $todos[6];

$cedula[2]			= $todos[7];
$nombrejugador[2]	= $todos[8];
$promedio[2]		= $todos[9];
$lineas[2]			= $todos[10];
$fechalinea[2]		= $todos[11];
$nombretorneo[2]	= $todos[12];
$totalpines[2]		= $todos[13];

$cedula[3]			= $todos[14];
$nombrejugador[3]	= $todos[15];
$promedio[3]		= $todos[16];
$lineas[3]			= $todos[17];
$fechalinea[3]		= $todos[18];
$nombretorneo[3]	= $todos[19];
$totalpines[3]		= $todos[20];

$j = 1;



for ($ix=1; $ix < 4; $ix++) 
{ 

	$sql="SELECT * FROM jugadores_lpcmlr WHERE 
	ced_jugador = $cedula[$ix]";
	$result=mysqli_query($mysqli,$sql);
	while($mostrar=mysqli_fetch_array($result))
	{
		$foto =	$mostrar['fotojugador'];
	}	

	echo "<tr>";

		echo "<td width='20%'>
				$nombrejugador[$ix]
		</td>";

		echo '<td> ' .
		'<img width="50" height="50"  src = "data:image/png;base64,' . base64_encode($foto) . '" />'
					      . '
		</td>';

		echo "<td>
				$nombretorneo[$ix]
		</td>";			
		echo "<td align='center'>
				$fechalinea[$ix]
		</td>";	
		echo "<td align='center'>
				$lineas[$ix]
		</td>";				
		echo "<td align='center'>
				$totalpines[$ix]
		</td>";
		echo "<td align='center'>
				$promedio[$ix]
		</td>";		
	echo "</tr>";


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
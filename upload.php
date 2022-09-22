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

<style>

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
		<section class="content-header">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 


<?php
		 $cedula=$_GET["cedula"];    
 		 $categorias=$_GET["categoria"];    
 		 $subcategorias=$_GET["subcategoria"]; 

include ("conexion.php");

	$sql1 = "SELECT * FROM torneo order by idtorneo DESC LIMIT 1";
	$resultado1 = $mysqli->query($sql1);
	while($rows1 = $resultado1->fetch_assoc())
	{
		$pais = $rows1['idpais'];
		$ciudad = $rows1['idciudad'];
		$bolera = $rows1['idbolera'];
		$torneo = $rows1['idtorneo'];
	}
	$sql2 = "SELECT * FROM jugadores_lpcmlr where ced_jugador = $cedula and idstatus = 1 ";
	$resultado2 = $mysqli->query($sql2);
	while($rows2 = $resultado2->fetch_assoc())
	{
		$categoria = $rows2['idcategoria'];
		$subcategoria = $rows2['idsubcategoria'];
	}
	
	        $dataTime = date("Y-m-d H:i:s");
        	
//echo $pais.$ciudad.$bolera.$torneo
//	.$categoria.$subcategoria.
//	$cedula.$dataTime; 

if(isset($_POST["submit"]))
{

	$js=0;
	$sqla = "SELECT count(*) as CONFACTURA FROM torneos_pagado where ced_jugador = $cedula";
    $resulta=mysqli_query($mysqli,$sqla); 
	while($mostrara=mysqli_fetch_array($resulta))
	{
		$confactura = $mostrara['CONFACTURA'];		
	}

	if ($confactura>0) 
	{
		//echo "existe ".$js." dfgf ".$confactura;
		echo "<div align='center'>
<h1  style='color:BLUE'>
	Bienvenidos al Modulo de Pago
</h1>
<h1  style='color:brown'>
	
Usted ya Cargo la Factura
	
</h1>
 ";

	} 
	else 
	{
	    $check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false)
	    {
	        $image = $_FILES['image']['tmp_name'];
	        $imgContent = addslashes(file_get_contents($image));

      //  echo "imagen ".$imgContent;

        

        //Insert image content into database

			$insert = $mysqli->query("INSERT INTO torneos_pagado(idpais, idciudad, idbolera,idtorneo, idcategoria, idsubcategoria, ced_jugador, fechapago, foto) 
			VALUES (
					'$pais',
					'$ciudad',
					'$bolera',
					'$torneo',
					'$categoria',
					'$subcategoria',
					'$cedula',
					'$dataTime',
					'$imgContent'
					)")	;

//        if($insert)
  //      {
			echo "<div align='center'> 
			<table >
				<tr>
				<td   align='center' >
			<h1  style='color:brown'>
					SU DOCUMENTO FUE CARGADO...... GRACIAS
	
			</h1>

				</td>
				</tr>

			</div>	
			    	";
    //    }
    //    else
     //   {
      //      echo "File upload failed, please try again.";
      //  }          
    	} //if del check
    	else
    	{
 //       echo "Please select an image file to upload.";
  //      		echo "existe ".$js." dfgf ".$confactura;
		echo "<div align='center'>
<h1  style='color:BLUE'>
	Bienvenidos al Modulo de Pago
</h1>
<h1  style='color:brown'>
	
debe seleccionar una imagen

	<p>
		<a href='ApartaCupoPago.php?categoria=$categoria&subcategoria=$subcategoria'>Regrezar al Modulo Anterior</a>		
	</p>	
</h1>
 ";

    	}
	}//cierre if de buscar
}

?>
</div>

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

</body>
</html>
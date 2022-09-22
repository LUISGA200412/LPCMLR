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
  <link rel="stylesheet" href="css/admin.css">

</head>

<body>
 
<?php

include("conexion.php");
/*
print_r($_POST["jugador01"]);
echo "<br>";
print_r($_POST["jugador02"]);
echo "<br>";
print_r($_POST["jugador03"]);
echo "<br>";
*/
 
	$cod           = $_POST["jugador01"];
	$unmail        = explode(".", $cod); 
	$cedula[0]     = $unmail[0];
	$nomjugador[0] = strtoupper($unmail[1]);
	$sex[0] 	   = $unmail[2];

	$cod          = $_POST["jugador02"];
	$unmail       = explode(".", $cod); 
	$cedula[1]     = $unmail[0];
	$nomjugador[1] = strtoupper($unmail[1]);
	$sex[1] 	   = $unmail[2];	

	$cod          = $_POST["jugador03"];
	$unmail       = explode(".", $cod); 
	$cedula[2]     = $unmail[0];
	$nomjugador[2] = strtoupper($unmail[1]);
	$sex[2] 	   = $unmail[2];

	$equipo   	= strtoupper($_POST["equipo"]);
	$torneo   	= $_POST["torneo"];
	$pais		= $_POST["pais"];
	$ciudad		= $_POST["ciudad"];    
	$bolera		= $_POST["bolera"]; 
 


/* echo "<br> 	$equipo <br> 
	$torneo <br>   
	$ciudad	 <br> 	    
	$bolera	 <br> 	";
*/

for ($i=0; $i < 3 ; $i++) 
{ 
	$ced  = $cedula[$i];
	$nom  = $nomjugador[$i]; 
	$sexo = $sex[$i]; 

//echo "<br> $ced $nom $sexo";

	$hay=0;
	$sql1 = "SELECT count(*) as HAY FROM equipojugadores where ced_jugador =  $ced ";
	$resultado1 = $mysqli->query($sql1);
	while($rows1 = $resultado1->fetch_assoc())
	{
		$hay = $rows1['HAY'];

		if ($hay == 1 ) 
		{
			$saljugador = $nom;
			break;
		}
 	
	}		
}


if ($hay == 1 ) 
{
	echo  "<script>
	alert('el jugador ==> $saljugador, ya tiene equipo' );
	location.href ='CargarTernas.php';  </script>";   
}
else 
{

		$fecha=date("Y-m-d"); 	
		$i=0;
		$sql = "insert into equipo( tipo_torneo, nombre_equipo ) 
				values ( 3,'$equipo')";
	
	if ($mysqli->query($sql) === TRUE) 
	{

		$sqla = "SELECT * FROM equipo order by idequipo DESC LIMIT 1 ";
		$resultado1a = $mysqli->query($sqla);
		while($rows1a = $resultado1a->fetch_assoc())
		{
			$idequipo = $rows1a['idequipo'];
		}


		for ($ii=0; $ii < 3 ; $ii++) 
		{ 
			$ced  = $cedula[$ii];
			$nom  = $nomjugador[$ii]; 
			$sexo = $sex[$ii]; 

			//echo "<br> valor de $ii";

			$sql2 = " INSERT INTO `equipojugadores`
					(`idequipo`, 
					`ced_jugador`, 
		 			`idcategoria`, 
		 			`idsubcategoria`,			 
					`sexo`, 
					`nombre_jugador`) 
					VALUES (
					'$idequipo',
					'$ced',
 					'0',
 					'0',
					'$sexo',
					'$nom')";
		
			if ($mysqli->query($sql2) === TRUE) 
			{

			}
			else
			{
				echo "<script>
				alert('Error: CARGANDO JUGADOR $sql2 <br> $mysqli->error');
						location.href ='CargarTernas.php';
					</script>";
			}
		}	 
 	}
	else
	{
 
		echo "<script>
		alert('Error: CARGANDO EQUIPO $sql <br> $mysqli->error');
				location.href ='CargarTernas.php';
			</script>";
	}
		
}

	echo  "<script>
	alert('el equipo ==> $equipo, ha sido cargado con exito' );
	location.href ='CargarTernas.php';  </script>";  

?>
<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
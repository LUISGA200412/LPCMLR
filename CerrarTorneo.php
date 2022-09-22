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
<div >

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 

<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
 

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

<?php
//print_r($_POST);
/*
	$cedula    = $_GET['cedula'];
	$nombre  = $_GET['nombre'];*/
	echo "<div style='margin-left:250px;color:#e77b16''>";
	echo "<center>";
	echo "<h2>
		    <a href='PerfilAdministrador.php' method='GET'><b>Liga Picapiedras CMLR</b><br>
		    Modúlo de Administradores<br>
		    Regresar al Menu Anterior</a>

		  
 <br><br>

 </h2>";
	echo "</div>";


include ("conexion.php");

$sihay=0;
$sql1 = "SELECT count(*) as SIHAY FROM torneo where status_torneo = 1 order by idtorneo DESC LIMIT 1";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
			$sihay = $rows1['SIHAY'];	
		}

if ($sihay == 0 ) 
{

echo 
			    "<script>
alert('NO EXISTE INFORMACIÓN DE NUEVO TORNEO, REALICE UNO PARA PODER DESACTIVARLO');
location.href ='PerfilAdministrador.php';
			            </script>"; 		       
}

		$sql1 = "SELECT * FROM torneo where status_torneo = 1 order by idtorneo 
			DESC LIMIT 1";
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

		$fecd = date_format($fecdesde,"d/m/Y");
		$fech = date_format($fechasta,"d/m/Y");
		$sql11 = "SELECT * FROM categorias where 
		idcategoria = $idcategoria";
		$resultado11 = $mysqli->query($sql11);
		while($rows11 = $resultado11->fetch_assoc())
		{
			$nomcategoria = $rows11['nombre_categoria'];	
		}

		$sql13 = "SELECT * FROM bolera where 
		idbolera = $idbolera and idpais = $idpais and idciudad = $idciudad";
		$resultado13 = $mysqli->query($sql13);
		while($rows13 = $resultado13->fetch_assoc())
		{
			$nombolera = $rows13['nombre_bolera'];	
		}		
  ?>


<div style="margin-left:250px">
<form  method="post">

    <table border="0" align="center" width="700" >

    <tr>
      
          <td align="center"> 
            <h1 style='color:#e77b16'>
            	<?php
            	 
            	  	echo "ESTA A PUNTO DE CERRAR EL TORNEO <br>";
            	  echo strtoupper($nomtorneo); 
           
            	?>
            </h1>
			<h2 style="color:red;">
            	<?php
            	echo "Realizado en la Bolera ".$nombolera."<br>";
            	echo "desde el ".$fecd." Hasta el ".$fech;
            	?>
            </h2><br>                               
            
          </td>
    </tr> 
    <tr>
    	<td align="center">
    		<br>
    		<input type="submit" name="submit" value="cerrar">
			<input type="hidden" name="torneo" value="<?php echo
			$idtorneo; ?> "> 
			<input type="hidden" name="pais" value="<?php echo $idpais; ?> "> 
			<input type="hidden" name="ciudad" value="<?php echo 
			$idciudad; ?> "> 
			<input type="hidden" name="bolera" value="<?php echo 
			$idbolera; ?> "> 
    	</td>

    </tr>
   </table>





  </form>

<?php

if (isset($_POST['submit']))
{

//print_r($_POST);

 $idtorneo		=$_POST["torneo"];
 $pais			=$_POST["pais"];
 $ciudad		=$_POST["ciudad"];    
 $idbolera		=$_POST["bolera"]; 
 
 

		include("conexion.php");

 

 		$sql = "update torneo SET status_torneo = 2 
 		WHERE status_torneo = 1";
 		$sql1 = "DELETE FROM `equipojugadores` ";
 		$sql2 = "delete from equipo";
 		$sql3 = "ALTER TABLE equipo AUTO_INCREMENT = 1";
  

			if ($mysqli->query($sql) === FALSE or 
				$mysqli->query($sql1) === FALSE or 
				$mysqli->query($sql2) === FALSE or
				$mysqli->query($sql3) === FALSE) 
			{
			
			  echo "Error: " .$sql." ".$sql1." ".$sql2. "".$sql3. " <br>" . $mysqli->error;
			}
			else
			{

 				echo "<script>
				alert('Torneo Cerrado con Exito');
				location.href ='PerfilAdministrador.php';
				</script>";
			}

}			
?>

<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

  
<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->
 
</div>

<!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

 

</body>
</html>
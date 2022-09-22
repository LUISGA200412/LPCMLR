<!DOCTYPE html> 
<html> 
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Picapiedras Bowling Club</title>
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

<style>

.ocultar {
    display: none;
}
 
.mostrar {
    display: block;
}
</style>


<style>

div.margen {
  margin-top:5px;  
}
h2{
	text-align:center;
}
</style>

</head>

<body>



<div>

<?php
include("conexion.php");


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
alert('NO EXISTE INFORMACIÓN DE NUEVO TORNEO, REALICE UNO PARA ACTIVAR LA CARGA DE LAS LÍNEAS DE LOS JUGADORES');
location.href ='ClasificatorioCategoria.php';
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
	
	$sql13 = "SELECT * FROM bolera where idbolera = $idbolera and idpais = $idpais and idciudad = 
			$idciudad";
	$resultado13 = $mysqli->query($sql13);
	while($rows13 = $resultado13->fetch_assoc())
	{
		$nombolera = $rows13['nombre_bolera'];	
	}		
?> 

<form method="post" onsubmit="verificarPasswords(); return false">
 
<table border="0" width="900px" style="margin-left:100px">
	<tr>
		<td colspan="3">
			<!-- Mensajes de Verificación -->

<div id="msg"></div>
<div id="error" class="alert alert-danger ocultar" role="alert">
    Debe seleccionar al Jugador, vuelve a intentar !
</div>
<div id="ok" class="alert alert-success ocultar" role="alert">
    Las Contraseñas coinciden ! (Procesando formulario ... )
 </div>
<!-- Fin Mensajes de Verificación -->
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
       
            <p style="color:#06A9A3;font-size:2em;">
            	<?php
            	  	echo $nomtorneo;
            	?>
            </p>       
			<p style="color:#0356B0;font-size:1em;">
            	<?php
            	echo "A Realizarce en la Bolera ".$nombolera."<br>";
            	echo "desde el ".$fecd." Hasta el ".$fech;
            	?>
            </p> 	

		</td>
	</tr>

 

	<tr>

		<td align="center">
			<br><br>
        <select name="jugador" id="selec1" >  

        <option   value="">Jugador/a:</option> 
  			 
        <?php
        $sql = "SELECT * FROM jugadores_lpcmlr
		order by nombre_jugador  ";
       
        $result=mysqli_query($mysqli,$sql); 
	    while($mostrar=mysqli_fetch_array($result))
        { 
        	    $cate = $mostrar['idcategoria'];
        	    $scate = $mostrar['idsubcategoria'];
        	    $aaa1 = $mostrar['ced_jugador'];
                $bbb = $mostrar['nombre_jugador'];
                $sex = $mostrar['sexo'];

        		$ccc = $aaa1.".".$bbb.".".$sex;    
                echo '<option value="'.$ccc.' ">'.$bbb.'</option>';
        }              
        ?>
       </select> 

		</td>
 
	</tr>
	<tr>
		<td colspan="3" align="center">
       <br>

        <div class="form-group" >
          <button type="submit" name="submit" class="btn btn-primary ">Cargar</button>
        </div>

<input type="hidden" name="torneo" value="<?php echo
$idtorneo; ?> "> 
<input type="hidden" name="nomtorn" value="<?php echo
$nomtorneo; ?> ">
<input type="hidden" name="pais" value="<?php echo 
$idpais; ?> "> 
<input type="hidden" name="ciudad" value="<?php echo 
$idciudad; ?> "> 
<input type="hidden" name="bolera" value="<?php echo 
$idbolera; ?> "> 
<input type="hidden" name="nombole" value="<?php echo 
$nombolera; ?> ">

		</td>
		<tr>
			<td colspan="3" align="center">
 
<div>
  <h2>
    <a href="PerfilAdministrador.php"> 
    Regresar al Menu Anterior</a>
  </h2>
</div> 
</td>
</tr>
</tr>
</table>
</form>

 <?php

if (isset($_POST['submit']))
{
      //print_r($_POST);
    
	$cod          = $_POST["jugador"];
	$unmail       = explode(".", $cod); 
	$cedula         = $unmail[0];
	$nombre       = $unmail[1];
	$sexo       = $unmail[2];
 

    $torneo = $_POST['torneo'];
    $nomtorneo = $_POST['nomtorn'];    
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad']; 
    $bolera = $_POST['bolera'];
    $nombolera = $_POST['nombole'];

	$EXISTE=0;
	$sql1 = "SELECT count(*) as EXISTE FROM individualjugadores where ced_jugador = $cedula ";
	$resultado1 = $mysqli->query($sql1);
	while($rows1 = $resultado1->fetch_assoc())
	{
		$EXISTE = $rows1['EXISTE'];	
	}

if ($EXISTE > 0) 
{
		  echo "<script>
			alert('Jugador ya esta Incluido en el Torneo.... escoja otro ');
			location.href ='CargarIndividual.php';
			</script>";
 } 

				$sql = "
					INSERT INTO `individualjugadores`
					(
					`ced_jugador`, 
					`idcategoria`, 
					`idsubcategoria`, 
					`sexo`, 
					`nombre_jugador`) 
					VALUES (
					'$cedula',
					'0',
					'0',
					'$sexo',
					'$nombre'
					)";
						

		if ($mysqli->query($sql) === TRUE) 
		{
		  echo "<script>
			alert('Jugador Incluido con Exito');
			location.href ='CargarIndividual.php';
			</script>";

		}
		else
		{
			echo "<script> 
			alert('Error: $sql  $mysqli->error');
			location.href ='CargarIndividual.php';
			</script>";
		}
}


?>
 


<script>
function verificarPasswords() {

    // Ontenemos los valores de los campos de contraseñas 


    pass1 = document.getElementById('selec1');


    // Verificamos si las constraseñas no coinciden 
    if (pass1.value == '') 
    {

        // Si las constraseñas no coinciden mostramos un mensaje 
        document.getElementById("error").classList.add("mostrar");
   
		document.getElementById("selec1").style.background = "yellow";
        return false;
    } 

       // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");

        // Mostramos un mensaje mencionando que las Contraseñas coinciden 
        document.getElementById("ok").classList.remove("ocultar");

        // Desabilitamos el botón de login 
        document.getElementById("login").disabled = true;

        // Refrescamos la página (Simulación de envío del formulario) 
    //  location.href ='ValidaRegistro.php' method='post';

    //    setTimeout(function() {
      //     location.reload();
        //}, 9000);

	//	document.miformulario.submit();

        return true;
    

}
</script>


</body>
</html>
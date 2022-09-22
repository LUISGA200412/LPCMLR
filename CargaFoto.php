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

<style>

div.largo{
  margin-left:400px;
  margin-top:10px;
  width: 1270px; 
  font-size:20px;
}
body{
	 background: #b7dbe2;
}
h1{
	text-align:center;
}
h2{
	text-align:center;
}
</style>

</head>

<body>



<div>
	<?php
/*print_r($_GET);
echo "<br>";
print_r($_POST);
*/
		$desde  = $_GET["desde"];



		if ( $desde == 1 )
		{	

			$cod      = $_GET["CODIGO"];
			$unmail   = explode(".", $cod); 
			$cedula   = $unmail[0];
			$nombre   = $unmail[1];

		  echo "<h2>
		    <a href='PerfilAdministrador.php' method='GET'><b>Liga Picapiedras CMLR</b><br>
		    Modúlo de Administradores<br>
		    Regresar al Menu Anterior</a>
		  </h2>
		  <br>
		  <h1>
		   SE CARGARA LA FOTO DEL JUGADOR/A $nombre
		   </H1>
		  ";
		}
		else
		{
		$cedula = $_GET["cedula"];
		$nombre = $_GET["nombre"];

			echo "<h2>
		    <a href='PerfilJugador.php?cedula=$cedula' method='GET'><b>Liga Picapiedras CMLR</b><br>
		    Regresar al Menu Anterior</a>
		  </h2>
		  <br>
		  <h1>
		   SE CARGARA LA FOTO DEL JUGADOR/A $nombre
		   </H1>

		  ";
		}
	?>
 
  <h2  style='color:brown'>
<!--	Bienvenidos al Módulo Cargar Foto del Jugador-->
	
	<p>
		Soló se permite foto del tipo ( png ) con un tamaño menor de 20 kb <br> con una dimención de 88 X 88 Pixeles
	</p>	
</h2>
</div>

<div class="largo">
  <?php 
//print_r($_GET);

 
include("conexion.php");
 
 //echo "<br> pokejrfgijifjd $cedula";

echo "
	<form action='UploadFotoJugador.php?cedula=$cedula&desde=$desde' method='post' enctype='multipart/form-data'>

<table border='1' width='600px' >
	<tr>
		<td style='text-align:center;'>
        	Seleccione la imagen a Cargar:
		</td>
	</tr>

	<tr>
		<td class='tdc'>
        	<input type='file' name='image'/>
		</td>
	</tr>

    <tr> 
    	<td style='text-align:center;'>  
        	<input type='submit' name='submit' value='Cargar'/>
        </td>
	</tr>
</table>
    
    </form>";
	


?>
</div> 


</body>
</html>
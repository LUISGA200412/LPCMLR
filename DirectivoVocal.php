<?php
	include ("conexion.php"); 
	
	$nombre="";$foto="";
 	$sql="SELECT * FROM jugadores WHERE 
	ced_jugador = 0 ";
 	$result=mysqli_query($mysqli,$sql);
	while($mostrar=mysqli_fetch_array($result))
 	{
 		$nombre = utf8_decode($mostrar['nombre_jugador']);
  		$foto 	= $mostrar['fotojugador'];
 	}	

	echo '<img class="profile-user-img img-responsive img-circle"
	src = "data:image/png;base64,' . base64_encode($foto) . '"  > ';
    echo "<br>Vocal<br>";
    echo "<a href='contacto.php?contacto=$nombre&para=luisegd160354@gmail.com'>$nombre";
          echo "</a>";  

?>
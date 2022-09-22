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
  margin-left:25px;
  margin-top:10px;
  width: 1270px; 
  font-size:12px;
}
body{
	 background: #b7dbe2;
}
th{
	text-align:center;
}

h2{
	text-align:center;
}
</style>
</head>

<body>
 

<div class="largo">

<div>
  <h2>
    <a     href="PerfilAdministrador.php"><b>Liga Picapiedras CMLR</b><br>
    Modúlo de Administradores<br>
    Regresar al Menu Anterior</a>
  </h2>
</div>

<h2  style='color:brown'>
	Bienvenidos al Módulo Cargar Foto del Jugador
	
<!--	<p>
		Soló se permite foto del tipo ( png ) con un tamaño menor de 20.000 KB
	</p>-->	
</h2>

</div> 

        <div class="largo">

<table style="margin-left: 450px; margin-top: 10px;"       width="400px">
<tr>
 
    <td>
       
	<br>       

  <form style="	text-align:center;" name='formulario' id='formulario' method='get' action='CargaFoto.php'
   target='_self' enctype="multipart/form-data"> 

  

<select name="CODIGO" id="selec" required>  

         <option value="">Seleccione Jugador:</option> 

        <?php

        include ("conexion.php");
 
        // print_r($_POST);
         $CATEGORIA=$_GET["categoria"];    
 		 $SUBCATEGORIA=$_GET["subcategoria"]; 

		$sql = "SELECT * FROM jugadores_lpcmlr
		 where ced_jugador>0 
		order by nombre_jugador ";
       
        $result=mysqli_query($mysqli,$sql); 
	    while($mostrar=mysqli_fetch_array($result))
        {
        	    $aaa = $mostrar['ced_jugador'];
                $bbb = $mostrar['nombre_jugador'];
                $ccc = $aaa.".".$bbb;      
                echo '<option  value="'.$aaa.'.'.$bbb.' ">'.$bbb.'</option>';
        }

                      
        ?>
       </select> 
       <br><br> 
      
 			<input type="submit" value="Cargar">

<input type="hidden" name="desde" value="1">
      </form>
  </td>


</tr>   
</table>
 
</body>
</html>
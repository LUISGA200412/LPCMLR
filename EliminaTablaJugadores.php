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

<style>

table.logotipo {
  margin-left:250px;
  width: 700px; 
}

</style>

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
<body style="background: #b7dbe2;" >
<div>

</div>

<div>

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

           <?php
             /* echo print_r($_GET["parametro"]);*/

            $cod      =  $_GET["parametro"];
            $CEDULA   =  $_GET["parametro"];
 
          ?>

<div align="center" style="margin-top:5px;margin-left:70px;">

  <?php 

    include ("conexion.php");

    $sql="SELECT * from jugadores_lpcmlr where ced_jugador = $CEDULA  ";
    $result=mysqli_query($mysqli,$sql);

  ?>

  <form action="CapturaEliminarTablaJugadores.php?cedula=$CEDULA" method="POST">

    <table border="0"  align="center" width="650">

    <?php foreach ($result as $key => $value)  {?>

    <tr>
      
          <td colspan="2" align="center"> 
            <h3>
               
    <a href="ActualizaJugadores.php"><b>Liga Picapiedras CMLR</b><br>
    Modúlo de Administradores<br>
    Elimina Jugadores<br>
    Regresar al Menu Anterior</a>
   <br><br>
              ESTA A PUNTO DE INACTIVAR AL JUGADOR/A PROCEDA CON PRECAUCIÓN

            </h3>       
          </td>
          
    </tr>
    <tr>

<?php

echo "<td align='center' colspan='2'>";
echo '<img src="data:image/jpeg;base64,'.base64_encode( $value['fotojugador'] ).'"/>';
echo "</td>";

?>
    </tr>

    <tr>

          <td  align='center' colspan='2'> 
          		<br>
          	<input type="text" size="50" name="txnombre" value="<?php echo utf8_encode($value["nombre_jugador"]); ?>" readonly> 
          </td>
    </tr>

    
<!--   <tr>
    <td>Email</td>
          <td><input type="text" size="50" name="txcorreo" value="<?php echo $value["correo_jugador"]; ?>" readonly ></td>
    </tr>


    <tr>
    <td>Teléfono</td> 
          <td>
            <input type="text" size="20" name="txtelefono" 
            value="<?php echo $value["telefono_jugador"]; ?>" readonly>
          </td>
    </tr>
    <tr>
    <td>Carnet</td> 
          <td><input type="text" maxlength="10" size="10" name="carnet" value="<?php if(is_numeric($value["numcarnet"])) {echo $value["numcarnet"]; } else { echo "Debe ser numérico"; } ?> " readonly></td>
    </tr>
    <tr>
    <td>Categoría</td> 
          <td style="color: red">
            <input type="number" name="idcategoria" min="3" max="5" value="<?php echo $value["idcategoria"]; ?>" readonly>
            3=Elite 4=2da Fuerza 5=3ra Fuerza
          </td>
    </tr>
    <tr>
    <td>Sub Categoría</td> 
          <td style="color: red">
            <input type="number" name="idsubcategoria" min="1"max="6" value="<?php echo $value["idsubcategoria"];?>" readonly>
            1=SúperSénior 2=Sénior 3=Sub12 4=Sub16 5=Sub21 6=Adulto/a 
          </td>
     </tr>
	<tr>
    <td>Password</td> 
          <td style="color: red">
            <input type="password" id="password" name="password" size="12" value="<?php echo $value["password"];?>" readonly>
               <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>

          </td>
    </tr>
<tr>
    <td>Status</td> 
          <td style="color: red">
            <input type="number" name="idstatus" min="1"max="2" value="<?php echo $value["idstatus"];?>" required   >
            1=Activo 2=Inactivo 
          </td>
    </tr>
-->


    <tr>

      <td align="center" colspan="2">
    	<br>
			<div class="form-group" >
	          <button type="submit" id="login" class="btn btn-danger ">Inactivar</button>
	        </div>
		</td>
    </tr>

  <?php } ?>

    </table>
<input type="hidden" name="cedula" value="<?php echo $CEDULA; ?> "> 
<input type="hidden" name="funcion" value="modificar">
<input type="hidden" name="cod" value="<?php echo $cod; ?>">


  </form>


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

   
</div>
  <!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>
</html>

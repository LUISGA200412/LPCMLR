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
//print_r($_GET);print_r($_POST);


$cedula = $_GET['cedula']; 
//$perfil = $_GET['perfil'];

include ("conexion.php");

$sql="SELECT * from jugadores_lpcmlr where 
		ced_jugador = $cedula ";
		$result=mysqli_query($mysqli,$sql);
		while($mostrar=mysqli_fetch_array($result))
		{
			$entidad 	= $mostrar['identidad'];
			$club 		= $mostrar['idclub'];
			$categoria 	= $mostrar['idcategoria'];
			$subcategoria= $mostrar['idsubcategoria'];
			$nombre 	= $mostrar['nombre_jugador']; 
			$sexo 		= $mostrar['sexo'];
			$fnac 		= $mostrar['fecha_nac'];
			$nac 		= $mostrar['nacionalidad'];
			$direccion 	= $mostrar['direccion'];
			$carnet 	= $mostrar['numcarnet'];
			$fcatd 		= $mostrar['fecha_categoria_desde'];
			$ffvb 		= 
			$mostrar['fecha_inscripcion_fvb'];
			$correo 	= $mostrar['correo_jugador'];
			$telefono 	= $mostrar['telefono_jugador'];
			$profesion 	= $mostrar['profesion'];
			$estudios 	= $mostrar['estudios'];
			$destresas 	= utf8_decode($mostrar['destresas']);
			$notas 	= $mostrar['notas'];
			$password 	= $mostrar['password'];
			$foto   	= $mostrar['fotojugador'];
		}
?>
 	  
<div class="row"   style="margin-left:80px">
    <div class="col-md-3">

          <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
              <?php
				echo '<img class="profile-user-img img-responsive img-circle"
					src = "data:image/png;base64,' . base64_encode($foto) . '" alt="User profile picture">';
			   ?>
			   <!-- Profile Name -->
              <h3 class="profile-username text-center"><?php echo $nombre; ?></h3>

              <p class="text-muted text-center"><?php echo $profesion; ?></p>

            </div>            
        </div>
    </div>



<div class="row">
    <div class="col-md-8">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#datos" data-toggle="tab">Datos Personales</a></li>
				<li><a href="#foto" data-toggle="tab">Cargar Foto</a></li>
     			<!--<li><a href="#otros" data-toggle="tab">Datos FVB</a></li>-->

				<!--<li><a href="#activi" data-toggle="tab">Data Curricular</a></li>-->      
            </ul>
        
        <div class="tab-content">
        

              	<div class="active tab-pane" id="datos">
                <form class="form-horizontal" action="ActualizaDatosPersonales.php?cedula=<?php echo $cedula; ?>" method="post">
                	<br>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Cédula</label>
                    <div class="col-sm-4">
                      <input  type="number" class="form-control" id="inputName" placeholder="cedula" value="<?php echo $cedula;?>" name="cedula" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Nombre y Apellidos</label>

                    <div class="col-sm-8">
                      <input required type="text" class="form-control" id="inputName" placeholder="Nombre y Apellido" value="<?php echo $nombre;?>" name="nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Nacionalidad</label>

                    <div class="col-sm-3">
                      <input required type="text" class="form-control" id="inputName" placeholder="Nacionalidad" value="<?php echo $nac;?>" name="nacionalidad"  >
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-4 control-label">Fecha de Nacimiento</label>

                    <div class="col-sm-4">
                      <input required type="date" class="form-control" id="inputEmail" placeholder="Fecha Nacimiento" value="<?php echo $fnac;?>" name="fechanac">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Direccion</label>
 
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputName" placeholder="Direccion" value="<?php echo $direccion;?>" name="direccion">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Telefono</label>

                    <div class="col-sm-4">
                      <input required type="text" class="form-control" id="inputName" placeholder="Telefono" value="<?php echo $telefono;?>" name="telefono">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Correo</label>

                    <div class="col-sm-6">
                      <input type="mail" class="form-control" id="inputName" placeholder="Correo" value="<?php echo $correo;?>" name="correo">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Password</label>

                    <div >
                      <input  type="password" id="password" name="password" value="<?php echo $password;?>" required>
               			<button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-5">
                      <button type="submit" class="btn btn-danger">Actualizar</button>
                    </div>
                  </div>
                </form>
              	</div>
            	
            <div class="tab-pane" id="foto">
              	<form class="form-horizontal"
              	   action="CargaFoto.php?cedula=<?php echo $cedula; ?>&nombre=<?php echo $nombre; ?>&desde=2'  " method="GET">
               
                  	<div class="form-group">
	                     <div class="col-sm-offset-5 col-sm-5">
	                      <button type="submit" class="btn btn-danger">Cargar</button>
	                   </div>
                	</div>
                	
					<input type="hidden" name="cedula" value="<?php echo $cedula; ?>">
					<input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
					<input type="hidden" name="desde" value="2">					
                </form>
            </div>
              
            	<!--<div class="active tab-pane" id="otros">
              	<form class="form-horizontal"
              	   action="ActualizaDatosFvb.php" method="post">
                  <br>
                  	<div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Entidad</label>

	                    <div class="col-sm-5">
	                      <input type="number" class="form-control" id="inputName" placeholder="Entidad del Jugador" value="" name="entidad">
	                    </div>
                	</div>

                  	<div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Club</label>

	                    <div class="col-sm-5">
	                      <input type="text" class="form-control" id="inputName" placeholder="Club" value="" name="club">
	                    </div>
                  	</div>

					<div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Categoria</label>

	                    <div class="col-sm-5">
	                      <input type="text" class="form-control" id="inputName" placeholder="Cstegoria" value="" name="categoria">
	                    </div>
                  	</div>

                  	<div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Sub Categoria</label>

	                    <div class="col-sm-5">
	                      <input type="text" class="form-control" id="inputName" placeholder="subcategoria" value="" name="subcategoria">
	                    </div>
                  	</div>

                  	<div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Carnet</label>

	                    <div class="col-sm-5">
	                      <input type="text" class="form-control" id="inputName" placeholder="Carnet" value="" name="carnet">
	                    </div>
                  	</div>

                  	<div class="form-group">
	                    <div class="col-sm-offset-2 col-sm-5">
	                      <button type="submit" class="btn btn-danger">Actualizar</button>
	                    </div>
                  	</div>
                	</form>
            		</div>-->
			</div>
	</div>
</div>
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
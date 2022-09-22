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
.ir-arriba {
	display:inline-block;
	padding:5px;
	background:#06A9A3;
/*	font-size:200px;
	color:#fff;*/
	cursor:pointer;
	position: fixed;
	bottom:10px;
	right:10px;
}

</style>

</head>
<body>


<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
	
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
   	

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS -->
	<span class="ir-arriba fa  fa-arrow-up"></span>



<div class="largo">

	<?php   
 
//print_r($_GET);


/*$password     = $_GET['password'];
$cedula     = $_GET['cedula'];	
$_POST['password'] = $password;
$_POST['cedula'] = $cedula;*/

 ?>
  <h2>
    <a 


    href="PerfilAdministrador.php" method="GET"><b>Liga Picapiedras CMLR</b><br>
    Regresar al Menu Anterior</a>
  </h2>
</div>


        <div class="box largo">
            
             <div class="box-body">
             	<table id="example1" class="table 	table-bordered table-striped ">
                	<thead>
                	<tr>
	                  <th>Cédula</th>
	                  <th>Nombre Jugador</th>
	           <!--       <th>Carnet FVB</th>
	                     <th>Club</th>
	                  <th>Categoría(s)</th>
	                  <th>Sub Categoría</th>
	              <th>Fecha Desde</th>
	                  <th>Fecha Hasta</th> -->
	                  <th>Correo</th>
	                  <th>Telefono</th>
	                  <th>Password</th>	                  
	                  <th>Foto</th>
					  <th>Sexo</th>                                  
   				      <th>Acción</th>
	                </tr>
	                </thead>
	                <tbody>
             
<?php
        include ("conexion.php");
		$sql="SELECT * from jugadores_lpcmlr 
		where idstatus = 1
 
				 order by nombre_jugador";
		$result=mysqli_query($mysqli,$sql);
        while($mostrar=mysqli_fetch_array($result))
        {
	$fechad = date_create($mostrar['fecha_categoria_desde']);
	$fechah = date_create($mostrar['fecha_categoria_hasta']);

        	echo "<tr style='font-size :12px; text-align:center;'>";
      		echo "<td>".$mostrar['ced_jugador']."</td>";
      		echo "<td style='text-align:left;'>".utf8_decode($mostrar['nombre_jugador'])."</td>";
      	/*	echo "<td>".$mostrar['numcarnet']."</td>";
      		      		echo "<td>".$mostrar['idclub']."</td>";

      		echo "<td>".$mostrar['idcategoria']."</td>";
      		echo "<td>".$mostrar['idsubcategoria']."</td>";
     		echo "<td>".date_format($fechad,"d/m/Y")."</td>";
       		echo "<td>".date_format($fechah,"d/m/Y")."</td>";
*/       		
      		echo "<td style='text-align:left;font-size :12px'>".$mostrar['correo_jugador']."</td>";
      		echo "<td>".$mostrar['telefono_jugador']."</td>";
      		echo "<td>".$mostrar['password']."</td>";

echo "<td>";
echo '<img src="data:image/jpeg;base64,'.base64_encode( $mostrar['fotojugador'] ).'"/>';
echo "</td>";
  		echo "<td>".$mostrar['sexo']."</td>";

         echo "<td><a  
<a href='ActalizaJugadoresAdministrador.php?cedula=".$mostrar['ced_jugador']. " '>Modificar</a></td> 
       </tr>";
      		echo "</tr>";

    /*     echo "<td><a  
<a href='ModificarTablaJugadores.php?parametro=".$mostrar['ced_jugador']. " '>Modificar</a></td> 
       </tr>";
      		echo "</tr>";*/
/*
         echo "<td><a href='EliminaTablaJugadores.php?parametro=".$mostrar['ced_jugador']. " '>Eliminar</a>
<a href='ModificarTablaJugadores.php?parametro=".$mostrar['ced_jugador']. " '>Modificar</a></td> 
       </tr>";
      		echo "</tr>";
*/      		
        }
 
      ?>      
   







	                </tbody>
	                <tfoot>
	                <tr>
	                  <th>Cédula</th>	               	
	                  <th>Nombre Jugador</th>
	              <!--      <th>Carnet FVB</th>
	                  <th>Club</th>
	                  <th>Categoría(s)</th>
	                  <th>Sub Categoría</th>
	                <th>Fecha Desde</th>
	                  <th>Fecha Hasta</th>-->
	                  <th>Correo</th>
	                  <th>Telefono</th>
	                  <th>Password</th>
	                  <th>Foto</th>
	                  <th>Sexo</th>             
   				      <th>  Acción</th>
	                </tr>
	                </tfoot>
              	</table>
            </div>
        </div>
    
<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

    	
  	

  <!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

  
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
 
  <script src="arriba.js"></script>

</body>
</html> 
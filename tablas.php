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
table.logotipo {
  margin-left:250px;
  width: 700px; 
}
</style>

<style>
td.oro{
	background:gold;
}
td.plata{
	background:silver;
}
td.bronce{
	background:#CD7F32;
}
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
    	<section class="content">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 
 


          <div class="box">
            <div class="box-header">
              <div>
		<h1 style="color:#900C3F;margin-left:300px;">
                <?php 
    		//print_r($_GET);
                  $entidad  = $_GET["cara"];
				  $club    	= $_GET["clu"];
				  $nombreclub	= $_GET["nom"];
					echo "Jugadores del Club ".$nombreclub;
                  ?>
		</h1>
	  </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre Jugador</th>
                  <th>Carnet No</th>
                  <th>Categoría(s)</th>
                  <th>Sub Categoría</th>
                  <th>Foto</th>
                </tr>
                </thead>
                <tbody>
             
<?php 
			     
		include ("conexion.php");
		$sql="SELECT * from jugadores_lpcmlr 
		where 
				identidad = $entidad and 
				idclub 	  = $club and idstatus =1 and
				fecha_categoria_hasta = 0
				 order by nombre_jugador";
		$result=mysqli_query($mysqli,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td class="black" align="left" WIDTH="40%" >
				<?php echo $mostrar['nombre_jugador'] ?>
					
				</td>
				
			<td class="black" align="center" WIDTH="10%">
				<?php 
				    echo $mostrar['numcarnet'] ;
				    $SUBCATEGORIA = $mostrar['idsubcategoria'];
				?>
			</td>
			<td  class="black" align="center" WIDTH="15%">

				<?php 
					$IDCATEGORIA = $mostrar['idcategoria'];

					$sql1="SELECT * from categorias 
					where idcategoria = $IDCATEGORIA" ;
					$result1=mysqli_query($mysqli,$sql1);
					while($mostrar1=mysqli_fetch_array($result1))
					{
						echo $mostrar1['nombre_categoria'] ;
					}
					

				?>
			</td>
			<td  class="black" align="center" WIDTH="20%">
				<?php
					$sql1="SELECT * from subcategorias 
					where idcategoria = $IDCATEGORIA and
					idsubcategoria = $SUBCATEGORIA" ;
					$result1=mysqli_query($mysqli,$sql1);
					while($mostrar1=mysqli_fetch_array($result1))
					{
						echo $mostrar1['nombre_subcategoria'] ;
					}
				?>

			</td>
			<?php
			 	echo '<td class="black" align="center" WIDTH="70%">' .
      			'<img src = "data:image/png;base64,' . base64_encode($mostrar['fotojugador']) . '" />'
      				. '</td>';
			?>
			</tr>
			<?php 
			}

	 		?> 




                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre Jugador</th>
                  <th>Carnet No</th>
                  <th>Categoría(s)</th>
                  <th>Sub Categoría</th>
                  <th>Foto</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

    	</section>
  	</div>
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
</body>
</html>

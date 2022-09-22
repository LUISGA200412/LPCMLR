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


<table class="table table-bordered table-condensed table-striped">

<tr>
	<td colspan="2" class="black" valign="top">
 

	<div align="center" style="color: red;font-size:40px; ">

       Estadísticas de los Torneos Jugados
 <?php  
		include ("conexion.php");
		$tipo = $_GET["tipo"];
if ($tipo == 1) 
{
	$pagina = "EstadisticasIndividualMasculinoTodos.php";
}
else 
{
	if ($tipo == 2) 
	{
	$pagina = "EstadisticasIndividualFemeninoTodos.php";
	}
	else
	{
		if ($tipo == 3) 
		{ 
        $titorneo =0;
        $sql1 = "SELECT * FROM torneo where tipo_torneo = 2";
            $resultado1 = $mysqli->query($sql1);
            while($rows1 = $resultado1->fetch_assoc())
            {
              $titorneo = $rows1['tipo_torneo'];	  
            }        
            if (empty($titorneo) ) {
              echo "<script> alert('Aun No se ha cargado Ningun Torneo en Parejas');
            location.href ='index1.php';
            </script>";
            }
		    
        $pagina = "EstadisticasParejasTodos.php";
		}
		else
		{
			if ($tipo == 4) 
			{
        $titorneo =0;
        $sql1 = "SELECT * FROM torneo where tipo_torneo = 3";
            $resultado1 = $mysqli->query($sql1);
            while($rows1 = $resultado1->fetch_assoc())
            {
              $titorneo = $rows1['tipo_torneo'];	  
            }        
            if (empty($titorneo) ) {
              echo "<script> alert('Aun No se ha cargado Ningun Torneo en Ternas');
            location.href ='index1.php';
            </script>";
            }       
			  $pagina = "EstadisticasTernasTodos.php";
			}
			else
			{
				if ($tipo == 5) 
				{
          $titorneo =0;
          $sql1 = "SELECT * FROM torneo where tipo_torneo = 4";
              $resultado1 = $mysqli->query($sql1);
              while($rows1 = $resultado1->fetch_assoc())
              {
                $titorneo = $rows1['tipo_torneo'];	  
              }        
              if (empty($titorneo) ) {
                echo "<script> alert('Aun No se ha cargado Ningun Torneo en Cuartas');
              location.href ='index1.php';
              </script>";
              }
				  $pagina = "EstadisticasCuartasTodos.php";
				}
				else
				{
          $titorneo =0;
          $sql1 = "SELECT * FROM torneo where tipo_torneo = 5";
              $resultado1 = $mysqli->query($sql1);
              while($rows1 = $resultado1->fetch_assoc())
              {
                $titorneo = $rows1['tipo_torneo'];	  
              }        
              if (empty($titorneo) ) {
                echo "<script> alert('Aun No se ha cargado Ningun Torneo en Quintas');
              location.href ='index1.php';
              </script>";
              }
				  $pagina = "EstadisticasQuintasTodos.php";
				}
			}
		}
	}
}
				
?>       	
        
	</td>
</tr>	
<tr >
    <td valign="top">
 	<div align="center" style="color:navy;font-size:20px; ">

  <?php 
       	
 
              /* rutina busca torneos*/
    echo "<form name='formulario' id='formulario' method='post' action='$pagina' 
  enctype='multipart/form-data'> ";
    echo "<table class='table table-bordered table-condensed table-striped'>";
    echo "<tr>";
    echo "<td align='center'>";
    echo "<select  name='TORNEO' id='selec' required>";
    echo "<option value=''>Seleccione :</option>";

                $sql="SELECT * from torneo group by idtorneo";
                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {     
                  $tipo = $mostrar['tipo_torneo'];
                  $aaa = $mostrar['idtorneo'];
                  $bbb = $mostrar['nombre_torneo'];
                  $bol = $mostrar['idbolera'];
                  $ciu = $mostrar['idciudad'];
                  $fecdesde = $mostrar['fecha_torneo_desde'];
                  $fechasta = $mostrar['fecha_torneo_hasta'];
                  $categoria = $mostrar['idcategoria'];
                  $ccc = $aaa." ".$bbb;      
                  echo ' <option value=" '.$aaa.'.'.$bbb.'.'.$bol.'.'.$ciu.'.'.$fecdesde.'.'
                    .$fechasta.'.'.$tipo.' ">'.$bbb.'</option>';
                }
                                                              
              echo "</select>";
              echo "</td>";
              echo "</tr>";    
              echo "<tr>";
              echo "<td align='center'>";
              echo "<br>";
              echo    "<input type='submit' value='Buscar Torneo'  >";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
              echo "</form>";

              /* fin rutina busca torneos*/
          
      	
?>        
      
    </td>
</tr>

</table> 


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


</body>
</html>

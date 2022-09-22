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
  
  	<div class="content-wrapper" align="center">
    	<section class="content">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 


<table class="table table-bordered table-condensed table-striped">

<tr>
	<td colspan="2" class="black" valign="top">
	<div style="color:red;font-size:20px; ">
 <?php 
				include ("conexion.php");

                /*  print_r($_GET['cedula']);*/


 if ($_GET['cedula'])
		    { 	
			   $cedula    = $_GET['cedula'];
		    }
			  if(empty($_GET['cedula'])) 
 			  { 
    		  header('Location: index.php');
    	  } 
else
{
 $query="SELECT * FROM jugadores_lpcmlr WHERE ced_jugador = $cedula ";
 $consulta2=$mysqli->query($query);
 if($consulta2->num_rows>0)
 {
  $fila=$consulta2->fetch_array(MYSQLI_ASSOC);
  $_SESSION['nombre']=utf8_decode($fila['nombre_jugador']);
  $_SESSION['cedula']=$fila['ced_jugador'];
  $CEDULA=$fila['ced_jugador'];
  $NOMBRE=$_SESSION['nombre'];
  echo "<p align='center'
  <h4 style='color:orange;' >";
    echo "Bienvenido/a una vez màs " .$_SESSION['nombre'];
    echo "</h4></p>"; 
 }	
 else
 {
	
echo "<script>alert('AUN NO ESTAS REGISTRADO COMUNICATE CON LA FVB');
            location.href ='index.php';
            </script>"; 

 }
}

?>        	
        
	</td>
</tr>	
<tr >
    <td valign="top">
        <div align="center" style="color: red;font-size:16px; ">

       Consultar por Torneos Jugados

  <?php 
       	
   $sql = "SELECT count(*) FROM lineas WHERE ced_jugador = $CEDULA";
   $result=mysqli_query($mysqli,$sql); 
   while($mostrar=mysqli_fetch_array($result))
   {
     $TORNEOSJUGADOS = $mostrar['count(*)'];   
   }
   if ($TORNEOSJUGADOS == 0) 
   {
    echo "<br>";
    echo "<h5 style='color:green' >";
    echo "AÙN NO TIENES TORNEOS REGISTRADOS !";
    echo "<br>";
    echo "COMUNÌCATE CON ALGÙN DIRECTIVO PERTENECIENTE A LA FVB";
    echo "</h5>";
   }
   else
   {
              /* rutina busca torneos*/
    echo "<form name='formulario' id='formulario' method='post' action='saltorjugados.php' 
       target='_blank' enctype='multipart/form-data'> ";
    echo "<table class='table table-bordered table-condensed table-striped'>";
    echo "<tr>";
    echo "<td align='center'>";
    echo "<select  name='TORNEO' id='selec' required>";
    echo "<option value=''>Seleccione :</option>";
              $i = 0;
              $tmp[] = "";
              $x = 0;
              $sql = "SELECT * FROM lineas WHERE ced_jugador = $CEDULA        
              group by idtorneo ";
              $result=mysqli_query($mysqli,$sql); 
              while($mostrar=mysqli_fetch_array($result))
              {
                $array2[$x] = $mostrar['idtorneo'];
                $x++;
              }
              $totalarray2 = count($array2);                 
              if ( is_null($tmp) )
              {
                echo "<br><br><br>";
                $totaltmp = 0;
              }
              $totaltmp = count($tmp);
              $resultado = array_diff($array2, $tmp) ;                
              $totalresultado = count($resultado);
              for ($a=0; $a <= $totalresultado-1  ; $a++) 
              { 
                $idtorneo = (array_values($resultado)[$a]); 
                $sql="SELECT * from torneo where idtorneo = $idtorneo";
                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {     
                  $aaa = $mostrar['idtorneo'];
                  $bbb = $mostrar['nombre_torneo'];
                  $bol = $mostrar['idbolera'];
                  $ciu = $mostrar['idciudad'];
                  $fecdesde = $mostrar['fecha_torneo_desde'];
                  $fechasta = $mostrar['fecha_torneo_hasta'];
                  $categoria = $mostrar['idcategoria'];
                  $ccc = $aaa." ".$bbb;      
                  echo ' <option value=" '.$aaa.'.'.$bbb.'.'.$CEDULA.'.'.$bol.'.'.$ciu.'.'.$_SESSION['nombre'].'.'.$fecdesde.'.'
                    .$fechasta.'.'.$categoria.' ">'.$bbb.'</option>';
                }
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
            }
      	
?>        
        </div>
    </td>
</tr>

</table> 

<table class="table table-bordered table-condensed table-striped"> 
<tr>    
    <td valign="top" >
    	<div align="center" >

      	<?php
      	echo "<form name='formulario' id='formulario' method='post' action='salranfecha.php' 
       		target='_blank' enctype='multipart/form-data'> ";
			echo"	<p align='center' style='color: red;font-size:16px'>
                      Consultar por Rango de Fechas 
          			</p>";
        	echo "  <P style='color:green;font-size:9'>
              Fecha Desde <input type='date' name='FECHADESDE' id='FECHADESDE' size='10' maxlength='10' required/>
            </P>";
        	 
          	echo "<P style='color:green;font-size:9'>
                Fecha Hasta <input type='date' name='FECHAHASTA' id='FECHAHASTA' size='10' maxlength='10' required/>
            		</P>";
            echo "<br>";          
          	echo "<input type='submit' value='Buscar Torneo por Rango'  >";
			echo "<input type='hidden' 	name='NOMBREJUGADOR' 
				value='$NOMBRE'>";

          	echo "<input type='hidden' name='CEDULA' value='$CEDULA' >";
          	echo "</form>";
          
       ?>

   		</div>
	</td>
</tr> 
</table>  


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


</body>
</html>

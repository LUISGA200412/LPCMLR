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
  <link rel="stylesheet" href="css/admin.css">



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
<style>
.p a:link{
 color:red;
}
.p a:hover{
 background-color:blue;
}
</style>
 

<body style="margin-left:50px;" onLoad="verificarPasswords()">
<div>

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
	
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  


<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS -->
<?php
	include ("conexion.php");

	$HAY=0;
	$sql1 = "SELECT COUNT(*) AS HAY, tipo_torneo FROM torneo where status_torneo = 1 order by idtorneo DESC LIMIT 1";
	$resultado1 = $mysqli->query($sql1);
	while($rows1 = $resultado1->fetch_assoc())
	{
		$HAY = $rows1['HAY'];
		$tipotorneo = $rows1['tipo_torneo'];
	}

if ($HAY == 0 ) 
{
	echo "<input type='hidden' id='tipotorneo' 
		value='0'>";
}
else
{
	echo "<input type='hidden' id='tipotorneo' 
		value='$tipotorneo'>";
}	

 
 
echo '<script type="text/javascript">',
     'verificarPasswords();',
     '</script>';
 
?>

 
<div style="margin-left:500px;">
  <h2>
    <a href="index.php"><b>Liga Picapiedras CMLR</b><br>
    Modúlo de Administradores<br>
    Regresar al Menu Anterior</a>
  </h2>
</div>

 

<div class="row" >
    <div class="col-md-12">
	    <div class="nav-tabs-custom">
            <ul style="background:#FDD390" class="nav nav-tabs">
              <!--<li><a href="#011" data-toggle="tab"
              style="color:navy">Ayuda</a></li>-->
              <li><a href="#01" data-toggle="tab"  > Modulo Jugadores</a></li>              
              <li><a href="#02" data-toggle="tab"  > Modulo Torneos</a></li>
			  <li><a href="#03" data-toggle="tab"  > Generar Planillas</a></li>
			  <li><a href="#04" data-toggle="tab"  > Torneo Individual</a></li>
			  <li><a href="#05" data-toggle="tab"  > Torneo Por Parejas</a></li>
			  <li><a href="#06" data-toggle="tab"  > Torneo Por Ternas</a></li>
			  <li><a href="#07" data-toggle="tab"  > Torneo Por Cuartas</a></li>
 			  <li><a href="#08" data-toggle="tab"  > Torneo por Quintas</a></li>
            </ul>
        
            <div style="background:#FDE6C1" class="tab-content">
 
    			<!--<div class="active tab-pane"  id="011">
		            <form class="form-horizontal" action="#" >
						<div class="form-group">
                    		<div class="col-sm-10">
                 	 		   Ayuda 
              	 			
                    		</div>

                  		</div>
		            </form>
		        </div>-->

		        <div class="tab-pane" id="01">
		            <form class="form-horizontal" action='IncluirJugador.php' method="post" >
						<div class="form-group">
                    		<div  class="col-sm-12">

                 	 	<div align='center'> 
                 	 	 
   <button type="submit" class="btn btn-success "  >Incluir Jugador</button>
                 	 	</div>
<?php

echo "<h5 style='text-align:justify;'> Este link, permitira, Registrar a los JUGADORES, que por alguna razon, no tengan  a su alcance  los medios ( Internet, Tablet, Smartphone etc ),  para <b>REGISTRASE</b>.
<br>
El Jugador a <b>REGISTRAR</b>, para poder entrar debe terner un <b>Password y un Email.</b><br>
Por comodidad el <b>Password sera 1234</b> ( el Jugador lo cambiara una vez entre a su <b>SECCION</b>.<br>
Por comodidad el <b>Email sera pbc@gmail.com</b>  ( el Jugador lo cambiara una vez entre a su <b>SECCION</b>. <br><br>";
	?>
                 	 		
						<div align='center'>
                 	 		<a method="post"  href="ActualizaJugadores.php" class="btn btn-primary ">Modificar Jugador</a>
                 	 	</div>

<?php

echo "<h5 style='text-align:justify;'> Este link, permitira, <b>Modificar</b> la Información General de los <b>JUGADORES</b>, que por alguna razon, no tengan  a su alcance  los medios ( Internet, Tablet, Smartphone etc ),  para realizar esta opción. <br><br>";
?>
                 	 	
                    		<div align='center'>
                 	 			<a method="post" href="CargarFotoJugador.php" class="btn btn-danger" > Cargar Foto</a>
 
                    		</div>

<?php

echo "<h5 style='text-align:justify;'> Este link, permitira, <b>Cargar la Foto</b> de los <b>JUGADORES</b>, que por alguna razon, no tengan  a su alcance  los medios ( Internet, Tablet, Smartphone etc ),  para realizar esta opción. <br><br>";

?>

   	 			
                    		</div>

                  		</div>
		            </form>
		        </div> 

		        <div class="tab-pane" id="02">
		            <form class="form-horizontal" action="#" >
						<div class="form-group">
                    		<div class="col-sm-10">
                 	 			<a method="post" href="AbrirTorneoStatus.php" class="btn btn-primary ">Abrir Nuevo Torneo</a>
                 	 			<a method="post"  href="CerrarTorneo.php" class="btn btn-success ">Cerrar Torneo</a>		
                    		</div>
                  		</div>
		            </form>
		        </div>

		        <div class="tab-pane" id="03">
		        	<table width="550px" border="0">
		        		<tr>
				        	<td width="10%">
 							<form class="form-horizontal" action="ImprimirPlanillas.php?tanda=1" method="post" target="_blank">
							<button type="submit" id="boton03" class="btn btn-success">Tanda Jueves</button> 
				 			</form>
				        	
				        	</td>
				        	<td width="10%">
 							<form class="form-horizontal" action="ImprimirPlanillas.php?tanda=2" method="post" target="_blank">
							<button type="submit" id="boton03a" class="btn btn-primary">Tanda Viernes</button> 
				 			</form>
				        	</td>       	
				        </tr>
				    </table>
		        </div>

		        <div class="tab-pane" id="04">
		        	<table width="550px" border="0">
		        		<tr>
				        	<td width="10%">
 							<form class="form-horizontal" action="CargarIndividual.php" method="post">
							<button type="submit" id="boton04" class="btn btn-success">Cargar el Jugador/a</button> 
				 			</form>
				        	
				        	</td>
				        	<td width="10%">
 							<form class="form-horizontal" action="CargarLineasIndividual.php" method="post">
							<button type="submit" id="boton04a" class="btn btn-primary">Cargar Lineas Jugadas</button> 
				 			</form>
				        	</td>

				        	</td>
				        	<td width="10%">
 							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton04b" class="btn btn-danger">Modificar Lineas Jugadas</button> 
				 			</form>
				        	</td>        			        	
				        </tr>
				    </table>
		        </div>

		        <div class="tab-pane" id="05">
		        	<table width="500px" border="0">
		        		<tr>
				        	<td width="10%">
 							<form class="form-horizontal" action="CargarParejas.php" method="post">
							<button type="submit" id="boton05" class="btn btn-success">Cargar Los Equipo</button> 
				 			</form>
		 		        	
				        	</td>
				        	<td width="10%">
 							<form class="form-horizontal" action="CargarLineasParejas.php" method="post">
							<button type="submit" id="boton05a" class="btn btn-primary">Cargar Las Lineas</button> 
				 			</form>
				        	</td>

				        	</td>
				        	<td width="10%">
 							<form class="form-horizontal" action="ModificarLineasParejas.php" method="post">
							<button type="submit" id="boton05b" class="btn btn-danger">Modificar Las Lineas</button> 
				 			</form>
				        	</td>        			        	
				        </tr>
				    </table>
		        </div>

		        <div class="tab-pane" id="06">
		        	<table width="500px" border="0">
		        		<tr>
				        	<td width="10%">
 							<form class="form-horizontal" action="CargarTernas.php" method="post">
							<button type="submit" id="boton06" class="btn btn-success">Cargar Los Equipos</button> 
				 			</form>
				        	</td> 			        	
				        	<td width="10%">
							<form class="form-horizontal" action="CargarLineasTernas.php" method="post">
							<button type="submit" id="boton06a" class="btn btn-primary">Cargar Las Lineas</button> 
							</form>	  
				        	</td>

			        		<td width="10%">
							<form class="form-horizontal" action="ModificarLineasTernas.php" method="post">
							<button type="submit" id="boton06b" class="btn btn-danger">Modificar Las Lineas</button> 
							</form> 
					        </td>

			    		</tr>	
			    	</table>		        
				</div>

		        <div class="tab-pane" id="07">
		        	<table width="500px" border="0">
		        		<tr>
				        	<td width="10%">
 							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton07" class="btn btn-success">Cargar Los Equipos</button> 
				 			</form>
				        	</td> 			        	
				        	<td width="10%">
							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton07a" class="btn btn-primary">Cargar Las Lineas</button> 
							</form>	  
				        	</td>

			        		<td width="10%">
							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton07b" class="btn btn-danger">Modificar Las Lineas</button> 
							</form> 
					        </td>

			    		</tr>	
			    	</table>		        
				</div> 

		        <div class="tab-pane" id="08">
		        	<table width="500px" border="0">
		        		<tr>
				        	<td width="10%">
 							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton08" class="btn btn-success">Cargar Los Equipos</button> 
				 			</form>
				        	</td> 			        	
				        	<td width="10%">
							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton08a" class="btn btn-primary">Cargar Las Lineas</button> 
							</form>	  
				        	</td>

			        		<td width="10%">
							<form class="form-horizontal" action="#" method="post">
							<button type="submit" id="boton08b" class="btn btn-danger">Modificar Las Lineas</button> 
							</form> 
					        </td>

			    		</tr>	
			    	</table>		        
				</div>

 		        

			</div>
		</div>
	</div>
</div>

<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->
<script>
function verificarPasswords() {

    pass1 = document.getElementById('tipotorneo');
 
    // Verificamos si las constraseñas no coinciden 
    if (pass1.value == 0 ) 
    { 
        document.getElementById("boton03").disabled = true; 
        document.getElementById("boton03a").disabled = true; 

        document.getElementById("boton04").disabled = true; 
        document.getElementById("boton04a").disabled = true; 
        document.getElementById("boton04b").disabled = true;   
        document.getElementById("boton04").style.background = "green"; 
        document.getElementById("boton04a").style.background = "blue";    
        document.getElementById("boton04b").style.background = "red";

        document.getElementById("boton05").disabled = true; 
        document.getElementById("boton05a").disabled = true; 
        document.getElementById("boton05b").disabled = true;   
        document.getElementById("boton05").style.background = "green"; 
        document.getElementById("boton05a").style.background = "blue";    
        document.getElementById("boton05b").style.background = "red"; 

        document.getElementById("boton06").disabled = true; 
        document.getElementById("boton06a").disabled = true; 
        document.getElementById("boton06b").disabled = true;   
        document.getElementById("boton06").style.background = "green"; 
        document.getElementById("boton06a").style.background = "blue";    
        document.getElementById("boton06b").style.background = "red"; 

        document.getElementById("boton07").disabled = true; 
        document.getElementById("boton07a").disabled = true; 
        document.getElementById("boton07b").disabled = true;   
        document.getElementById("boton07").style.background = "green"; 
        document.getElementById("boton07a").style.background = "blue";    
        document.getElementById("boton07b").style.background = "red";  

        document.getElementById("boton08").disabled = true; 
        document.getElementById("boton08a").disabled = true;
        document.getElementById("boton08b").disabled = true;     
        document.getElementById("boton08").style.background = "green"; 
        document.getElementById("boton08a").style.background = "blue";
        document.getElementById("boton08b").style.background = "red";    	
	}
    
    if (pass1.value == 1 ) 
    {             

        document.getElementById("boton05").disabled = true; 
        document.getElementById("boton05a").disabled = true; 
        document.getElementById("boton05b").disabled = true;   
        document.getElementById("boton05").style.background = "green"; 
        document.getElementById("boton05a").style.background = "blue";    
        document.getElementById("boton05b").style.background = "red"; 

        document.getElementById("boton06").disabled = true; 
        document.getElementById("boton06a").disabled = true; 
        document.getElementById("boton06b").disabled = true;   
        document.getElementById("boton06").style.background = "green"; 
        document.getElementById("boton06a").style.background = "blue";    
        document.getElementById("boton06b").style.background = "red"; 

        document.getElementById("boton07").disabled = true; 
        document.getElementById("boton07a").disabled = true; 
        document.getElementById("boton07b").disabled = true;   
        document.getElementById("boton07").style.background = "green"; 
        document.getElementById("boton07a").style.background = "blue";    
        document.getElementById("boton07b").style.background = "red";  

        document.getElementById("boton08").disabled = true; 
        document.getElementById("boton08a").disabled = true;
        document.getElementById("boton08b").disabled = true;     
        document.getElementById("boton08").style.background = "green"; 
        document.getElementById("boton08a").style.background = "blue";
        document.getElementById("boton08b").style.background = "red";     
    } 

    if (pass1.value == 2 ) 
    {             

        document.getElementById("boton04").disabled = true; 
        document.getElementById("boton04a").disabled = true; 
        document.getElementById("boton04b").disabled = true;   
        document.getElementById("boton04").style.background = "green"; 
        document.getElementById("boton04a").style.background = "blue";    
        document.getElementById("boton04b").style.background = "red"; 

        document.getElementById("boton06").disabled = true; 
        document.getElementById("boton06a").disabled = true; 
        document.getElementById("boton06b").disabled = true;   
        document.getElementById("boton06").style.background = "green"; 
        document.getElementById("boton06a").style.background = "blue";    
        document.getElementById("boton06b").style.background = "red"; 

        document.getElementById("boton07").disabled = true; 
        document.getElementById("boton07a").disabled = true; 
        document.getElementById("boton07b").disabled = true;   
        document.getElementById("boton07").style.background = "green"; 
        document.getElementById("boton07a").style.background = "blue";    
        document.getElementById("boton07b").style.background = "red";  

        document.getElementById("boton08").disabled = true; 
        document.getElementById("boton08a").disabled = true;
        document.getElementById("boton08b").disabled = true;     
        document.getElementById("boton08").style.background = "green"; 
        document.getElementById("boton08a").style.background = "blue";
        document.getElementById("boton08b").style.background = "red";     
    }

    if (pass1.value == 3 ) 
    { 
        document.getElementById("boton04").disabled = true; 
        document.getElementById("boton04a").disabled = true; 
        document.getElementById("boton04b").disabled = true;   
        document.getElementById("boton04").style.background = "green"; 
        document.getElementById("boton04a").style.background = "blue";    
        document.getElementById("boton04b").style.background = "red";                 

        document.getElementById("boton05").disabled = true; 
        document.getElementById("boton05a").disabled = true; 
        document.getElementById("boton05b").disabled = true;   
        document.getElementById("boton05").style.background = "green"; 
        document.getElementById("boton05a").style.background = "blue";    
        document.getElementById("boton05b").style.background = "red"; 

        document.getElementById("boton07").disabled = true; 
        document.getElementById("boton07a").disabled = true; 
        document.getElementById("boton07b").disabled = true;   
        document.getElementById("boton07").style.background = "green"; 
        document.getElementById("boton07a").style.background = "blue";    
        document.getElementById("boton07b").style.background = "red";  

        document.getElementById("boton08").disabled = true; 
        document.getElementById("boton08a").disabled = true;
        document.getElementById("boton08b").disabled = true;     
        document.getElementById("boton08").style.background = "green"; 
        document.getElementById("boton08a").style.background = "blue";
        document.getElementById("boton08b").style.background = "red";     
    }    

    if (pass1.value == 4 ) 
    { 
        document.getElementById("boton04").disabled = true; 
        document.getElementById("boton04a").disabled = true; 
        document.getElementById("boton04b").disabled = true;   
        document.getElementById("boton04").style.background = "green"; 
        document.getElementById("boton04a").style.background = "blue";    
        document.getElementById("boton04b").style.background = "red";                 

        document.getElementById("boton05").disabled = true; 
        document.getElementById("boton05a").disabled = true; 
        document.getElementById("boton05b").disabled = true;   
        document.getElementById("boton05").style.background = "green"; 
        document.getElementById("boton05a").style.background = "blue";    
        document.getElementById("boton05b").style.background = "red"; 

        document.getElementById("boton06").disabled = true; 
        document.getElementById("boton06a").disabled = true; 
        document.getElementById("boton06b").disabled = true;   
        document.getElementById("boton06").style.background = "green"; 
        document.getElementById("boton06a").style.background = "blue";    
        document.getElementById("boton06b").style.background = "red";  

        document.getElementById("boton08").disabled = true; 
        document.getElementById("boton08a").disabled = true;
        document.getElementById("boton08b").disabled = true;     
        document.getElementById("boton08").style.background = "green"; 
        document.getElementById("boton08a").style.background = "blue";
        document.getElementById("boton08b").style.background = "red";     
    } 

    if (pass1.value == 5 ) 
    {        
        document.getElementById("boton04").disabled = true; 
        document.getElementById("boton04a").disabled = true;
        document.getElementById("boton04b").disabled = true;     

        document.getElementById("boton04").style.background = "green"; 
        document.getElementById("boton04a").style.background = "blue";
        document.getElementById("boton04b").style.background = "red";        

        document.getElementById("boton05").disabled = true; 
        document.getElementById("boton05a").disabled = true; 
        document.getElementById("boton05b").disabled = true;   
        document.getElementById("boton05").style.background = "green"; 
        document.getElementById("boton05a").style.background = "blue";    
        document.getElementById("boton05b").style.background = "red"; 

        document.getElementById("boton06").disabled = true; 
        document.getElementById("boton06a").disabled = true; 
        document.getElementById("boton06b").disabled = true;   
        document.getElementById("boton06").style.background = "green"; 
        document.getElementById("boton06a").style.background = "blue";    
        document.getElementById("boton06b").style.background = "red"; 

        document.getElementById("boton07").disabled = true; 
        document.getElementById("boton07a").disabled = true; 
        document.getElementById("boton07b").disabled = true;   
        document.getElementById("boton07").style.background = "green"; 
        document.getElementById("boton07a").style.background = "blue";    
        document.getElementById("boton07b").style.background = "red";                     
    }    

}
</script>
 
 


<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

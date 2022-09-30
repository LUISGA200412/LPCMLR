<?php
	include ("conexion.php");

	$sql1 = "SELECT * FROM torneo order by idtorneo DESC LIMIT 1";
	$resultado1 = $mysqli->query($sql1);
	while($rows1 = $resultado1->fetch_assoc())
	{
		$tipotorneo = $rows1['tipo_torneo'];
		$nombre 	= $rows1['nombre_torneo'];		
	}
	
	if ($tipotorneo ==1) 
	{
		$nombretiptorneo ="Individual";
		$programa = "#";

	}
	if ($tipotorneo ==2) 
	{
		$nombretiptorneo ="Parejas";
		$programa = "Parejas.php";
	 
	}	
	if ($tipotorneo ==3) 
	{
		$nombretiptorneo ="Ternas";
		$programa = "Ternas.php";
	}
	if ($tipotorneo ==4) 
	{
		$nombretiptorneo ="Cuartas";
		$programa = "Cuartas.php";
	}
	if ($tipotorneo ==5) 
	{
		$nombretiptorneo ="Quintas";
		$programa = "Quintas.php";
	}
?>

<header class="main-header">

    
    <a href="index1.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels   -->
    <span class="logo-mini"> <img src="img/LPCMLR50X50.png" /></span>     
     
      <span class="logo-lg">
      	<h4><b>Liga Picapiedras Circulo Militar la Rinconada</b></h4></span>
    </a> 

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><b> Abrir/Cerrar Navegador </b>
      </a>
 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
	<!-- 		<li class="user-footer">      
               	<div class="pull-right">
                 	 <a href="index.php" method="post" class="btn btn-warning">Principal</a>
                </div>
            </li>
	-->
			<li class="user-footer">      
               	<div class="pull-right">
                 	 <a href="register.php" method="post" class="btn btn-primary btn-block btn-circle btn-success">Registrate</a>
                </div>
            </li> 
          
            <li class="user-footer">  
             	<div class="pull-right">
                 	 <a href="login.php" class="btn btn-primary btn-block btn-circle">Iniciar Sesión</a>
                </div>
 
            </li>
 
        </ul>

      </div>
    </nav>
</header>



<!-- INICIO DEL MENU -->  
<aside class="main-sidebar">
	<section class="sidebar">
	
	<ul class="sidebar-menu">
        <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-hand-right
			"></i> <span>Conocenos</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
          	<ul class="treeview-menu">
            	<li><a href="Directivos.php"><i class="fa  fa-list"></i> Directivos</a> 
            	</li>
            	<li><a href="ConsultaClubs.php?cara=5&clu=4&nom=Picapiedras"><i class="fa  fa-list"></i> Nuestros Jugadores</a> 
            	</li>
            	
          	</ul>
        </li>
	</ul>

	<ul class="sidebar-menu">       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Documentos</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="Reglamentos.php"><i class="fa fa-circle-o"></i> Reglamentos del Club</a></li>            
            <li><a href="Reglamentosfvb.php"><i class="fa fa-circle-o"></i> Reglamentos de la FVB</a></li>
            <li><a href="Estatustosfvb2012.php"><i class="fa fa-circle-o"></i> Estatutos de la FVB(2012)</a></li>

          </ul>
        </li>
	</ul>


	<ul class="sidebar-menu">  
		<li class="treeview">
        	<a href="#">
        	<i class="glyphicon glyphicon-folder-open"> 
        	</i> 
        	<span>Torneo Sabatino</span>
        	<i class="fa fa-angle-left pull-right"> 
        	</i>
        	</a>

        <?php 

        if ($tipotorneo ==1) 
        {
			echo "<ul class='treeview-menu'>
           	<li><a href='#'>
           	<i class='fa fa-circle-o'>
           	</i> Individual Masculino</a>
           	</li>
            <li><a href='#'>
            <i class='fa fa-circle-o'>
            </i> Individual Femenino</a>
            </li>
         	</ul>";
        	
        }
        else
        {
        	echo "<ul class='treeview-menu'>
          	<li><a href = '#'>
          	<i class='fa fa-circle-o'>
          	</i>$nombretiptorneo</a>
          	</li>     
           	<li><a href='#'>
           	<i class='fa fa-circle-o'>
           	</i> Individual Masculino</a>
           	</li>
            <li><a href='#'>
            <i class='fa fa-circle-o'>
            </i> Individual Femenino</a>
            </li>
         	</ul>";        		
        }
 		?>
    	</li>
	</ul>  






	<ul class="sidebar-menu">  
		<li class="treeview">
        	<a href="#">
        	<i class="glyphicon glyphicon-folder-open"> 
        	</i> 
        	<span>Torneo LPCMLR</span>
        	<i class="fa fa-angle-left pull-right"> 
        	</i>
        	</a>

        <?php 

        if ($tipotorneo ==1) 
        {
			echo "<ul class='treeview-menu'>
           	<li><a href='IndividualMasculino.php'>
           	<i class='fa fa-circle-o'>
           	</i> Individual Masculino</a>
           	</li>
            <li><a href='IndividualFemenino.php'>
            <i class='fa fa-circle-o'>
            </i> Individual Femenino</a>
            </li>
         	</ul>";
        	
        }
        else
        {
        	echo "<ul class='treeview-menu'>
          	<li><a href = $programa>
          	<i class='fa fa-circle-o'>
          	</i>$nombretiptorneo</a>
          	</li>     
           	<li><a href='IndividualMasculino.php'>
           	<i class='fa fa-circle-o'>
           	</i> Individual Masculino</a>
           	</li>
            <li><a href='IndividualFemenino.php'>
            <i class='fa fa-circle-o'>
            </i> Individual Femenino</a>
            </li>
         	</ul>";        		
        }
 		?>
    	</li>
	</ul>  


	<ul class="sidebar-menu">
  
		<li class="treeview">
       		<a href="#"> 
       			<i class="glyphicon glyphicon-stats"> 
				</i> <span>Estadisticas</span>
           		<i class="fa fa-angle-left pull-right"> </i> 
           	</a>
       		<ul class="treeview-menu">
           		<li><a href="ClaveEstadisticas.php"><i class="fa fa-circle-o"></i> Torneos Jugados</a></li>
           
   
           		<li><a href="EstadisticasPaginaMarco.php?tipo=1"><i class="fa fa-circle-o"></i> Individuales Masculino</a></li>
      
           
           		<li><a href="EstadisticasPaginaMarco.php?tipo=2"><i class="fa fa-circle-o"></i> Individuales Femenino</a></li>
                           
         
           		<li><a href="EstadisticasPaginaMarco.php?tipo=3"><i class="fa fa-circle-o"></i> Parejas</a></li>
                           
      
           		<li><a href="EstadisticasPaginaMarco.php?tipo=4"><i class="fa fa-circle-o"></i> Ternas</a></li>
          
            
           		<li><a href="EstadisticasPaginaMarco.php?tipo=5"><i class="fa fa-circle-o"></i> Cuartas</a></li>
        
           
           		<li><a href="EstadisticasPaginaMarco.php?tipo=6"><i class="fa fa-circle-o"></i> Quintas</a></li>
           
           
           		<li><a href="EstadisticasMejorSerie.php"><i class="fa fa-circle-o"></i>Mejores Series Individuales</a></li>
            
            
           		<li><a href="EstadisticasMejorLinea.php"><i class="fa fa-circle-o"></i>
           		 Mejores Lineas Individuales</a></li>
            </ul>
             
		</li>
	</ul>   

 
	</section>
</aside>
<!-- FIN DEL MENU -->
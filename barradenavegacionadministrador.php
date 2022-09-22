<header class="main-header">
    <!-- Logo -->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="fa  fa-hand-o-left  btn-sm btn-success" data-toggle="offcanvas" role="button" >
        <span class="sr-only">Toggle navigation</span>
      </a>

<!--
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          	<li class="user-footer">      
               	<div class="pull-right">
                 	 <a href="Registrate.php" method="post" class="btn btn-primary btn-block btn-circle btn-success">Registrate</a>
                </div>
            </li>
            &nbsp&nbsp&nbsp&nbsp    

            <li class="user-footer">  
             	<div class="pull-right">
                 	 <a href="login.php" class="btn btn-primary btn-block btn-circle">Iniciar Sección</a>

                </div>
            &nbsp&nbsp&nbsp&nbsp    

            </li>
            &nbsp&nbsp&nbsp&nbsp    


        </ul>

      </div>
-->
      
      <div align="center" b>
     <table style="margin-left:150px;width: 700px; ">
    		<tr>
    			<td>
 	<!--				<a href="index.php"><img src="img/escudopagina.png" /></a>-->
				</td>
				<td>
					<h2 class="text-green">
		  			Liga Picapiedras CMLR
 <!--           		<p style="font-size:11px; margin-left:360px;margin-top:1px; color:#FFFFFF"	>
                		Fundada el 10 Septiembre de 1953   
            		</p>-->
    			</td>
    		</tr>       
    	</table>


    </nav>

  </header>


<!-- INICIO DEL MENU -->  
  <aside class="main-sidebar">
    <section class="sidebar">
<!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
-->      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menú de Navegación</li> 
<!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="calendario.php">
            <i ></i> <span>Calendario</span>
            <small class="label pull-right bg-red">3</small>
          </a>
        </li>
-->        
		
<ul class="sidebar-menu">
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Modúlo Jugadores</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">            
            <li><a href="IncluirJugador.php"><i class="fa fa-circle-o"></i> Incluir Jugador</a></li>
            <li><a href="ActualizaJugadores.php"><i class="fa fa-circle-o"></i> Actualizar Jugadores</a></li>
           </ul>
       </li>

	   <li class="treeview">
       	   <a href="#">
            <i class="fa fa-book"></i> <span>Modúlo Individual</span>
            <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">            
            <li><a href="IncluirLineasJugadasIndividual.php"><i class="fa fa-circle-o"></i> Cargar Líneas</a></li>            
           </ul>
       </li>
       <li class="treeview">
       	   <a href="#">
            <i class="fa fa-book"></i> <span>Modúlo Todo Evento</span>
            <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">            
            <li><a 
           href="IncluirLineasJugadasTodoEvento.php"><i class="fa fa-circle-o"></i> Cargar Líneas</a></li>            
           </ul>
       </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Modúlo Equipos</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">            
            <li><a href="CargarEquipoMasculino.php"><i class="fa fa-circle-o"></i> Crear Equipo Masculino</a></li>
            <li><a href="CargarJugadoresEquipoMasculino.php"><i class="fa fa-circle-o"></i> Cargar Jugadores Masculinos</a></li>           
            <li><a href="IncluirLineasJugadasParejasMas.php"><i class="fa fa-circle-o"></i> Cargar Lineas Masculinas</a></li>           
            <li><a href="CargarEquipoFemenino.php"><i class="fa fa-circle-o"></i> Crear Equipo Femenino</a></li> 
            <li><a href="CargarJugadoresEquipoFemenino.php"><i class="fa fa-circle-o"></i> Cargar Jugadora Femenina</a></li>           
            <li><a href="IncluirLineasJugadasParejasFem.php"><i class="fa fa-circle-o"></i> Cargar Lineas Femenina</a></li>
           </ul>
       </li>
       <li class="treeview">
       	   <a href="#">
            <i class="fa fa-book"></i> <span>Modúlo Torneo</span>
            <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">            
            <li><a href="ClasificatorioCategoriaStatus.php"><i class="fa fa-circle-o"></i> Abrir Un Torneo</a></li>
            <li><a href="ImprimirPlanillas.php"><i class="fa fa-circle-o"></i> Imprimir Planillas</a></li>
            <li><a href="CerrarClasificatorio.php"><i class="fa fa-circle-o"></i> Cerrar el Torneo</a></li>
           </ul>
       </li> 

</ul>
      
    </section>
  </aside>
<!-- FIN DEL MENU -->

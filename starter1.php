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

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.css">

<!-- skins  -->
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  
<link rel="stylesheet" href="css/misestilos.css">
<link rel="stylesheet" href="css/acordeon.css">

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

<body class="hold-transition skin-blue">
	
	<div style="text-align:center">
		AQUI SE PUEDE PONER LO QUE SE QUIERA
	</div>

<div class="wrapper">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION -->

	<div> 
	 	<?php
		include("barradenavegacion.php");
		?>
	</div>

<!-- AQUI FINALIZA BARRA DE NAVEGACION -->

  	<span class="ir-arriba fa  fa-arrow-up"></span>

	<div class="content-wrapper">

		<section class="content-header">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

	<div style="text-align:center">
			hola
	</div>

<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

	    </section> <!--content-header-->
	</div> <!--content-wrapper-->

<!-- Main Footer -->
	<div style="text-align:center">
		<?php
		include("Footer.php");
		?>
	</div>
<!-- Main Footer -->

</div> <!--wrapper-->
 
<!-- NO SE DEBE PONER MAS CODIGO -->
 

  
<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="acordeon.js"></script>
<script src="arriba.js"></script>

</body>
</html>
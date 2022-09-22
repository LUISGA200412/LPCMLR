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

  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- iCheck 
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css"> -->

  <!-- Morris chart 
  <link rel="stylesheet" href="plugins/morris/morris.css">
  -->

  <!-- jvectormap 
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->

  <!-- Date Picker 
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> -->

  <!-- bootstrap wysihtml5 - text editor 
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
  
  
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

<body class="hold-transition skin-blue sidebar-mini">
 

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
	<?php
	include("barradenavegacion.php");
	?>
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
	<div class="content-wrapper">
		<section class="content">

    <table id="example1" class="table table-bordered table-striped">
      
      <tr>
       
          <td  align="center" colspan="5">
              Junta Directiva
              <br><br>
          </td>
      </tr>
      <tr>    
          <td valign="top" align="center">          
          <?php
            include ("DirectivoPresidente.php"); 
          ?>
          </td>
      
          <td valign="top" align="center">          
          <?php
            include ("DirectivoVicePresidente.php"); 
          ?> 
          </td>
      
          <td valign="top" align="center">          
          <?php
            include ("DirectivoSecretario.php"); 
          ?> 
          </td>
      
          <td valign="top" align="center">          
          <?php
            include ("DirectivoTesorero.php"); 
          ?>  
          </td>
      
        <td valign="top" align="center">          
          <?php
            include ("DirectivoVocal.php"); 
          ?>  
          </td>
      </tr>   
      
      
      <tr>
       
          <td class="black" align="center" colspan="5">
              Consejo Contralor
              <br><br>
          </td>
      </tr>
      <tr>    
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
      
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      </tr>   
      
      <tr>
       
          <td class="black" align="center" colspan="5">
              Consejo De Honor
              <br><br>        
          </td>
      </tr>
      <tr>    
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
        <td valign="top" align="center">          
       
          </td>
      </tr>   
      
      </table>
<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

	    </section>
	</div>

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
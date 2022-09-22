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

<style>

.ocultar {
    display: none;
}
 
.mostrar {
    display: block;
}
</style>


<style>

div.margen {
  margin-top:5px;  
}
h2{
	text-align:center;
}
</style>

</head>
<body>
 
 

   
<?php
include("conexion.php");
?>


 
<form name="miformulario" onsubmit="verificarPasswords(); return false" action="PerfilAdministrador.php" method="POST">

<table border="0" width="500px" style="margin-left:300px">
<tr>
		<td colspan="3">
			<!-- Mensajes de Verificación -->

<div id="msg"></div>
<div id="error" class="alert alert-danger ocultar" role="alert">
    Debe seleccionar la Liga, vuelve a intentar !
</div>
 
<!-- Fin Mensajes de Verificación -->
		</td>
	</tr>

	<tr>
		<td align="center">
        <select name="jugador01" id="selec1" >  

                <option   value="">Seleccione La Liga</option> 
                    
                    <option value="1.Liga Picapiedras CMLR">Liga Picapiedras CMLR</option>';
                    <option value="2.Liga Sabatina">Liga Sabatina</option>';	            
			</select>
 		</td>
        <tr>   
        <td align="center">
            <br>
        <button type="submit" id="login" class="btn btn-primary ">Incluir</button>
        </td>
        </tr>
	</tr>

	
</table>
<input type="hidden" name="liga" value="<?php echo $idtorneo; ?> "> 
</form>
 
<script>
function verificarPasswords() {

    // Ontenemos los valores de los campos de contraseñas 


    pass1 = document.getElementById('selec1');
 
    // Verificamos si las constraseñas no coinciden 
    if (pass1.value == '') 
    {

        // Si las constraseñas no coinciden mostramos un mensaje 
        document.getElementById("error").classList.add("mostrar");
 
        return false;
    } 

    /* Verificamos si las constraseñas no coinciden 
    if (pass1.value == '1') 
    {
    
         location.href ='PerfilAdministrador.php;
    }
    else
    {
        location.href ='PerfilAdministrador.php ;
    }*/

        // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");

  

    document.miformulario.submit();

return true;

 

    
    

}
</script>


</body>
</html>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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

<style>

div.margin {
  margin-top:25px;
}
h2{
	text-align:center;
}
</style>

<style>

.ocultar {
    display: none;
}
 
.mostrar {
    display: block;
}
</style>

</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<?php
	include ("conexion.php"); 

//print_r($_GET);

	$cedula    = $_GET['cedula'];
	$password   = $_GET['password'];
 

 	$sql="SELECT * FROM jugadores_lpcmlr WHERE 
	ced_jugador = '$cedula' ";
 	$result=mysqli_query($mysqli,$sql);
	while($mostrar=mysqli_fetch_array($result))
 	{
 		$nombre = utf8_decode($mostrar['nombre_jugador']);
  		$foto 	= $mostrar['fotojugador'];
 	}	

?>

<!-- Mensajes de Verificación -->

<div id="msg"></div>
<div id="error" class="alert alert-danger ocultar" role="alert">
    Las Contraseñas ..... son diferentes CORRIJA
</div>
<div id="error1" class="alert alert-danger ocultar" role="alert">
   Password ........ Vacio CORRIJA
</div>
<div id="ok" class="alert alert-success ocultar" role="alert">
    Las Contraseñas coinciden ! (Procesando formulario ... )
 </div>

<!-- Fin Mensajes de Verificación --> 
<div class="register-box margen">
  <h2>
    <a href="index1.php"><b>Liga Picapiedras CMLR</b></a>
  </h2>
  
  <h2>
  	<?php
  		echo $nombre;
  	?>
  </h2>
 

   <div>
     	<div>
		<?php

	echo '<img class="profile-user-img img-responsive img-circle"
	src = "data:image/png;base64,' . base64_encode($foto) . '" alt="User Image">';
		?>
		</div>
   </div>



   <br>

 <div class="register-box-body">
 <form name="miformulario" onsubmit="verificarPasswords(); return false" action="PerfilAdministrador.php" method="post">    	

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password"   id="pass1" value="<?php echo $pass = trim($password); ?> " readonly>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
   	    <br>
          <button type="submit"  class="btn btn-primary pull-right">Ingresar</button>
   	    <br>
        </div>
 
  
    </form>
</div>




<script>

function verificarPasswords() 
{
    pass1 = document.getElementById('pass1');
    pass2 = document.getElementById('pass2');
 
     if (pass1.value =="" )
     {
        document.getElementById("error").classList.remove("mostrar");
     	document.getElementById("error1").classList.add("mostrar");
        return false;
     }

// Verificamos si las constraseñas no coinciden 

    if (pass1.value != pass2.value) 
    {
        document.getElementById("error1").classList.remove("mostrar");
        document.getElementById("error").classList.add("mostrar");
        return false;
    }
    else
    {
       // Si las contraseñas coinciden ocultamos el mensaje de error
        //document.getElementById("error").classList.remove("mostrar");
        //document.getElementById("error1").classList.remove("mostrar");
		document.miformulario.submit();
        return true;  
    }
}

</script>

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>

div.margen {
  margin-top:5px;  
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

<body class="hold-transition register-page">

<div id="msg"></div>
 
<!-- Mensajes de Verificación -->
<div id="error1" class="alert alert-danger ocultar" role="alert">
    Password vacio, vuelve a intentar !
</div>
<div id="error" class="alert alert-danger ocultar" role="alert">
    Las Contraseñas no coinciden, vuelve a intentar !
</div>
<div id="ok" class="alert alert-success ocultar" role="alert">
    Las Contraseñas coinciden ! (Procesando formulario ... )
 </div>
<!-- Fin Mensajes de Verificación -->



<div class="register-box margen">
	<div>
	  <h2>
	    <a href="PerfilAdministrador.php"><b>Liga Picapiedras CMLR</b><br>
	    Modúlo de Administradores<br>
	    Regresar al Menu Anterior</a>
	  </h2>
	</div>

  <div class="register-box-body">
    <p class="login-box-msg">Incluir Un Nuevo Miembro</p>

     <!--<form action="ValidaRegistro.php" method="post">-->
<form name="miformulario" onsubmit="verificarPasswords(); return false" action="ValidaRegistro.php" method="post">    	
      <div class="form-group has-feedback">
        <input type="number" id="cedula" class="form-control" placeholder="Cédula Identidad"min="1" max="9999999999" name="cedula" 
        onfocusout="myFunction()"
         required>
        <span class="glyphicon fa  fa-credit-card form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre Completo" name="nombre" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
      
        <input type="number" class="form-control"  name="sexo" min="1" max="2"
        placeholder="Sexo 1=Mas 2=Fem" required>
       	<span class="glyphicon glyphicon-heart
 		form-control-feedback"></span>
      </div>

<!--      <div class="form-group has-feedback">
      	Fecha de Nacimiento
        <input type="date" class="form-control" name="fechanac" required>
        	
      </div>
-->
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Password" name="pass1" id="pass1">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Confirme Password" name="pass2" id="pass2">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
<!--        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" checked> Accepto <a href="#">Los Terminos</a>
            </label>
          </div>
        </div>
        </div>
-->        
        <!-- /.col -->

        <div class="form-group"  >
          <button type="submit" id="login" class="btn btn-warning pull-right">Incluir</button>
        </div>
 
<!--         <div class="form-group has-feedback" >
    <a class="btn btn-primary btn-block btn-flat" href="login.php" class="form-control">Ya Poseo Una Cuenta
    </a></div>
-->      
      </div>
    </form>
  <!--
    <div class="social-auth-links text-center">
      <p>- O -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
 /.col -->

  </div>
  <!-- /.form-box -->
</div>




 
<script>

function verificarPasswords() {

    // Ontenemos los valores de los campos de contraseñas 
    pass1 = document.getElementById('pass1');
    pass2 = document.getElementById('pass2');
    cedula = document.getElementById('cedula');

     if (pass1.value == "" )
     {


     	document.getElementById("error1").classList.add("mostrar");
        return false;
     }
     
     if (pass2.value == "" )
     {
 
     	document.getElementById("error1").classList.add("mostrar");
        return false;
     }



    // Verificamos si las constraseñas no coinciden 
    if (pass1.value != pass2.value) {

        // Si las constraseñas no coinciden mostramos un mensaje 
        document.getElementById("error").classList.add("mostrar");

        return false;
    } else {

        // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");

        // Mostramos un mensaje mencionando que las Contraseñas coinciden 
        document.getElementById("ok").classList.remove("ocultar");

        // Desabilitamos el botón de login 
        document.getElementById("login").disabled = true;

        // Refrescamos la página (Simulación de envío del formulario) 
    //  location.href ='ValidaRegistro.php' method='post';

        setTimeout(function() {
           location.reload();
        }, 9000);

document.miformulario.submit();

        return true;
    }

}

</script>

<script>
function myFunction() {

document.getElementById("buscaced").style.background = "red";	
  var x = document.getElementById("buscaced");
  x.value = x.value;

}
</script>
 

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>


</body>
</html>

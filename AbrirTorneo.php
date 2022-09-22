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
<script type="text/javascript">
    function verificaRadios(form){
        marcado=false;
        for ( var i = 0; i < form.categoria.length; i++ ) {
            if (form.categoria[i].checked)
                marcado = true;
        }

        if(!marcado){
            alert("Por favor, debe elegir una opción!");
            return false;
        }
        else{
            return true;
        }
    }
    </script>

<style>

div.margen {
  margin-top:5px;
}
h2{
	text-align:center;
}
</style>

</head>
<body class="hold-transition login-page">

<div>
  <h2>
    <a     href="PerfilAdministrador.php"><b>Liga Picapiedras CMLR</b><br>
    Modúlo de Administradores<br>
    Regresar al Menu Anterior</a>
  </h2>
</div>

<div class="login-box margen">

  <!-- /.login-logo -->
  <div class="login-box-body"> 
    <p class="login-box-msg">Abrir Un Nuevo Torneo </p>

<!--<form method="post" onsubmit="return verificaRadios(this)">-->
<form method="post">
       
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre Torneo" required name="torneo">
        <span class="glyphicon  glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        Fecha Desde <input type="date"  placeholder="Fecha Desde" required name="fechadesde">
      </div>

      <div class="form-group has-feedback">
        Fecha Hasta <input type="date"  placeholder="Fecha Hasta" required name="fechahasta">
 
      </div> 

<!--      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Lineas Por Fecha" name="lineasporfecha" min="1" max="8" required >
        <span></span>
      </div> 
-->     
		
		<select name="BOLERA" id="selec" required>  

         <option value="">Seleccione Bolera:</option> 

        <?php
                include ("conexion.php");
	$sql = "SELECT * FROM bolera";
	$resultado = $mysqli->query($sql);
	while($mostrar = $resultado->fetch_assoc())
	{
		$a = $mostrar['idpais'];
        $b = $mostrar['idciudad'];
        $c = $mostrar['idbolera'];
        $d = $mostrar['nombre_bolera'];
        $eee = $a.".".$b.".".$c.".".$d;


        $ccc = $aaa.".".$bbb;      
        echo '<option  value="'.$eee.' ">'.$d.'</option>';
	}

        ?>

       </select> 
       <br><br>
       
        <select name="TIPOTORNEO" id="selec1" required>  

         <option value="">Modalidad del Torneo:</option> 
         <option value="1">Individual</option>
         <option value="2">Parejas</option>
         <option value="3">Ternas</option>
         <option value="4">Cuartas</option>
         <option value="5">Quintas</option>

       </select> 
       

 
    <div class="row">   
    	<br>   
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block pull-right">Abrir</button>
        </div>
    </div> 
    </form>
 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
  
  <?php
   
 

if (isset($_POST['submit']))
{
      //print_r($_POST);
    
	$cod          = $_POST["BOLERA"];
	$unmail       = explode(".", $cod); 
	$pais         = $unmail[0];
	$ciudad       = $unmail[1];
	$bolera       = $unmail[2];
	$nombrebolera = $unmail[3];

    $NOMBRE = $_POST['torneo'];
    $FECHAD = $_POST['fechadesde'];
    $FECHAH = $_POST['fechahasta']; 

    $TIPOTORNEO         = $_POST["TIPOTORNEO"];
 
   // $LINEAS	 = $_POST['lineasporfecha']; 
				$sql = "
					insert into torneo
						(
							idpais,
							idciudad,
							idcategoria, 
							idsubcategoria, 
							idbolera,
							nombre_torneo, 
							fecha_torneo_desde,
							fecha_torneo_hasta,
							status_torneo,
							num_linea_fecha,
							tipo_torneo				
						) 
					values 
					(
						'$pais',
						'$ciudad',
						'0',
						'0',
						'$bolera',
						'$NOMBRE',
						'$FECHAD',
						'$FECHAH',
						'1',
						'0',
						'$TIPOTORNEO'
					)";
						

		if ($mysqli->query($sql) === TRUE) 
		{
		  echo "<script>
			alert('Torneo Generado con Exito');
			location.href ='PerfilAdministrador.php';
			</script>";

		}
		else
		{
			echo "<script> 
			alert('Error: $sql  $mysqli->error');
			location.href ='PerfilAdministrador.php';
			</script>";
		}
}



?> 

</body>
</html>

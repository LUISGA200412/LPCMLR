<!--Author: Obed Alvarado
Author URL: http://obedalvarado.pw
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Como Enviar un correo electrónico desde Localhost con PHP | Sistemas Web</title>
<!-- Custom Theme files -->
<link href="css/stylemail.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="" />
<!--Google Fonts
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,700italic,400,300,700' rel='stylesheet' type='text/css'> -->
<!--Google Fonts-->
 
</head>
<body >
<!--<div >
  <h1>
    <a href="index.php"><b>Liga Picapiedras CMLR</b></a>
  </h1>
</div>-->

    <?php
   
             //  print_r($_GET);

  //    if (isset($_POST['send'])){
      	include("conexion.php");   
        include("sendemail.php");
 
        $header     = $_GET['email'];
        $from_name  = $_GET['nombre'];
        $d  		= $_GET['d'];

        //$cedula 	= $_GET['cedula'];

		//  $d=mt_rand(123456,999999);
		  //echo $d ;
 	
/*		$sql = "SELECT count(*) as EXISTE FROM jugadores_lpcmlr where 
		ced_jugador = '$cedula'   ";
		$result=mysqli_query($mysqli,$sql);
		while($mostrar=mysqli_fetch_array($result))
		{ 
			$EXISTE = $mostrar['EXISTE'];
		}

		if (empty($EXISTE)) {
			/*echo "<script> alert('Correo $header / $cedula Invalido o NO EXISTEN');
			location.href ='CambiaPassword.php';
			</script>";*/
//			echo "Cédula $cedula Invalido o NO EXISTE";
//		}
//else
//{	
/*
		  $sql1="UPDATE `jugadores_lpcmlr` SET `password`= $d WHERE ced_jugador = '$cedula' ";

				if ($mysqli->query($sql1) === FALSE) 
				{
			
			  	echo "Error: " . $sql1 . "<br>" . $mysqli->error;
				}
 */
//$from_name = "luisgomez";
$from_email = $header;
$header = "De: $from_name <$from_email>";
$body = "
Estimado Cliente: <b>$from_name</b>

Le informamos, que su Nuevo Password es: <b>$d</b>


Comunicamos que la dirección a través de la cual usted está recibiendo el presente e-mail será utilizada únicamente para el servicio de notificaciones, le agradecemos no responder este correo ni utilizarlo como vía de comunicación para realizar consultas personales

Gracias";

$subject = "CAMBIO DE PASSWORD";
$to = "luisegd160354@gmail.com"; 
 
          if (mail($to, $subject, $body, $header)) 
          {
            /*echo  "<p align='center' style='color:green'>Su Nuevo Password fue Enviado a su Correo</p>";*/
			echo "<script> alert('Su Nuevo Password fue Enviado a su Correo ==> $from_email');
			location.href ='index.php';
			</script>";          
          } 
          else 
          {
            echo "<p align='center' style='color:red'> No se pudo enviar el Correo.. </p>";
            echo "<p align='center' style='color:red'> Error de correo : $mail->ErrorInfo </p>"; 
          }       
 
          /*echo "<br>";
          echo "<p align='center' > <a href='index.php'>Regresar al Menu Anterior</a> </p>";
         */



        /*sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje*/

    //  }
 // }
    ?>
    <div >
  <h1>
    <a href="index.php"><b>Liga Picapiedras CMLR</b></a>
  </h1>
</div>
  <!-- </div>
  

  <div      class="enviar">
    <div class="contact-check">
      
    </div>
        <div class="contact-enviar">
      <input type="submit" value="Enviar mensaje" name="send">
      <br><br>
      <h2>
    	<a href="index.php"><b>	Regresar al Menu Anterior</b></a>
  		</h2>
      
    </div>
    <div class="clear"> </div>
    </form>
</div>
</div>
-->
       
 
</body>
</html>
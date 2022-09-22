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
<body>
<!--coact start here-->

<div class="contact">
  <div class="contact-main">
  <form method="post">
  
    <input type="email" placeholder="Tu Correo Electronico" class="hola"  name="customer_email" required />
    
  
    <input type="text" placeholder="Tu Nombre" class="hola"  name="customer_name" required />
  
    <input type="text" placeholder="Asunto" class="hola"  name="subject" required />

    <textarea  name="message" placeholder="Escriba su Mensaje Aqui ...." required /></textarea>
    <?php
   
             //  print_r($_GET);

      if (isset($_POST['send'])){
        include("sendemail.php");
        //Mando a llamar la funcion que se encarga de enviar el correo electronico
        
        /*Configuracion de variables para enviar el correo*/
        //$mail_username="luisegd3718@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
        //$mail_userpassword="LUISGA200412";//Tu contraseña de gmail
        //$mail_addAddress="luisegd160354@gmail.com";//correo electronico que recibira el mensaje
        //$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
        
        /*Inicio captura de datos enviados por $_POST para enviar el correo */
        $contacto   = $_GET['contacto'];
        $to         = $_GET['para'];
        $header     = $_POST['customer_email'];
        $from_name  = $_POST['customer_name'];
        $body       = $_POST['message'];
        $subject    = $_POST['subject'];
        
$from_name = "luisgomez";
$from_email = "luisegd160354@gmail.com";
$header = "From: $from_name <$from_email>";
//$body = "Hola, \nEsto es una prueba de correo de $from_name <$from_email>.";
//$subject = "Prueba de correo Sendmail";
$to = "luisegd160354@gmail.com"; 

          if (mail($to, $subject, $body, $header)) 
          {
            echo  "<p align='center' style='color:green'>Mensaje enviado a : $contacto </p>";
           
          } 
          else 
          {
            echo "<p align='center' style='color:red'> No se pudo enviar el mensaje.. </p>";
            echo "<p align='center' style='color:red'> Error de correo : $mail->ErrorInfo </p>"; 
          }       
 
          echo "<br>";
          echo "<p align='center' > <a href='index.php'>Regresar al Menu Anterior</a> </p>";
         



        /*sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje*/

      }
    ?>
  </div>
  

  <div      class="enviar">
    <div class="contact-check">
      
    </div>
        <div class="contact-enviar">
      <input type="submit" value="Enviar mensaje" name="send">
      <br><br>
      <h2>
    	<a href="Directivos.php"><b>	Regresar al Menu Anterior</b></a>
  		</h2>
      
    </div>
    <div class="clear"> </div>
    </form>
</div>
</div>
       
 
</body>
</html>
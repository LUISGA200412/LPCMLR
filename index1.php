<!DOCTYPE html>

<html> 

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Liga Picapiedras Circulo Militar La Rinconada</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" >

  <!-- Bootstrap 3.3.6 -->

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/AdminLTE.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-white.css">

<style>

@media only screen and (max-width: 90px){

.row.show{

	margin-top: 15px;

    margin-left: 5px;

    max-width: 100px;

        transform: scale(.2);
 
}   

}

 
 

.propaganda1 {
	display:inline-block;
	padding:5px;
	background:red;
position: relative;
top:5px;
left:20px;
border-radius: 10em;
}
.propaganda2 {
	display:inline-block;
	padding:25px;
	background:red;
position: relative;
top:5px;
left:50px;
border-radius: 10em;
}
</style>

</head>



<body class="hold-transition skin-blue sidebar-mini">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0" nonce="XBabmBfd"></script>


<div class="wrapper">



<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 

<?php

include("barradenavegacion.php");

?>

<!-- FINALIZA EMPIEZA BARRA DE NAVEGACION --> 



<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

 <span class="ir-arriba fa  fa-arrow-up"></span>



 

<div class="content-wrapper"> 

 
    <br>
    <section class="content">
      <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-4 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <iframe class="pdf"
              width="320" height="400" src="Convocatoria/catalogoventas.pdf"
              webkitallowfullscreen="no" mozallowfullscreen="no" allowfullscreen="no" frameborder="no" >

              </iframe>	                  
            </div>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <iframe class="pdf"     
                    width="320" height="400" src="Convocatoria/campeonatonacional.pdf" 
                    webkitallowfullscreen="no" mozallowfullscreen="no" allowfullscreen="no" frameborder="no" >
              </iframe>	                 
            </div>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">            
              <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0jAedXyNBqeBpWDQ4goJcMEiaN9PjKzgrTCmk6mDx1xU1G7qfxCXGmD3Ny7yeZSvl%26id%3D100085376027253&show_text=false&width=500"                 
                width="320" height="400" >
               </iframe>	                 
            </div>
          </div>
        </div>        

      </div>
    </section>

	<div>
	  	<br>
			<?php
			include("acordeon.php");
			?>
	</div>
 
  
     <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
              <?php
                  include("Nota01.php");
              ?>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
              <?php
                  include("Nota02.php");
              ?>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
              <?php
                  include("Nota03.php");
              ?>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
              <?php
                  include("Nota04.php");
              ?>
        </div>        

      </div>
 		 
  	<div>
	  	<br>
			<?php
			include("NuestraLiga.php");
			?>
	</div>



</div>



<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->



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



<script type='text/javascript'>

    var blink1 = document.getElementById('blink1');

    	setInterval(function() {

    blink1.style.opacity = (blink1.style.opacity == 0 ? 1 : 0);

    }, 1500);

</script>

<script src="acordeon.js"></script>
<script src="arriba.js"></script>

</body>

</html>
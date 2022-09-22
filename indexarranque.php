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
 
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/main.js"></script>

</head>
<style >

/* VENTANA MODAL */

.pop-up{
    background: rgba(48, 48, 48, 0.5);
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    visibility: hidden;  
}

.pop-up-wrap{
    display: flex;
    align-items: center;
    width: 100%;
    margin-top: 70px;
    margin-left: 450px;
    max-width: 500px;
    transform: scale(0.6);
    opacity: 0;
    transition: .3s ease all;
}

.pop-up-title{
    flex-basis: 0;
    flex-grow:1.5;
    height: 460px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    background-image: url('../img/office.jpg');
    background-size: 165%;
    background-position: center;
    background-repeat: no-repeat;
}

.pop-up-title::after{
    content: '';
    position: absolute;
    background: rgba(228, 63, 90, 0.75);
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}

.pop-up-title::before{
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.3);
    z-index: -1;
}

.subcription::before{
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.3);
    z-index: -1;
}

.pop-up-title h2,
.pop-up-title p{
    z-index: 10;
    color: #fff;
}

.pop-up-title h2{
    font-family: 'Chiller';
    font-size: 80px;
}


.pop-up-title p{
    font-size: 20px;
    font-weight: 300;
}

.subcription{
    background: #fff;
    flex-basis: 0;
    flex-grow: 2;
    height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    position: relative;
    text-align: center;
}

.sub-content{
    width: 75%;
}

.sub-content h2{
    font-weight: 500;
    font-size: 40px;
    color: #1F4068;
    margin-bottom: 15px;
}

.sub-content p{
    font-weight: 500;
    color: #1bc59b;
    margin-bottom: 30px;
}

.subs-email{
    width: 100%;
    padding: 15px;
    border: none;
    background: #ccc;
    margin-bottom: 15px;
}

.subs-send{
    width: 100%;
    padding: 15px;
    border: none;
    background: #E43F5A;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    margin-bottom: 20px;
    transition: .25s ease background;
}

.subs-send:hover{
    background: #1bc59b;
}

.line{
    width: 100%;
    height: 20px;
    background: #1F4068;
}

#close{
    position: absolute;
    top: 40px;
    right: 25px;
    font-size: 25px;
    color: #1bc59b;
    cursor: pointer;
}

.pop-up.show{
    visibility: visible;
}

.pop-up-wrap.show{

    transform: scale(1);
    opacity: 1;
}

@media only screen and (max-width: 980px){
.pop-up-wrap.show{
		    
	margin-top: 20px;
    margin-left: 5px;
    max-width: 600px;
    transform: scale(.9);
  
}
@media only screen and (max-width: 90px){
.tan.show{
		    
	margin-top: 15px;
    margin-left: 5px;
    max-width: 100px;
        transform: scale(.5);
   
}

}

@media only screen and (max-width: 980px){
    .pop-up-title{
        display: none;
    }

}

@media only screen and (max-width: 320px){
    .sub-content h2{
        font-size: 30px;
    }
}

	</style>
<body>

 
<div class="pop-up">
    <div class="pop-up-wrap">
        <div class="subcription">
            <div class="line"></div>
      		<a href="index1.php" method="post"  
                class="glyphicon glyphicon-home" id="close" title="ENTRAR A PAGINA WEB"> 
            </a>
            <div class="sub-content">
        	   	<a href="index.php"><img src="img/LPCMLR.png" /> 
        	   	</a>
            </div> 

 			<?php
				include("RedesSociales.php");
			?>

            <div class="line"></div>
        </div>
    </div>
</div>
</body>
</html>
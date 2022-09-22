<!DOCTYPE html> 
<html> 
<head>
	
</head>
<body>

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
	
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 

  <?php 

    $NOMBRE=$_POST["txnombre"];
    $CORREO=$_POST["txcorreo"];
    $TELEFONO=$_POST["txtelefono"];
    $CARNET=$_POST["carnet"];
//    $IDCATEGORIA=$_POST["idcategoria"];
//    $IDSUBCATEGORIA=$_POST["idsubcategoria"];
    $PASSWORD=$_POST["password"];
    $SEXO=$_POST["sexo"];
 


/* foreach ($_POST as $key => $value)
    echo $key.' = '.$value.'<br />'; */


  $CEDULA=$_POST["cod"];






    include ("conexion.php");

    $sql="UPDATE jugadores_lpcmlr set

    nombre_jugador    = '$NOMBRE', 
    correo_jugador    = '$CORREO',
    telefono_jugador  = '$TELEFONO',
    numcarnet         = '$CARNET',
    password          = '$PASSWORD',
    sexo    	      = '$SEXO'

                                                     
    where ced_jugador = $CEDULA ";

/*header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='downloaded.pdf'");

// The PDF source is in original.pdf
readfile("Comprobante.pdf"); */

     if (mysqli_query($mysqli, $sql)) {
     
                    /*session_start();*/
                  

          /*      echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Modificado</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='ActualizaJugadores.php'>";
                
                echo "<input type='submit' value='Regresar al Menu Anterior'>";
                echo "</form>";*/

echo "<script> alert('Jugador/a Modificado');
		location.href ='ActualizaJugadores.php';
		</script>"; 

} else {
    echo "Error updating record: " . mysqli_error($mysqli);
}
?>


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->


  <!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

</body>
</html>

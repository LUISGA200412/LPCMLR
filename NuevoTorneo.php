<!DOCTYPE html> 
<html> 
<head>
<link rel="stylesheet" href="css/hora.css">
<script src="hora.js"></script>
</head>
<body>
<div class="incripcion">		
			<?php

				    include ("conexion.php");

					$sql1 = "SELECT * FROM `torneo` order by idtorneo DESC LIMIT 1";
					$resultado1 = $mysqli->query($sql1);
					while($rows1 = $resultado1->fetch_assoc())
					{
					$storneo = $rows1['status_torneo'];
					$ntorneo = $rows1['nombre_torneo'];
					$categoria = $rows1['idcategoria'];	
					$subcategoria = $rows1['idsubcategoria'];
					$fechad= date_create($rows1['fecha_torneo_desde']);
					}
$hoy= date_create()->format('Y/m/d');
$fec = date_format($fechad,"Y/m/d");

//echo "$hoy $fec";

if ($fec > $hoy) {
	


				if ($storneo == 1) {
					date_sub($fechad, date_interval_create_from_date_string("1 days"));
				$fec = date_format($fechad,"d/m/Y");
				echo "
					<div class='counterdemo'>
					<p> HASTA EL $fec </p>
						<p>No Pierdas La Oportunidad, Solo faltan
						</p>
						<p id='demo'>
						</p>
					   	<i class='fa fa-hand-o-right'></i>
					   	<i id='blink1' >&nbsp <a style='background:#9d2c6d;font-size:2em;' href='ApartaCupo.php?categoria=$categoria&subcategoria=$subcategoria'> Aparta tu Cupo 
						</a> </i> &nbsp
					   	<i  class='fa fa-hand-o-left'></i> 
		 				<h3 > $ntorneo </h3>
		 			</div>";

				echo
					"<div style='background:#9d2c6d;font-size:2em;'>
						<i> Ya Cancelastes! 
						</i>
						<a class='fa  fa-upload' href='ApartaCupoPago.php?categoria=$categoria&subcategoria=$subcategoria'> Sube Tu Planilla de Pago 
						<i class='fa  fa-upload'>
						</i> 
						</a> 	
					</div> ";
			}
}				
			?>

</div>
			
</body>
</html>
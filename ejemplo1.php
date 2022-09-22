<?php 

require('fpdf/fpdf.php');

include("conexion.php");

$sql1 = "SELECT * FROM torneo where status_torneo = 1 order by idtorneo DESC LIMIT 1";
		$resultado1 = $mysqli->query($sql1);
		while($rows1 = $resultado1->fetch_assoc())
		{
		$idtorneo = $rows1['idtorneo'];	
		$idpais = $rows1['idpais'];	
		$idciudad = $rows1['idciudad'];	
		$idbolera = $rows1['idbolera'];	
		$NOMBRETORNEO = $rows1['nombre_torneo'];	
		$idcategoria = $rows1['idcategoria'];	
		$idsubcategoria = $rows1['idsubcategoria'];
		$FECHADESDE = $rows1['fecha_torneo_desde'];
		$FECHAHASTA = $rows1['fecha_torneo_hasta'];
		}

$date1 = date("d/m/Y", strtotime($FECHADESDE));
$date2 = date("d/m/Y", strtotime($FECHAHASTA));

$ff = "Desde el : ".$date1." Hasta el : ".$date2;

$sql="SELECT * from bolera where idciudad = $idciudad
and idbolera = $idbolera ";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
  $nombrebolera = $mostrar['nombre_bolera'];
}

 $GLOBALS['a'] = utf8_decode($nombrebolera);
 $GLOBALS['b'] = utf8_decode($ff);
 $GLOBALS['c'] = utf8_decode($NOMBRETORNEO);
 //$GLOBALS['x'] = 2;
 //$GLOBALS['y'] = 5;


class PDF extends FPDF
{

  //Columna actual
  // var $x=50;
   //Ordenada de comienzo de la columna
  // var $y=15;
   //Cabecera de página
   	function Header()
   	{	
 
      $this->SetXY(2, 5);

   	  $this->ln(1); 
      $this->Image('img/LPCMLR.png',20,16,50);
      //$this->SetTextColor(125);
      $this->SetFont('Arial','B',20);
      $this->Cell(325,5,'Fecha: '.date('d/m/Y'),0,0,'R');

	    $this->ln(10); 
	    //$this->SetTextColor(200,120,50);
	    $this->SetFont('Arial','B',20);    
	    $aa = utf8_decode('Liga Picapiedras Circulo Militar La Rinconada');   
	    $this->Cell(350,5,$aa,0,0,'C');

		$this->ln(10); 
		//$this->SetTextColor(146,165,254);
		$this->SetFont('Arial','B',20);    
		$this->Cell(350,5,$GLOBALS['a'],0,0,'C');

		$this->ln(10); 
		//$this->SetTextColor(146,165,254);
		$this->SetFont('Arial','B',20);    
		$this->Cell(350,5,$GLOBALS['c'],0,0,'C');

		$this->ln(10); 
		//$this->SetTextColor(0,128,255);
		$this->SetFont('Arial','B',20);    
		$this->Cell(350,5,$GLOBALS['b'],0,0,'C');

   	}
 
	function Footer()
	{
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function LINEA()
	{

		$this->SetTextColor(0);
		$this->SetFont('Arial','B',6);
		$this->SetFillColor(251,250,249);
		$this->Cell(90,5,' ',1,0,'C');
		$this->Cell(45,5,'1ERA Linea',1,0,'C',1);
		$this->Cell(45,5,'2DA Linea',1,0,'C',1);
		$this->Cell(45,5,'3ERA Linea',1,0,'C',1);
		$this->Cell(45,5,'4TA Linea',1,0,'C',1);
		$this->Cell(60,5,'Serie Total',1,0,'C',1);
	}

	function LINEAJUGADOR()
	{
	   
		$this->Cell(70,10,'Nombre Jugador',1,0,'C');
		$this->Cell(20,10,'HDC',1,0,'C');

		for ($i=1; $i < 5 ; $i++) 
		{ 
			$this->Cell(15,10,'LINEA',1,0,'C',1);
			$this->Cell(15,10,'L/HDP',1,0,'C',1);
			$this->Cell(15,10,'PTOS.',1,0,'C',1);
		}
		$this->Cell(15,10,'SERIE',1,0,'C',1);
		$this->Cell(15,10,'HDP',1,0,'C',1);
		$this->Cell(15,10,'L/HDP',1,0,'C',1);
		$this->Cell(15,10,'PTOS.',1,0,'C',1);	
	}


	function EQUIPO()
	{
				$this->Cell(70,10,'SERIE',1,0,'L');
				$this->Cell(20,10,'',1,0,'C');
				for ($i=1; $i < 17 ; $i++) 
				{ 
	  				$this->Cell(15,10,'',1,0,'C',1);
				}

				$this->ln(10);  
				$this->Cell(70,10,'PUNTOS',1,0,'L');
				$this->Cell(20,10,'',1,0,'C');
				for ($i=1; $i < 17 ; $i++) 
				{ 
	  				$this->Cell(15,10,'',1,0,'C',1);
				}
	}

	function NOMBREEQUIPO()
	{
		$this->ln(10);
		$this->SetFont('Arial','B',20);
		$this->Cell(300,5,'Nombre del Equipo :   '.$GLOBALS['a'].'          Cancha _______',0,0,'C');
	}

}

//Creación del objeto de la clase heredada
//$pdf=new PDF(‘L’,’mm’,’Legal’);
$pdf=new PDF('L','mm','Legal' );
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->ln(10);
$pdf->NOMBREEQUIPO();
$pdf->ln(15); 
$pdf->LINEA(); 
$pdf->ln(5); 
$pdf->LINEAJUGADOR(); 
 

$nomequipow="";
$contador=0;$a1=0;$a2=0;$a3=0;
$sql="SELECT * FROM equipojugadores ORDER BY idequipo";
    $result=mysqli_query($mysqli,$sql); 
    while($mostrar=mysqli_fetch_array($result))
    {   	         
    	$idequipo = $mostrar['idequipo'];
    	$cedula = $mostrar['ced_jugador'];
    	$nombrejugador = utf8_decode($mostrar['nombre_jugador']);
 	
 		if ($a1 == 0) 
 		{
 		   	$sql1="SELECT * FROM equipo where idequipo =$idequipo";
	    	$result1=mysqli_query($mysqli,$sql1); 
	    	while($mostrar1=mysqli_fetch_array($result1))
	    	{
	    		$nomequipo = $mostrar1['nombre_equipo'];
	    		$GLOBALS['d'] = $nomequipo;
				$a1=1;
	    	}
 		}

		$contador++;

		if ($contador==3) 
		{
			$a1=0;
		}

		if ($contador > 3) 
		{

  			$pdf->ln(10); 
			$pdf->EQUIPO();
 
			$pdf->ln(15); 
			$pdf->Cell(200,5,'',0,0,'C');
			$pdf->Cell(30,10,'TOTAL PUNTOS',1,0,'C');
			$pdf->Cell(20,10,'',1,0,'C');

			$pdf->AddPage();
			$pdf->ln(10);
			$pdf->NOMBREEQUIPO();
			$pdf->ln(15); 
			$pdf->LINEA(); 
			$pdf->ln(5); 
			$pdf->LINEAJUGADOR(); 
			$pdf->ln(10);  
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(70,10,$nombrejugador,1,0,'L');
			$pdf->Cell(20,10,'',1,0,'C');

			for ($i=1; $i < 17 ; $i++) 
			{ 
  				$pdf->Cell(15,10,'',1,0,'C',1);
			}
		
			$contador = 1;
 
		}
		else
		{  	
 			$pdf->ln(10);
 			$pdf->SetFont('Arial','B',10);  
			$pdf->Cell(70,10,$nombrejugador,1,0,'L');
			$pdf->Cell(20,10,'',1,0,'C');
			for ($i=1; $i < 17 ; $i++) 
			{ 
  				$pdf->Cell(15,10,'',1,0,'C',1);
			}
		}
	}

  			$pdf->ln(10); 
			$pdf->EQUIPO();
			$pdf->ln(15); 
			$pdf->Cell(200,5,'',0,0,'C');
			$pdf->Cell(30,10,'TOTAL PUNTOS',1,0,'C');
			$pdf->Cell(20,10,'',1,0,'C');


$pdf->Output();
      
?>
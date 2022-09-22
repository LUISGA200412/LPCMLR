<?php 

require('fpdf/fpdf.php');

include("conexion.php");

$tanda = 1;


 
if ($tanda == 1) {
	$desde = 1;
	$hasta = 6;
}
else
{
	$desde = 7;
	$hasta = 12;
}

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

$ff = "Desde el :".$date1." Hasta el : ".$date2;

$sql="SELECT * from bolera where idciudad = $idciudad
and idbolera = $idbolera ";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
  $nombrebolera = $mostrar['nombre_bolera'];
}

 $GLOBALS['a'] = $nombrebolera;
 $GLOBALS['b'] = $ff;
 $GLOBALS['c'] = $NOMBRETORNEO;
 $GLOBALS['x'] = 2;
 $GLOBALS['y'] = 5;


class PDF extends FPDF
{

  //Columna actual
  // var $x=50;
   //Ordenada de comienzo de la columna
  // var $y=15;
   //Cabecera de página
   function Header()
   {
 
      $this->SetXY($GLOBALS['x'], $GLOBALS['y']);

   	  $this->ln(0); 
      $this->Image('img/LPCMLR.png',10,8,33);
      $this->SetTextColor(125);
      $this->SetFont('Arial','B',9);
      $this->Cell(190,5,'Fecha: '.date('d/m/y'),0,0,'R');

    $this->ln(5); 
    $this->SetTextColor(200,120,50);
    $this->SetFont('Arial','B',16);    
    $aa = utf8_decode('Liga Picapiedras Circulo Militar La Rinconada');   
    $this->Cell(210,5,$aa,0,0,'C');

	$this->ln(6); 
	$this->SetTextColor(146,165,254);
	$this->SetFont('Arial','B',12);    
	$this->Cell(200,5,$GLOBALS['a'],0,0,'C');

	$this->ln(6); 
	$this->SetTextColor(146,165,254);
	$this->SetFont('Arial','B',12);    
	$this->Cell(200,5,$GLOBALS['c'],0,0,'C');

	$this->ln(6); 
	$this->SetTextColor(0,128,255);
	$this->SetFont('Arial','B',12);    
	$this->Cell(200,5,$GLOBALS['b'],0,0,'C');
  
   }
 
 /* function Footer()
  {
    
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
  }
*/
}

//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','Legal' );
$pdf->AddPage();
//$pdf=new PDF(‘L’,’mm’,’Legal’);

/*$pdf->ln(6); 
$pdf->SetTextColor(222,1,46);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(200,5,$nombrebolera,0,0,'C');*/

//$ff = "Desde El :".$date1." Hasta El :".$date2;

/*$pdf->ln(6); 
$pdf->SetTextColor(0,128,255);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(200,5,$ff,0,0,'C');*/

$li=4;$contador=0;
$y=36;

$pdf->ln(9); 
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',6);
$pdf->SetFillColor(251,250,249);
$pdf->Cell(80,5,' ',1,0,'C');
$pdf->Cell(45,5,'1ERA Linea',1,0,'C',1);
$pdf->Cell(45,5,'2DA Linea',1,0,'C',1);
$pdf->Cell(45,5,'3ERA Linea',1,0,'C',1);
$pdf->Cell(45,5,'4TA Linea',1,0,'C',1);
$pdf->Cell(60,5,'Serie Total',1,0,'C',1);

$pdf->ln(5);  
$pdf->Cell(70,5,'Nombre Jugador',1,0,'C');
$pdf->Cell(10,5,'HDC',1,0,'C');
$pdf->Cell(15,5,'LINEA',1,0,'C',1);
$pdf->Cell(15,5,'L/HDP',1,0,'C',1);
$pdf->Cell(15,5,'PTOS.',1,0,'C',1);
$pdf->Cell(15,5,'LINEA',1,0,'C',1);
$pdf->Cell(15,5,'L/HDP',1,0,'C',1);
$pdf->Cell(15,5,'PTOS.',1,0,'C',1);
$pdf->Cell(15,5,'LINEA',1,0,'C',1);
$pdf->Cell(15,5,'L/HDP',1,0,'C',1);
$pdf->Cell(15,5,'PTOS.',1,0,'C',1); 
$pdf->Cell(15,5,'LINEA',1,0,'C',1);
$pdf->Cell(15,5,'L/HDP',1,0,'C',1);
$pdf->Cell(15,5,'PTOS.',1,0,'C',1);
$pdf->Cell(15,5,'SERIE',1,0,'C',1);
$pdf->Cell(15,5,'HDP',1,0,'C',1);
$pdf->Cell(15,5,'L/HDP',1,0,'C',1);
$pdf->Cell(15,5,'PTOS.',1,0,'C',1);
 

for ($i=1; $i <4 ; $i++) { 
 
 
$pdf->ln(5);  
$pdf->Cell(70,5,'',1,0,'C');
$pdf->Cell(10,5,'',1,0,'C');
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1); 
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
 
 }
$pdf->ln(5);  
$pdf->Cell(70,5,'SERIE',1,0,'L');
$pdf->Cell(10,5,'',1,0,'C');
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1); 
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1); 

$pdf->ln(5);  
$pdf->Cell(70,5,'PUNTOS',1,0,'L');
$pdf->Cell(10,5,'',1,0,'C');
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1); 
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);
$pdf->Cell(15,5,'',1,0,'C',1);

$pdf->ln(20); 
$pdf->SetXY(200,80); 
$pdf->Cell(30,10,'TOTAL PUNTOS',1,0,'C');
$pdf->Cell(20,10,'',1,0,'C');
 

$path = "Planillas.pdf";
$pdf->Output($path,"F");

    echo 
    "<script>
    alert(
    'Documento Generado con Exito Pulse Aceptar para Mostrar.');
    location.href ='$path';
            </script>"; 
      
?>
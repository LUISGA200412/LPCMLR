<?php 


/*$mesfacturacion = 12;

 $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 $mes = $mes[($mesfacturacion * 1) -1 ];

$nombrearchivopdf = "lineas Jugadas del ".date("Y").date($mesfacturacion).".pdf";
    $messalida = "Del Mes ".date($mesfacturacion)." A/o ".date("Y");*/

require('fpdf/fpdf.php');


//print_r($_POST);


$cod            = $_POST["TORNEO"];
$unmail         = explode(".", $cod); 
$IDTORNEO       = $unmail[0];
$NOMBRETORNEO   = utf8_decode($unmail[1]);

$CEDULA         = $unmail[2];
$IDBOLERA       = $unmail[3];
$CIUDAD         = $unmail[4];                       
$NOMBREJUGADOR  = utf8_decode($unmail[5]);

$FECHADESDE     = $unmail[6];
$FECHAHASTA     = $unmail[7];
$CATEGORIA      = $unmail[8];


$FECHADESDE = date("d/m/Y", strtotime($FECHADESDE));
$FECHAHASTA = date("d/m/Y", strtotime($FECHAHASTA));


include ("conexion.php");

$sql="SELECT * from bolera where idciudad = $CIUDAD  
and idbolera = $IDBOLERA ";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
  $nombrebolera = utf8_decode($mostrar['nombre_bolera']);
}
$sql="SELECT * from categorias where idcategoria = $CATEGORIA";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
  $nombrecategoria = $mostrar['nombre_categoria'];
}

  $i=0;

class PDF extends FPDF
{

  //Columna actual
   var $col=0;
   //Ordenada de comienzo de la columna
   var $y=0;
   //Cabecera de página
   function Header()
   {
    $this->Image('img/LPCMLR.png',10,8,33);
      $this->ln(0);
      $this->SetTextColor(125);
      $this->SetFont('Arial','B',9);
      $this->Cell(190,5,'Fecha: '.date('d/m/y'),0,0,'R');

    $this->ln(5); 
    $this->SetTextColor(200,120,50);
    $this->SetFont('Arial','B',16); 
    $aa = utf8_decode('Liga Picapiedras Circulo Militar La Rinconada');
    $this->Cell(200,5,$aa,0,0,'C');

    $this->ln(8); 
    $this->SetTextColor(222,1,46);
    $this->SetFont('Arial','B',12);    
    $this->Cell(105,5,'Lineas y Promedio de :',0,0,'R');
   }
 
  function Footer()
  {
    
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
  }


}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();

$pdf->SetTextColor(222,1,46);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(100,5,$NOMBREJUGADOR,0,0,'L');

$pdf->ln(7); 
$pdf->SetTextColor(146,165,254);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(85,5,'En El Torneo : ',0,0,'R');
$pdf->Cell(100,5,$NOMBRETORNEO,0,0,'L');

$pdf->ln(7); 
$pdf->SetTextColor(0,140,35);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(90,5,'Efectuado en la Bolera de/el:',0,0,'R');
$pdf->Cell(100,5,$nombrebolera,0,0,'L');

$pdf->ln(7); 
$pdf->SetTextColor(0,128,255);
$pdf->Cell(75,5,'Desde el :',0,0,'R');
$pdf->Cell(25,5,$FECHADESDE,0,0,'L');
$pdf->Cell(20,5,'Hasta el :',0,0,'L');
$pdf->Cell(20,5,$FECHAHASTA,0,0,'L');


$pdf->ln(10); 
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(151,151,0);
$pdf->Cell(45,5,'',0,0,'C');
$pdf->Cell(20,5,'Linea',1,0,'C',1);
$pdf->Cell(30,5,'Cancha',1,0,'C',1);
$pdf->Cell(20,5,'Pines',1,0,'C',1);
$pdf->Cell(30,5,'fecha',1,0,'C',1);
$pdf->Ln(5);
 
                $x=0;
                $tmp = 0;
                $sql="SELECT sum(score),max(score),min(score),avg(score) from lineas where score > 0 and idtorneo = $IDTORNEO and ced_jugador = $CEDULA";
                    $result=mysqli_query($mysqli,$sql);
                          while($mostrar=mysqli_fetch_array($result))
                          {
                            $suma = $mostrar['sum(score)'];
                            $max = $mostrar['max(score)'];
                            $min = $mostrar['min(score)'];
                            $promedio = $mostrar['avg(score)'];
                          }  
?>    


<?php 
$sql="SELECT * from lineas where idtorneo = $IDTORNEO and ced_jugador = $CEDULA ";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{     
                                              
   $fe=date("d/m/Y",strtotime($mostrar['fecha_linea']));

    $pdf->SetFillColor(200,220,255);

        $pdf->Cell(45,5,'',0,0,'C');

      $pdf->Cell(20,5,$mostrar['idlineas'],1,0,'C',0);
 
        $pdf->Cell(30,5,$mostrar['num_cancha'],1,0,'C',1);

    $pdf->Cell(20,5,$mostrar['score'],1,0,'C',1);

    $pdf->Cell(30,5,$fe,1,0,'C',1);
 
    $pdf->Ln(5);

    if ($i==40)
    {
      $i=0;
      $pdf->AddPage();
$pdf->SetTextColor(222,1,46);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(100,5,$NOMBREJUGADOR,0,0,'L');

$pdf->ln(7); 
$pdf->SetTextColor(146,165,254);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(60,5,'En El Torneo : ',0,0,'R');
$pdf->Cell(100,5,$NOMBRETORNEO,0,0,'L');

$pdf->ln(7); 
$pdf->SetTextColor(0,140,35);
$pdf->SetFont('Arial','B',12);    
$pdf->Cell(80,5,'Efectuado en la Bolera de/el:',0,0,'R');
$pdf->Cell(100,5,$nombrebolera,0,0,'L');

$pdf->ln(7); 
$pdf->SetTextColor(0,128,255);
$pdf->Cell(65,5,'Desde el :',0,0,'R');
$pdf->Cell(25,5,$FECHADESDE,0,0,'L');
$pdf->Cell(20,5,'Hasta el :',0,0,'L');
$pdf->Cell(20,5,$FECHAHASTA,0,0,'L');
$pdf->ln(10); 
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(151,151,0);
$pdf->Cell(35,5,'',0,0,'C');
$pdf->Cell(20,5,'Linea',1,0,'C',1);
$pdf->Cell(30,5,'Cancha',1,0,'C',1);
$pdf->Cell(20,5,'Pines',1,0,'C',1);
$pdf->Cell(30,5,'fecha',1,0,'C',1);
$pdf->Ln(5);




    } 
    $i++;
    
 
}



$pdf->ln(10); 
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255,128,0);
$pdf->SetX(40);
$pdf->Cell(35,5,'Total Pines Derribados',1,0,'C',1);
$pdf->Cell(30,5,'Linea Mas Baja',1,0,'C',1);
$pdf->Cell(30,5,'Linea Mas Alta',1,0,'C',1);
$pdf->Cell(30,5,'Promedio',1,0,'C',1);
$pdf->ln(5); 

$pdf->SetX(40);
$pdf->Cell(35,5,$suma,1,0,'C',0);
$pdf->Cell(30,5,$min,1,0,'C',0);
$pdf->Cell(30,5,$max,1,0,'C',0);
$pdf->Cell(30,5,number_format((float)$promedio, 2, ',', ''),1,0,'C',0);

$pdf->ln(30); 
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(40);
$aa = utf8_decode('Por la Liga Picapiedras CMLR');
$pdf->Cell(130,0,$aa,0,0,'C',0);

$pdf->ln(10); 
$pdf->SetX(45);
$pdf->Cell(40,5,'_______________________',0,0,'L',0);
$pdf->Cell(40,5,'_______________________',0,0,'L',0);
$pdf->Cell(40,5,'_______________________',0,0,'L',0);

$pdf->ln(4); 
$pdf->SetX(45);
$pdf->Cell(40,5,'Manuel Gonzalez',0,0,'C',0);
$pdf->Cell(40,5,'',0,0,'C',0);
$pdf->Cell(40,5,'',0,0,'C',0);


$pdf->ln(4); 
$pdf->SetX(45);
$pdf->Cell(40,5,'Presidente',0,0,'C',0);
$pdf->Cell(40,5,'Sec. General',0,0,'C',0);
$pdf->Cell(40,5,'Vocal Principal',0,0,'C',0);

$path = "TorneoJugado.pdf";


//Aquí escribimos lo que deseamos mostrar...
$pdf->Output($path,"F");
// Output(‘D’,’filename.pdf’);


    echo 
    "<script>
    alert(
    'Documento Generado con Exito Pulse Aceptar para Mostrar.');
    location.href ='$path';
            </script>"; 
          
/*
$path = "../fpdf/RECIBOSDEPAGO/".$archivoenpdf;
//$path1 = "../administrador.php?cedula=".$cedula;

    echo "<script>alert('GENERACION DEL DOCUMENTO DE CONDOMINIO MENSUAL SE GENERO EXITOSAMENTE.');
            location.href ='../administrador.php'+'?cedula=$cedula';
            </script>"; 
//$pdf->Output($archivoenpdf,"S");
//
$pdf->Output($path,"F");*/


?>
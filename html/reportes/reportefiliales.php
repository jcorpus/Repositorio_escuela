<?php
require('fpdf2/fpdf.php');
require('../../core/models/model_conexion.php');

class PDF extends FPDF{

   function Header(){
      //uso $this porque hago referencia a una funcion que estoy heredando
      $this->Image('fpdf2/usp.png',10,8,20,20);//x,y,ancho,alto
      $this->SetFont('Arial','B',16); ////el B es en negrita
      //$this->setFillColor(64,224,208);
      $this->SetTextColor(66,73,61);
      $this->Cell(0,35,'Tesis Registrados por Filial: '.$_GET['p'].'',0,1,'C');///el cero indica que la celda ocupa el ancho de la pagina
      ////el true, en el Cell indica que el fondo se dibuja, si se omite es false
      ///datos de la empresa
      $this->SetXY(10, 25);
      $this->SetFont('Arial','',10);
      $this->Cell(5,20,'Repositorio Escuela');
      $this->SetXY(10, 25);
      //$this->Cell(15,29,'R.U.C: 236437309');
      $this->SetXY(10, 25);
      $this->Cell(15,38,'USP');
      $this->Ln();
   }

    // utilizamos la funcion Footer() y la personalizamos para que muestre el pie de página
    function Footer(){
        // Seteamos la posicion de la proxima celda en forma fija a 1,5 cm del final de la pagina
        $this->SetY(-15);
        // Seteamos el tipo de letra Arial italica 10
        $this->SetFont('Arial','I',10);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
    }



 } /////fin del fpdf
    $pdf = new PDF('L','mm','A4'); ///tamaaño del reporte
    $pdf->AddPage();


////*************************DATOS**********************************/

$var= $_GET["p"];
    $db = new Conexion2;
    //$this->set_charset("utf8");
    //echo "conexion valio ".$db->host_info;
 
    $sql = $db->query("SELECT idTesis,Autor,Titulo  from tesis INNER JOIN filial on filial.idFilial=tesis.idFilial where filial.DesFilial='$var'");

//$pdf->Cell(ancho, alto, contenido, borde , alineación); //Alineación L Izquierda, C Centrado, R Derecha
        $pdf->SetXY(10,50);///posicion del titulo
        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(60,168,245);//Fondo azul de celda
        $pdf->Cell(15,6,'idtesis',1,0,'C',1);//el ultimo parametro se rellena la celda
        $pdf->Cell(70,6,'Autor',1,0,'C',1);
        $pdf->Cell(200,6,'Titulo',1,1,'C',1);
     

    while ($row = $db->recorrer($sql)) {
        # code...

        $pdf->SetFont('Arial','',10);
        $pdf->SetX(10);////posicion de los datos
        //$pdf->Cell(10,6,  utf8_decode($row["nombres"]),1,0,'C'); //por siaca las tildes
        $pdf->Cell(15,6,$row["idTesis"],1,0,'C');
        $pdf->Cell(70,6,$row["Autor"],1,0,'C');
        $pdf->Cell(200,6,$row["Titulo"],1,1,'C');
       
       
    }
    //liberando memoria
  $db->liberar($sql);
  $db->close();

$pdf->Output(); //Salida al navegador



?>

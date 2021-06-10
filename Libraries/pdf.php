<?php

require 'fpdf/fpdf.php';


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(80,10,'Check-in Vuelos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(20,10,'Silla',1,0,'C',0);
    $this->Cell(28,10,'Pasajero',1,0,'C',0);
    $this->Cell(25,10,'Codigo',1,0,'C',0);
    $this->Cell(30,10,'Reserva',1,0,'C',0);
    $this->Cell(55,10,'Fecha',1,0,'C',0);
    $this->Cell(40,10,'Descripcion',1,1,'C',0);

    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$idReserva = isset($_REQUEST['idReserva']) ? $_REQUEST['idReserva'] :'';
require'../Infraestructura/clsConexionPhp.php';
$consulta="select (select nombre from ubicacion where id=iv.id_ubicacion_salida) as nombreUbicacionSalida, (select nombre from ubicacion where id=iv.id_ubicacion_llegada) as nombreUbicacionLlegada, iv.fecha_salida as fecha_salida,iv.fecha_llegada as fecha_llegada,p.nombres,p.apellidos,p.telefono_celular,p.correo,p.cedula,s.numero_silla,hp.estado,hp.descripcion,v.tipo_vuelo from historial_pago hp join reserva r on hp.id_reserva=r.id join pasajero p on r.id_pasajero_principal=p.id join silla s on s.id=r.id_silla join itinerario_vuelo iv on iv.id=s.id_itinerario_vuelo join vuelo v on v.id=iv.id_vuelo join avion a on a.id=v.id_avion where r.id=$idReserva and hp.estado='disponible'";
$resultado= $mysqli->query($consulta);


$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row=$resultado->fetch_assoc()){
$pdf->Cell(20,10,$row['id_silla'],1,0,'C',0);
$pdf->Cell(28,10,$row['id_pasajero_principal'],1,0,'C',0);
$pdf->Cell(25,10,$row['codigo'],1,0,'C',0);
$pdf->Cell(30,10,$row['estado'],1,0,'C',0);
$pdf->Cell(55,10,$row['fecha_hora_reserva'],1,0,'C',0);
$pdf->Cell(40,10,$row['descripcion'],1,1,'C',0);
}

//nombres,apellidos,cedula,telefono_celular,correo,tipo_vuelo,estado,numero_silla,descripcion,nombreUbicacionSalida,nombreUbicacionLlegada,fecha_llegada,fecha_salida
$pdf->Output();

?>
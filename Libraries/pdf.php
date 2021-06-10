<?php

require 'fpdf/fpdf.php';


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFillColor(253,135,39);
    $this->Rect(0,0,220,50,'F');
    $this->SetY(25);
    $this->SetFont('Arial','B',20);
    $this->SetTextColor(255,255,255);
    $this->Write(5,'Pasabordo');

}

// Pie de página
function Footer(){
    $this->SetFillColor(253,135,39);
    $this->Rect(0,250,220,50,'F');
    $this->SetY(90);
    $this->SetTextColor(255,255,255);
    
}
}
$idReserva = isset($_REQUEST['idReserva']) ? $_REQUEST['idReserva'] :'';
require'../Infraestructura/clsConexionPhp.php';
$consulta="select (select nombre from ubicacion where id=iv.id_ubicacion_salida) as nombreUbicacionSalida, (select nombre from ubicacion where id=iv.id_ubicacion_llegada) as nombreUbicacionLlegada, iv.fecha_salida as fecha_salida,iv.fecha_llegada as fecha_llegada,p.nombres,p.apellidos,p.telefono_celular,p.correo,p.cedula,s.numero_silla,hp.estado,hp.descripcion,v.tipo_vuelo from historial_pago hp join reserva r on hp.id_reserva=r.id join pasajero p on r.id_pasajero_principal=p.id join silla s on s.id=r.id_silla join itinerario_vuelo iv on iv.id=s.id_itinerario_vuelo join vuelo v on v.id=iv.id_vuelo join avion a on a.id=v.id_avion where r.id=$idReserva and r.estado='disponible'";
$resultado= $mysqli->query($consulta);


$fpdf=new PDF('P','mm','letter',true);
$fpdf->AddPage('portrait','letter');
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont('Arial','',10);
$fpdf->SetTextColor(255,255,255);

while($row=$resultado->fetch_assoc()){
    $fpdf->SetFont('Arial','',10);
    $fpdf->SetTextColor(255,255,255);
    $fpdf->SetY(20);
    $fpdf->SetX(120);
    $fpdf->Write(5,'Aerolinea MSD');
    $fpdf->Ln();
    $fpdf->SetX(120);
    $fpdf->Write(5,"Direccion :  Cra. 14 ## 3-11");
    $fpdf->Ln();
    $fpdf->SetX(120);
    $fpdf->Write(5,"Telefono: (6) 7451101");
    $fpdf->Ln();
    $fpdf->SetX(120);
    $fpdf->Write(5,"Correo electronico : aerolineaMSD@gmail.com");
    $fpdf->Ln();
    $fpdf->SetX(120);
    $fpdf->Write(5,"Armenia Quindio");
    
    //PARTE CLIENTE
    $fpdf->SetTextColor(0,0,0);
    $fpdf->Image('../img/Logopequeno.png',20,65);

    //detalles aerolinea
    $fpdf->SetFont('Arial','B');
    $fpdf->SetY(105);
    $fpdf->SetX(20);
    $fpdf->Write(5,'Detalle Del Pasajero: ');
    $fpdf->SetFont('Arial','');
    $fpdf->Ln();
    $fpdf->SetX(20);
    $fpdf->Write(5,'Cedula Del pasajero: '.$row['cedula']);
    $fpdf->Ln();
    $fpdf->SetX(20);
    $fpdf->Write(5,'Nombre Del pasajero: '.$row['nombres'].' '.$row['apellidos']);
    $fpdf->Ln();
    $fpdf->SetX(20);
    $fpdf->Write(5,'Correo Del pasajero: '.$row['correo']);
    $fpdf->Ln();
    $fpdf->SetX(20);
    $fpdf->Write(5,'Telefono Del pasajero: '.$row['telefono_celular']);
    $fpdf->Ln();
    $fpdf->SetX(20);
    $fpdf->Write(5,'Tipo De Vuelo: '.$row['tipo_vuelo']);


    //tabla
    $fpdf->SetY(150);
    $fpdf->SetX(20);
    $fpdf->SetTextColor(255,255,255);
    $fpdf->SetFillColor(79,78,77);
    $fpdf->Cell(25,10,'Pasajero',0,0,'C',1);
    $fpdf->Cell(10,10,'Silla',0,0,'C',1);
    $fpdf->Cell(30,10,'Ubicacion Salida',0,0,'C',1);
    $fpdf->Cell(30,10,'Ubicacion Llegada',0,0,'C',1);
    $fpdf->Cell(30,10,'Fecha Salida',0,0,'C',1);
    $fpdf->Cell(30,10,'Fecha Llegada',0,0,'C',1);
    $fpdf->Cell(28,10,'Estado Reserva',0,0,'C',1);
    $fpdf->Ln();
    $fpdf->SetLineWidth(0.5);
    $fpdf->SetTextColor(0,0,0);
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetDrawColor(80,80,80);
    $fpdf->SetX(20);

    //Datos tabla
    $fpdf->Cell(25,10,$row['cedula'],'B',0,'C',1);
    $fpdf->Cell(10,10,$row['numero_silla'],'B',0,'C',1);
    $fpdf->Cell(30,10,$row['nombreUbicacionSalida'],'B',0,'C',1);
    $fpdf->Cell(30,10,$row['nombreUbicacionLlegada'],'B',0,'C',1);
    $fpdf->Cell(30,10,$row['fecha_salida'],'B',0,'C',1);
    $fpdf->Cell(30,10,$row['fecha_llegada'],'B',0,'C',1);
    $fpdf->Cell(28,10,$row['descripcion'],'B',0,'C',1);
    $fpdf->Ln();


    /*
    $pdf->Cell(20,10,$row['nombres'],1,0,'C',0);
    $pdf->Cell(28,10,$row['apellidos'],1,0,'C',0);
    $pdf->Cell(25,10,$row['cedula'],1,0,'C',0);
    $pdf->Cell(30,10,$row['correo'],1,0,'C',0);
    $pdf->Cell(55,10,$row['telefono_celular'],1,0,'C',0);
    $pdf->Cell(40,10,$row['tipo_vuelo'],1,1,'C',0);
    */
}


//nombres,apellidos,cedula,telefono_celular,correo,tipo_vuelo,estado,numero_silla,descripcion,nombreUbicacionSalida,nombreUbicacionLlegada,fecha_llegada,fecha_salida
$fpdf->Output();

?>
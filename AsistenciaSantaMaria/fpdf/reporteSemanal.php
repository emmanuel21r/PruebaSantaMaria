<?php
require('./fpdf.php');
require('../config/conexion.php'); // Llamamos a la conexion BD

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('logo.png', 185, 5, 20);
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(45);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode('HOSPITAL SANTAMARIA'), 1, 1, 'C', 0);
        $this->Ln(3);
        $this->SetTextColor(103);

        /* UBICACION */
        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación : Lorenzo de Garaicoa 3209 y Argentina"), 0, 0, '', 0);
        $this->Ln(5);

        /* TELEFONO */
        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono : 098 089 2296"), 0, 0, '', 0);
        $this->Ln(5);

        /* COREEO */
        $this->Cell(110);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Correo : info@hospitalsantamaria.com.ec"), 0, 0, '', 0);
        $this->Ln(5);

        /* TITULO DE LA TABLA */
        $this->SetTextColor(228, 100, 0);
        $this->Cell(50);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("REPORTE DE ASISTENCIAS SEMANAL"), 0, 1, 'C', 0);
        $this->Ln(7);

        /* CAMPOS DE LA TABLA */
        $this->SetFillColor(228, 100, 0);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('APELLIDO'), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode('ESPECIALIDAD'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $hoy = date('d/m/Y');
        $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

$hostname = "localhost"; // Cambia esto al nombre de tu servidor MySQL
$username = "root";      // Cambia esto a tu nombre de usuario de MySQL
$password = "";          // Cambia esto a tu contraseña de MySQL
$database = "usuario3";  // Cambia esto al nombre de tu base de datos

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}
$fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
$fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;

$sql = "SELECT * FROM persona INNER JOIN asistencia ON persona.id = asistencia.idPersona 
            WHERE date(fechaAsistencia) BETWEEN '$fechaInicio' AND '$fechaFin'";
$resultado = mysqli_query($conn, $sql);

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

while ($fila = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(18, 10, $fila['id'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['nombre'], 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode($fila['apellido']), 1, 0, 'C');
    $pdf->Cell(70, 10, utf8_decode($fila['especialidad']), 1, 0, 'C');
    $pdf->Cell(25, 10, $fila['estado'], 1, 1, 'C');
}

$pdf->Output('Prueba.pdf', 'I');
?>


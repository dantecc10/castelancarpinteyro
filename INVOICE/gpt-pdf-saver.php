<?php
require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', array(80, 150)); // Tamaño personalizado para el ticket
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(60, 8, utf8_decode(strtoupper("Nombre de la Tienda")), 0, 0, 'C');

$pdf->Ln(8);

$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(60, 6, utf8_decode("Dirección: Calle Principal, Ciudad"), 0, 0, 'C');

$pdf->Ln(4);

$pdf->Cell(60, 6, utf8_decode("Teléfono: 123-456789"), 0, 0, 'C');

$pdf->Ln(8);

$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(60, 5, utf8_decode("Fecha: " . date("d/m/Y h:i A")), 0, 0, 'L');
$pdf->Cell(60, 5, utf8_decode("Ticket: 001"), 0, 0, 'R');

$pdf->Ln(6);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, utf8_decode("Cant.    Producto           Total"), 0, 0, 'L');
$pdf->Ln(6);

// Aquí puedes iterar sobre los productos y agregarlos al ticket
$products = array(
    array("Producto 1", 2, 10.00),
    array("Producto 2", 1, 15.00),
    // Agregar más productos aquí
);

foreach ($products as $product) {
    $pdf->Cell(20, 5, utf8_decode($product[1]), 0, 0, 'C');
    $pdf->Cell(40, 5, utf8_decode($product[0]), 0, 0, 'L');
    $pdf->Cell(20, 5, utf8_decode("$" . number_format($product[2], 2)), 0, 0, 'R');
    $pdf->Ln(5);
}

$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(60, 5, utf8_decode("Total: $" . number_format(35.00, 2)), 0, 0, 'R');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(39, 39, 51);
// ...

$pdf->MultiCell(60, 4, utf8_decode("*** Gracias por su compra ***"), 0, 'C', false);

// Generar el código de barras aquí si lo deseas

// Guardar el PDF en el servidor con nomenclatura de fecha y hora
$pdfFileName = "Ticket_Compra_" . date("Ymd_His") . ".pdf";
$pdf->Output('F', $pdfFileName);

// Forzar la descarga del archivo
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=" . $pdfFileName);
readfile($pdfFileName);

// Eliminar el archivo del servidor
unlink($pdfFileName);

// Finalizar el script
exit();
